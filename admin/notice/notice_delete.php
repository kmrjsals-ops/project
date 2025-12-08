<?
session_start();
include('../../db/db_conn.php');

// 삭제할 공지사항 번호를 끌어온다 
$notice_no = intval($_GET['no']);

// db , 서버에서 미지 삭제를 위해 이미지값을 조회
$sql = "SELECT notice_img FROM notice WHERE notice_no = $notice_no";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// 조회한 해당 공지가 없을 경우
if(!$row){
  echo"<script>alert('삭제할 공지사항을 찾을 수 없습니다.'); history.back();</script>";
  exit;
}

// db 컬럼에서 이미지 파일명 가져오기 
$img = $row['notice_img'];

// 2) db에서 해당 공지 삭제 
$sql_delete = "DELETE FROM notice WHERE notice_no = $notice_no";
$result_delete = mysqli_query($conn, $sql_delete);

if($result_delete){

  // 3) db삭제 성공 -> 이미지 삭제 
  if($img && file_exists("../../uploads/notice/".$img)){
    unlink("../../uploads/notice/" . $img);
  }

  echo "<script>alert('공지사항이 삭제되었습니다.'); location.href='notice_list.php';</script>";
}else{
  echo"<script>alert('삭제 실패하였습니다. 다시 시도해주세요'); history.back();</script>";
}


?>