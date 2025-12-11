<?php
include('../../db/db_conn.php');

// 삭제할 공지사항 번호
$notice_no = intval($_GET['no']);

// 1) 해당 공지의 이미지 파일명 조회
$sql = "SELECT notice_img FROM notice WHERE notice_no = $notice_no";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// 공지 없음
if (!$row) {
  echo "<script>alert('삭제할 공지사항을 찾을 수 없습니다.'); history.back();</script>";
  exit;
}

$img = $row['notice_img'];
$upload_dir = "../../uploads/notice/";

// 2) DB에서 공지 삭제
$sql_delete = "DELETE FROM notice WHERE notice_no = $notice_no";
$result_delete = mysqli_query($conn, $sql_delete);

if ($result_delete) {

  // 3) 공지 삭제 성공 → 이미지 삭제
  if (!empty($img)) {
    $img_path = $upload_dir . $img;

    if (file_exists($img_path)) {
      unlink($img_path);
    }
  }

  echo "<script>alert('공지사항이 삭제되었습니다.'); location.href='notice_list.php';</script>";
  exit;

} else {

  echo "<script>alert('삭제 실패하였습니다. 다시 시도해주세요.'); history.back();</script>";
  exit;

}
?>
