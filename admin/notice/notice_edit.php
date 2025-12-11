<?php
include('../../db/db_conn.php');
include('../admin_header.php');

// 해당 공지사항 번호 가져오기
$notice_no = intval($_GET['no']);

// 기존 공지 데이터 가져오기
$sql = "SELECT * FROM notice WHERE notice_no = $notice_no";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// 데이터 없음 처리
if (!$row) {
  echo "<script>alert('해당 공지사항을 찾을 수 없습니다.'); history.back();</script>";
  exit;
}
?>

<div class="admin-wrapper d-flex">

  <?php include('../admin_sidebar.php'); ?>

  <main class="admin-content p-4 w-100">

    <h2 class="mb-4">공지사항 수정</h2>

    <div class="card p-4 shadow-sm">
      <form action="notice_edit_ok.php" method="post" enctype="multipart/form-data">

        <!-- 수정할 공지 번호 -->
        <input type="hidden" name="notice_no" value="<?= $notice_no ?>">

        <!-- 제목 -->
        <div class="mb-3">
          <label class="form-label">제목</label>
          <input type="text" name="notice_title"
                 class="form-control"
                 value="<?= htmlspecialchars($row['notice_title']) ?>"
                 required>
        </div>

        <!-- 내용 -->
        <div class="mb-3">
          <label class="form-label">내용</label>
          <textarea name="notice_content"
                    rows="10"
                    class="form-control"
                    required><?= htmlspecialchars($row['notice_content']) ?></textarea>
        </div>

        <!-- 기존 이미지 -->
        <div class="mb-3">
          <label class="form-label">현재 이미지</label><br>

          <?php if ($row['notice_img']) : ?>
            <img src="/webzen/uploads/notice/<?= htmlspecialchars($row['notice_img']) ?>"
                 width="300"
                 alt="공지 이미지"
                 class="mb-3">
          <?php else : ?>
            <p class="text-muted">이미지 없음</p>
          <?php endif; ?>

          <!-- 기존 이미지 파일명 hidden -->
          <input type="hidden" name="old_img" value="<?= htmlspecialchars($row['notice_img']) ?>">
        </div>

        <!-- 새 이미지 업로드 -->
        <div class="mb-3">
          <label class="form-label">새 이미지 변경 (선택)</label>
          <input type="file" name="notice_img" class="form-control">
        </div>

        <!-- 버튼 -->
        <div class="mt-3">
          <button type="submit" class="btn btn-primary">수정완료</button>
          <a href="notice_view.php?no=<?= $notice_no ?>" class="btn btn-secondary">취소</a>
        </div>

      </form>
    </div>

  </main>
</div>

<?php include('../admin_footer.php'); ?>
