<?php
include('../admin_header.php');
include('../../db/db_conn.php');

// 관리자 권한 체크
if (!isset($_SESSION['mb_no']) || $_SESSION['mb_role'] !== 'admin') {
    echo "<script>alert('관리자 권한이 필요합니다.'); history.back();</script>";
    exit;
}

// 삭제할 문의번호 확인
$inquiry_no = intval($_GET['no']);
if ($inquiry_no <= 0) {
    echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
    exit;
}

// 문의 정보 조회 (존재 여부 확인)
$sql_check = "SELECT inquiry_no FROM support_inquiry WHERE inquiry_no = $inquiry_no";
$result_check = mysqli_query($conn, $sql_check);
if (mysqli_num_rows($result_check) === 0) {
    echo "<script>alert('삭제할 문의를 찾을 수 없습니다.'); history.back();</script>";
    exit;
}

// 삭제 쿼리 실행
$sql_delete = "DELETE FROM support_inquiry WHERE inquiry_no = $inquiry_no";
$result_delete = mysqli_query($conn, $sql_delete);

if ($result_delete) {
    echo "<script>alert('문의가 삭제되었습니다.'); location.href='inquiry_list.php';</script>";
    exit;
} else {
    echo "<script>alert('삭제 실패. 다시 시도해주세요.'); history.back();</script>";
    exit;
}
?>
