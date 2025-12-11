<?php
include('../../db/db_conn.php');
include('../admin_header.php');

// 관리자 user_no (세션 값)
$admin_no = $_SESSION['mb_no'];
?>

<div class="admin-wrapper d-flex">

  <!-- 관리자 사이드바 -->
  <?php include('../admin_sidebar.php'); ?>

  <main class="admin-content p-4 w-100">

    <h2 class="mb-4">공지사항 작성</h2>

    <div class="card shadow-sm p-4">
      <form action="notice_write_ok.php" method="post" enctype="multipart/form-data">

        <!-- 관리자 고유키는 hidden으로 전달 -->
        <input type="hidden" name="admin_no" value="<?= $admin_no ?>">

        <!-- 공지 제목 -->
        <div class="mb-3">
          <label class="form-label">공지 제목</label>
          <input type="text" name="notice_title" class="form-control" required>
        </div>

        <!-- 공지 내용 -->
        <div class="mb-3">
          <label class="form-label">공지 내용</label>
          <textarea name="notice_content" rows="10" class="form-control" required></textarea>
        </div>

        <!-- 이미지 첨부 -->
        <div class="mb-3">
          <label class="form-label">이미지 첨부 (선택)</label>
          <input type="file" name="notice_img" class="form-control">
        </div>

        <!-- 버튼 영역 -->
        <button type="submit" class="btn btn-primary">등록</button>
        <a href="notice_list.php" class="btn btn-secondary">목록</a>
      </form>
    </div>

  </main>
</div>

<?php include('../admin_footer.php'); ?>
