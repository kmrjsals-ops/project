<?php
session_start();
include('../db/db_conn.php');

// 로그인 여부 확인
if (!isset($_SESSION['mb_no'])) {
  echo "<script>alert('로그인이 필요합니다.'); location.href='/login.php';</script>";
  exit;
}

$user_no = intval($_SESSION['mb_no']);

// POST 값 받기
$category = mysqli_real_escape_string($conn, $_POST['inquiry_category']);
$title = mysqli_real_escape_string($conn, $_POST['inquiry_title']);
$content = mysqli_real_escape_string($conn, $_POST['inquiry_content']);

// 빈 값 체크
if (empty($title) || empty($content) || empty($category)) {
  echo "<script>alert('모든 필드를 입력해주세요.'); history.back();</script>";
  exit;
}

// 첨부파일 처리
$upload_file = "";  // 저장될 파일명

if (!empty($_FILES['inquiry_file']['name'])) {

    $file_name = $_FILES['inquiry_file']['name'];
    $tmp_name = $_FILES['inquiry_file']['tmp_name'];

    // 파일 저장 폴더
    $upload_dir = "../uploads/inquiry/";

    // 폴더 없으면 생성
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // 저장할 파일이름(중복방지)
    $save_name = date("YmdHis") . "_" . rand(1000, 9999) . "_" . basename($file_name);
    $file_path = $upload_dir . $save_name;

    // 업로드 실행
    if (move_uploaded_file($tmp_name, $file_path)) {
        $upload_file = $save_name;
    }
}

// DB 저장
$sql = "
  INSERT INTO support_inquiry 
  (user_no, inquiry_category, inquiry_title, inquiry_content, inquiry_file, inquiry_status, create_datetime)
  VALUES 
  ($user_no, '$category', '$title', '$content', '$upload_file', 'waiting', NOW())
";

$result = mysqli_query($conn, $sql);

// 결과 확인

if ($result) {
  echo "<script>alert('문의가 등록되었습니다.'); location.href='../user/mypage.php#inquiries';</script>";
  exit;
} else {
  echo mysqli_error($conn); // ← 추가
  exit;
}
?>