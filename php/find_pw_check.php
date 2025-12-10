<?
  session_start();
  include ('../db/db_conn.php');

  // POST 값 받기 
  $user_id = trim($_POST['user_id'] ?? '');
  $user_phone = trim($_POST['user_phone'] ?? '');

  if($user_id === '' || $user_phone ===''){
    echo "<script>alert('아이디와 전화번호를 입력하세요.'); history.back();</script>";
    exit;
  }

  // sql 인젝션 방지 
  $user_id = mysqli_real_escape_string($conn,$user_id);
  $user_phone = mysqli_real_escape_string($conn, $user_phone);

  //db조회하기

  $sql = "SELECT user_no FROM users WHERE user_id = '{$user_id}' AND user_phone = '{$user_phone}' LIMIT 1";

  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  // 만약 일치하는 회원 없을시 
  if(!$row){
    echo "<script>alert('일치하는 회원 정보가 없습니다.'); history.back();</script>";
    exit;
  }

  // 인증 성공 -> 세션 저장 
  $_SESSION['reset_user_no'] = $row['user_no'];

  // 비밀번호 재설정 페이지로 값 넘기면서 이동 
  echo "<script>location.href= '../user/reset_pw.php';</script>";
  exit;
?>