<?
session_start();

include_once('../../db/db_conn.php');

// 가져올 해당 공지사항 번호, 제목, 내용 ,이미지 조회 
$notice_no = intval($_POST['notice_no']);
$title = mysqli_real_escape_string($conn, $_POST['notice_title']);
$content = mysqli_real_escape_string($conn, $_POST['notice_content']);

$old_img = $_POST['old_img'];
$new_img = $old_img;

// 기존이미지가 아닌 새로운 이미지로 수정된 경우
if($_FILES['notice_img']['size'] > 0){
  $upload_dir = "../../uploads/notice/";
  if(!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);

  // 새 파일명 변수에 담아줌
  $new_img = time()."_".$_FILES['notice_img']['name'];
  
  // 파일 이동해준다
  move_uploaded_file($_FILES['notice_img']['tmp_name'], $upload_dir.$new_img);

  // 기존 이미지 삭제 (기존 이미지가 있을떄만 삭제해줌)
  if($old_img && file_exists($upload_dir. $old_img)){
    unlink($upload_dir.$old_img);
  }
}

// 수정하는 쿼리문 작성해준다
$sql = "UPDATE notice SET notice_title='$title', notice_content = '$content', notice_img='$new_img', update_datetime=NOW() WHERE notice_no=$notice_no";
$result = mysqli_query($conn, $sql);

if($result){
  echo "<script>alert('공지사항이 수정되었습니다.'); location.href='notice_view.php?no=$notice_no';</script>";
}else{
  echo "<script>alert('수정 실패하였습니다. 다시 시도해주세요.'); history.back();</script>";
}
?>