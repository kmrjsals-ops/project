<?
include('../../db/db_conn.php');

// get으로 user_no를 받아옴 
$user_no = $_GET['no'];

// 전송받아온 no값으로 해당 회원 삭제하기 
$sql = "DELETE FROM users WHERE user_no = '$user_no'";
$result = mysqli_query($conn, $sql);

if($result){
  echo "<script>alert('회원이 정상적으로 삭제되었습니다.');location.href='member_list.php';</script>";
}else{
  echo "<script>alert('삭제 실패, 다시 시도해주세요.');history.back();</script>";
}
?>