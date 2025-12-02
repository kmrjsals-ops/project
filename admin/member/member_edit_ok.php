<?
include('../../db/db_conn.php');

//유저 번호와 유저권한을 가져온다 
$user_no = $_POST['user_no']; //유저 번호와 일치하는 데이터를
$user_role = $_POST['user_role']; //새로 바뀐 유저 권한을 적용할 예정

// update문 작성 
$sql = "UPDATE users SET user_role = '$user_role' WHERE user_no = '$user_no'";
$result = mysqli_query($conn, $sql);

if($result){
  echo "<script>alert('회원 권한이 변경 되었습니다.');location.href='member_view.php?no=$user_no';</script>";
}else{
  echo"<script>alert('변경 실패!'); history.back();</script>";
}
?>