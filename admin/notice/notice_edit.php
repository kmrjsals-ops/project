<?
session_start();
include('../../db/db_conn.php');

// 해당 공지사항 번호 가져오기 
$notice_no = intval($_GET['no']);

//기존 공지 데이터 가져오기
$sql = "SELECT * FROM notice WHERE notice_no = $notice_no";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// 만약에 해당 공지사항 검색 결과가없는지 조건식 검사
if(!$row){
  echo "<script>alert('해당 공지사항을 찾을 수 없습니다.'); history.back();</script>";
  exit;
}
?>

<? include('../admin_header.php');?>
<div class="admin-wrapper d-flex">
<? include('../admin_sidebar.php');?>

<main class="container mt-5">
  <h2>공지사항 수정 </h2>
  <form action="notice_edit_ok.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="notice_no" value="<?= $notice_no ?>">

    <p>
      <label>제목</label>
      <input type="text" name="notice_title" value="<?= $row['notice_title']?>" class="form-control" required>
    </p>
    <p>
      <label>내용</label>
      <textarea name="notice_content" rows="10" class="form-control" required><?= $row['notice_content']?></textarea>
    </p>
    <p>
      <label>현재 이미지</label><br>
      <? if($row['notice_img']) {?>
        <img src="../../uploads/notice/<?= $row['notice_img']?>" width="300" alt="공지 이미지">
        <br><br>
      <?}else{?>
        <span>이미지 없음</span> <br><br>
      <?}?>
    </p>
    <p>
      <label> 새 이미지 변경 (선택) </label>
      <br>
      <input type="file" name="notice_img">
      <input type="hidden" name="old_img" value="<?= $row['notice_img']?>">
    </p>

    <p>
      <button type="submit" class="btn btn-primary">수정완료</button>
      <a href="notice_view.php?no=<?= $notice_no?>" class="btn btn-secondary">취소</a>
    </p>
  </form>
</main>
</div>

<? include('../admin_footer.php');?>