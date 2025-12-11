<?php
include_once('../../db/db_conn.php');

// 공지사항 번호
$notice_no = intval($_POST['notice_no']);

// 제목, 내용 보안 처리
$title   = mysqli_real_escape_string($conn, $_POST['notice_title']);
$content = mysqli_real_escape_string($conn, $_POST['notice_content']);

// 기존 이미지 파일명
$old_img = $_POST['old_img'] ?? '';
$new_img = $old_img;

// 업로드 폴더 경로
$upload_dir = "../../uploads/notice/";

// 새 이미지 업로드 검사
if (isset($_FILES['notice_img']) && $_FILES['notice_img']['size'] > 0) {

    // 업로드 폴더 없으면 생성
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // 새 파일명 (중복 방지)
    $new_img = time() . "_" . basename($_FILES['notice_img']['name']);

    // 임시 파일을 실제 경로로 이동
    if (move_uploaded_file($_FILES['notice_img']['tmp_name'], $upload_dir . $new_img)) {

        // 기존 이미지 삭제 (기존 파일이 존재할 경우)
        if (!empty($old_img) && file_exists($upload_dir . $old_img)) {
            unlink($upload_dir . $old_img);
        }

    } else {
        echo "<script>alert('이미지 업로드 중 오류가 발생했습니다.'); history.back();</script>";
        exit;
    }
}

// 공지사항 업데이트 쿼리
$sql = "
    UPDATE notice
    SET notice_title = '$title',
        notice_content = '$content',
        notice_img = '$new_img',
        update_datetime = NOW()
    WHERE notice_no = $notice_no
";

$result = mysqli_query($conn, $sql);

// 수정 완료 처리
if ($result) {
    echo "<script>alert('공지사항이 수정되었습니다.'); location.href='notice_view.php?no=$notice_no';</script>";
} else {
    echo "<script>alert('수정 실패하였습니다. 다시 시도해주세요.'); history.back();</script>";
}
?>
