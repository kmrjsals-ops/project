<?php
include('../common/header.php');
?>

<main>

<!-- ================================
      🔥 카테고리 스와이퍼 영역
================================ -->
<section class="lounge-category-bar pb-3 pt-3">
  <div class="container">
    <div class="d-flex align-items-center">

      <!-- 좌측 화살표 -->
      <button class="cat-arrow cat-prev swiper-cat-prev">
        <span>&lt;</span>
      </button>

      <!-- 카테고리 슬라이드 -->
      <div class="swiper categorySwiper flex-grow-1">
        <div class="swiper-wrapper">

          <?php
          // 카테고리 목록 배열로 관리 → 유지보수 쉬움
          $categories = [
            "뮤 포켓 나이츠", "테르비스", "뮤 오리진3", "드래곤 소드",
            "샷온라인", "R2 ORIGIN", "썬 리미티드 에디션", "뮤 블루",
            "R2M", "뮤 모나크", "뮤 아크엔젤", "메틴",
            // 여분 슬라이드 제거 → 원하는 만큼만 추가 가능
          ];

          foreach ($categories as $index => $cat): ?>
            <div class="swiper-slide">
              <a href="#" 
                class="cat-btn <?= $index === 0 ? 'active' : '' ?>" 
                title="<?= $cat ?>">
                <?= $cat ?>
              </a>
            </div>
          <?php endforeach; ?>

        </div>
      </div>

      <!-- 우측 화살표 -->
      <button class="cat-arrow cat-next swiper-cat-next">
        <span>&gt;</span>
      </button>

    </div>
  </div>
</section>

<!-- ================================
      🔥 글쓰기 UI
================================ -->
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">

      <div class="card shadow-sm border-0">
        <div class="card-body p-4">

          <!-- 유저 정보 + 카테고리 + 첨부파일 -->
          <div class="d-flex align-items-center mb-4">

            <!-- 프로필 이미지 -->
            <img src="../images/user_admin/user_default.png" 
                 width="45" height="45" 
                 class="rounded-circle me-3"
                 alt="profile">

            <!-- 닉네임 -->
            <div class="fw-semibold me-3">
              고드릭노눈임
            </div>

            <!-- 카테고리 선택 -->
            <select class="form-select w-auto me-auto" name="category">
              <option selected disabled>카테고리 선택</option>
              <?php foreach ($categories as $cat): ?>
                <option value="<?= $cat ?>"><?= $cat ?></option>
              <?php endforeach; ?>
            </select>

            <!-- 파일 업로드 -->
            <label class="btn btn-danger px-3 mb-0">
              첨부파일
              <input type="file" name="upload_file" hidden>
            </label>
          </div>

          <!-- 제목 -->
          <div class="mb-3">
            <label class="form-label fw-semibold">제목을 입력해주세요</label>
            <input type="text" 
                   class="form-control" 
                   name="title" 
                   placeholder="제목을 입력해주세요">
          </div>

          <!-- 내용 -->
          <div class="mb-4">
            <label class="form-label fw-semibold">내용을 입력해주세요</label>
            <textarea class="form-control"
                      name="content"
                      rows="10"
                      placeholder="내용을 입력해주세요"></textarea>
          </div>

          <!-- 등록 버튼 -->
          <div class="text-center">
            <button type="submit" class="btn btn-dark px-4">등록하기</button>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>

</main>

<?php include('../common/footer.php'); ?>