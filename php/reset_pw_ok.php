<?
  session_start();
  include ('../db/db_conn.php');

  // 접근 체크하기 
  if(!isset($_SESSION['reset_user_no'])){
    echo"<script>alert('잘못된 접근입니다.'); location.href='find_pw.php';</script>";
    exit;
  }

  $user_no = $_SESSION['reset_user_no'];
  $new_pw = trim($_POST['new_pw']??'');
  $new_pw_check = trim($_POST['new_pw_check']?? '');

  // 빈칸 체크하기 
  if($new_pw === '' || $new_pw_check === ''){
    echo"<script>alert('비밀번호를 모두 입력해주세요'); history.back();</script>";
  }
  
  // 비밀번호 일치하는지 체크 
  if($new_pw !== $new_pw_check){
    echo "<script>alert('비밀번호가 서로 일치하지 않습니다.'); history.back();</script>";
    exit;
  }

  // 비밀번호 hash 처리로 암호화 하기 
  $hash_pw =  password_hash($new_pw, PASSWORD_DEFAULT);

  // 새 비밀번호 적용할 update문 작성하기 
  $sql = "UPDATE users SET user_pw ='{$hash_pw}' WHERE user_no = {$user_no}";

  $result = mysqli_query($conn, $sql);

  //업데이트 성공할 시
  if($result){
    // 세션 삭제 
    unset($_SESSION['reset_user_no']);

    echo"<script>alert('비밀번호가 성공적으로 변경되었습니다'); location.href='login.php';</script>";
    exit;
  }else{
    echo "<script>alert('오류가 발생했습니다 다시 시도해주세요.'); history.back();</script>";
  }
?>