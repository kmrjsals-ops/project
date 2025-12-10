<?
  session_start();
  include '../db/db_conn.php';

  // 로그인 확인하기
  if(!isset($_SESSION['mb_no'])){
    echo"<script>alert('잘못된 접근입니다.'); location.href='../user/mypage.php';</script>";
    exit;
  }

  $user_no = $_SESSION['mb_no'];
  $input_pw = trim($_POST['user_pw']?? '');

  if($input_pw === ''){
    echo"<script>alert('비밀번호를 입력해주세요.'); history.back();</script>";
    exit;
  }

  //DB에서 현재 회원 비밀번호 가져오기 
  $sql = "SELECT user_pw FROM users WHERE user_no = {$user_no}";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  if(!$row){
    echo "<script>alert('회원 정보를 찾을 수 없습니다.'); history.back();</script>";
    exit;
  }
  
  // 비밀번호가 일치하는지 검증하기 
  if(!password_verify($input_pw, $row['user_pw'])){
    echo"<script>alert('비밀번호가 일치하지 않습니다.'); history.back();</script>";
    exit;
  }

  // 비밀번호 일치 -> 회원 탈퇴 처리하기
  $delete_sql = "DELETE FROM users WHERE user_no = {$user_no}";
  $del_result = mysqli_query($conn, $delete_sql);

  if($del_result){
    // 세션삭제 
    session_unset();
    session_destroy();

    echo"<script>alert('회원 탈퇴가 완료되었습니다.'); location.href='../index.php';</script>";
    exit;
  }else{
    echo"<script>alert('오류가 발생했습니다. 다시 시도해주세요.'); history.back();</script>";
  }
?>