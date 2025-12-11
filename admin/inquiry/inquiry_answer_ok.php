<?php
include('../../db/db_conn.php');


// POST 값 받기
$inquiry_no = intval($_POST['inquiry_no']);
$reply = mysqli_real_escape_string($conn, $_POST['inquiry_reply']);

// 값 검증
if (empty($inquiry_no) || empty($reply)) {
  echo "<script>alert('답변 내용을 입력해주세요.'); history.back();</script>";
  exit;
}

// DB 업데이트
$sql = "
  UPDATE support_inquiry
  SET inquiry_reply = '$reply',
      inquiry_status = 'done',
      reply_datetime = NOW()
  WHERE inquiry_no = $inquiry_no
";

$result = mysqli_query($conn, $sql);

// 결과 확인
if ($result) {
  echo "<script>alert('답변이 등록되었습니다.'); location.href='inquiry_list.php';</script>";
  exit;
} else {
  echo "<script>alert('등록 실패. 다시 시도해주세요.'); history.back();</script>";
  exit;
}
?>