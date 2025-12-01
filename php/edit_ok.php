<?php
session_start();
include('../db/db_conn.php');

// 로그인 확인 고유키인 변하지 않는 값인 user_no로 인증 검사 한다
if(!isset($_SESSION['mb_no'])){ //로그인이 되어있지 않은 경우 
  echo "<script>alert('회원만 가능합니다. 로그인을 해주세요.'); location.href='login.php';</script>";
  exit;
}

// 유저 테이블에서 유저 번호를 이용해 유저번호의 해당하는 데이터를 가져온다 
$user_no = intval($_POST['user_no']);

//회원 정보 수정에서 입력 받은 정보를 가져온다 
$user_name = trim($_POST['user_name']);
$user_nickname = trim($_POST['user_nickname']);
$user_phone = trim($_POST['user_phone']);
$user_email  = trim($_POST['user_email']);
$new_pw = trim($_POST['user_pw']); //새 비밀번호 
$old_pw_input = trim($_POST['old_pw']); //기존 비밀번호 입력받음

// 기존 프로필 정보 가져온다
$sql= "SELECT user_img, user_pw FROM users WHERE user_no = '$user_no'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

$old_pw_hash = $user['user_pw'];
$old_img = $user['user_img'];

// 기존 비밀번호 입력한지 체크
if($old_pw_input == ""){
  echo"<script>alert('기존 비밀번호를 입력해야 정보수정이 가능합니다.'); history.back();</script>";
  exit;
}
//기존 비밀번호가 일치한지 체크 
if(!password_verify($old_pw_input, $old_pw_hash)){
  echo "<script>alert('기존 비밀번호가 일치하지 않습니다.'); history.back();</script>";
  exit;
}


// 새 비밀번호가 입력된 경우에만 변경
$final_pw = $old_pw_hash;

// 입력 받은 새 비밀번호를 다시 hash 처리 한다
if($new_pw !=""){
  $final_pw = password_hash($new_pw,PASSWORD_DEFAULT);
}


// 이미지 업로드 처리 
$upload_dir = "../uploads/profile/";
if(!is_dir($upload_dir)) mkdir($upload_dir,0777,true);

$new_img = $old_img; //이미지 변경 없으면 기존 유지 

if(isset($_FILES['user_img'])&& $_FILES['user_img']['name'] != ""){

  // 새로운 이미지 이름 
  $new_img = time() . "_" . $_FILES['user_img']['name'];
  $tmp = $_FILES['user_img']['tmp_name'];

  //업로드 처리 
  move_uploaded_file($tmp, $upload_dir.$new_img);

  // 기존 이미지 삭제 (단, default.png (기본 이미지)는 삭제하지 않는다 )
  if($old_img != "default.png" && file_exists($upload_dir.$old_img)){
    unlink($upload_dir.$old_img);
  }
}

// 사용자 정보를 갱신하기 위해 update 쿼리문 작성 

  $sql_update = "UPDATE users SET user_name='$user_name', user_nickname='$user_nickname', user_phone='$user_phone', user_email='$user_email', user_pw='$final_pw',user_img='$new_img' WHERE user_no='$user_no'";

$result_update = mysqli_query($conn, $sql_update);

if($result_update){
  // 세션 정보도 바로 변경 해준다 (즉시반영 )
  $_SESSION['mb_name'] = $user_name;
  $_SESSION['mb_nick'] = $user_nickname;

  echo"<script>alert('회원정보가 수정되었습니다.'); location.href='mypage.php';</script>";
}else{
  echo"<script>alert('수정 중 오류가 발생했습니다.'); history.back();</script>";
}

?>