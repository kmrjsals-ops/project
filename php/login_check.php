<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
  session_start();
  include('../db/db_conn.php');

  $user_id = trim($_POST['user_id']);
  $user_pw = trim($_POST['user_pw']);

  //받아온 아이디로 회원 정보가 있는지 조회 
  $sql = "SELECT * FROM users WHERE user_id ='$user_id'";
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) == 1){

    $row = mysqli_fetch_assoc($result);
    // 아이디가 일치할시 


    // 받아온 비밀번호가 회원 정보랑 일치 하는지 검증 
    if(password_verify($user_pw, $row['user_pw'])){
      // 일치하면 세션 정보 저장 
      
      $_SESSION['mb_no'] = $row['user_no'];
      $_SESSION['mb_id'] = $row['user_id'];
      $_SESSION['mb_name'] = $row['user_name'];
      $_SESSION['mb_nick'] = $row['user_nickname'];
      $_SESSION['mb_role'] = $row['user_role']; //user / admin 
      $_SESSION['mb_img'] = $row['user_img']; //user / admin 
      
      echo"<script>alert('로그인 성공'); location.href='../index.php';</script>";
      exit;
    }else{
      // 틀리면 일치 하지 않는다 알림 후 뒤로가기 
      echo"<script>alert('비밀번호가 일치하지 않습니다.'); history.back();</script>";
      exit;
    }

  }else{
    // 아이디 정보가 일치 하지 않는다면 
    echo "<script>alert('존재하지 않는 아이디입니다.'); history.back();</script>";
    exit;
  }
?>