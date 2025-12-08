<?
session_start();
include('../../db/db_conn.php');

$admin_no = intval($_POST['admin_no']);
$title = mysqli_real_escape_string($conn, $_POST['notice_title']);
$content = mysqli_real_escape_string($conn,$_POST['notice_content']);

$img = NULL;

//이미지 업로드를 위한 업로드 처리를 한다 
if(isset($_FILES['notice_img']) && $_FILES['notice_img']['size'] > 0){

  $upload_dir = "../../uploads/notice/";

  // 폴더 없으면 자동 생성 (혹시 몰라서)
  if(!is_dir($upload_dir)){
    mkdir($upload_dir, 0777, true);
  }

  // 파일명 중복 방지하기
  $img = time() . "_" . $_FILES['notice_img']['name'];

  move_uploaded_file($_FILES['notice_img']['tmp_name'], $upload_dir.$img);
}

$sql = "INSERT INTO notice (admin_no, notice_title, notice_content, notice_img) VALUES ($admin_no, '$title','$content','$img')";

$result = mysqli_query($conn,$sql);

if($result){
  echo "<script>alert('공지사항이 등록되었습니다.'); location.href='notice_list.php';</script>";
}else{
  "<script>alert('등록 실패하였습니다. 다시 시도해주세요.'); history.back();</script>";
}
?>