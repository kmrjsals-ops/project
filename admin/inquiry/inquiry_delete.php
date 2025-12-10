<?
  session_start();
  include('../../db/db_conn.php');

  // 관리자 권한 체크하기 
  if(!isset($_SESSION['mb_no']) || $_SESSION['mb_role'] !== 'admin'){
    echo "<script>alert('관리자 권한이 필요합니다.'); history.back();</script>";
    exit;
  }

  // 삭제할 전송받은 문의번호 변수 처리해줌
  $inquiry_no = intval($_GET['no']);
  if($inquiry_no <= 0){
    echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
    exit;
  }
  // 삭제 쿼리
  $sql = "DELETE FROM support_inquiry WHERE inquiry_no = $inquiry_no";
  $result = mysqli_query($conn, $sql);

  if($result){
    echo "<script>alert('문의가 삭제되었습니다.'); location.href='inquiry_list.php';</script>";
    exit;
  }else{
    echo"<script>alert('삭제 실패 . 다시 시도해주세요.'); history.back();</script>";
    exit;
  }
?>