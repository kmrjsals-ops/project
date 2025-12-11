<?php
include('../admin_header.php');
include('../../db/db_conn.php');
?>

<div class="admin-wrapper d-flex">

  <?php include('../admin_sidebar.php'); ?>

  <main class="admin-content p-4 w-100">

    <h2 class="mb-4">게임 등록</h2>

    <div class="card shadow-sm">
      <div class="card-body">

        <form action="game_write_ok.php" method="post" enctype="multipart/form-data">

          <!-- 게임 제목 -->
          <div class="mb-3">
            <label class="form-label">게임 제목</label>
            <input type="text" name="game_title" class="form-control" required>
          </div>

          <!-- 플랫폼 -->
          <div class="mb-3">
            <label class="form-label">플랫폼</label>
            <select name="game_platform" class="form-select" required>
              <option value="">선택</option>
              <option value="pc">PC</option>
              <option value="mobile">모바일</option>
              <option value="both">PC + 모바일</option>
            </select>
          </div>

          <!-- 서비스 상태 -->
          <div class="mb-3">
            <label class="form-label">서비스 상태</label>
            <select name="game_status" class="form-select">
              <option value="service">서비스 중</option>
              <option value="end">서비스 종료</option>
              <option value="test">테스트 중</option>
            </select>
          </div>

          <!-- 요약 설명 -->
          <div class="mb-3">
            <label class="form-label">게임 요약 설명</label>
            <input type="text" name="game_summary" class="form-control" required>
          </div>

          <!-- 상세 설명 -->
          <div class="mb-3">
            <label class="form-label">게임 상세 설명</label>
            <textarea name="game_detail" rows="6" class="form-control" required></textarea>
          </div>

          <!-- 게임 이동 URL -->
          <div class="mb-3">
            <label class="form-label">게임 페이지 URL</label>
            <input type="url" name="game_url" class="form-control" required placeholder="https://example.com/play">
          </div>

          <!-- 썸네일 이미지 -->
          <div class="mb-3">
            <label class="form-label">게임 썸네일 이미지</label>
            <input type="file" name="thumbnail" class="form-control" required>
            <small class="text-muted">게임 카드에 표시될 대표 이미지</small>
          </div>

          <!-- 갤러리 이미지(여러개 가능) -->
          <div class="mb-3">
            <label class="form-label">게임 갤러리 이미지 (여러 개 가능)</label>
            <input type="file" name="gallery[]" class="form-control" multiple>
          </div>

          <!-- 버튼 -->
          <div class="mt-4">
            <button type="submit" class="btn btn-primary">등록하기</button>
            <a href="game_list.php" class="btn btn-secondary">취소</a>
          </div>

        </form>

      </div>
    </div>

  </main>
</div>

<?php include('../admin_footer.php'); ?>
