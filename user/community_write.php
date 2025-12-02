<?php
// 커뮤니티 글쓰기 
session_start();
  include('../common/header.php');
?>

<main>
  <section class="lounge-category-bar pb-3 pt-3">
  <div class="container">
    <div class="d-flex align-items-center">
      <!-- 왼쪽화살표 -->
      <button class="cat-arrow cat-prev swiper-cat-prev">
        <span>&lt;</span>
      </button>

      <!-- 카테고리 스와이퍼 영역 -->
      <div class="swiper categorySwiper flex-grow-1">
        <div class="swiper-wrapper">

        <!-- 각 카테고리 하나 = slide 하나  -->
        <div class="swiper-slide">
          <a href="#" class="cat-btn active" title="뮤 포켓 나이츠">뮤 포켓 나이츠</a>
        </div>

        <div class="swiper-slide">
          <a href="#" class="cat-btn" title="테르비스">테르비스</a>
        </div>

        <div class="swiper-slide">
          <a href="#" class="cat-btn" title="뮤 오리진3">뮤 오리진3</a>
        </div>

        <div class="swiper-slide">
          <a href="#" class="cat-btn" title="드래곤 소드">드래곤 소드</a>
        </div>

        <div class="swiper-slide">
          <a href="#" class="cat-btn" title="샷 온라인">샷온라인 </a>
        </div>

        <div class="swiper-slide">
          <a href="#" class="cat-btn" title="R2 ORIGIN">R2 ORIGIN</a>
        </div>

        <div class="swiper-slide">
          <a href="#" class="cat-btn" title="썬 리미티드 에디션">썬 리미티드 에디션</a>
        </div>

        <div class="swiper-slide">
          <a href="#" class="cat-btn" title="뮤 블루">뮤 블루</a>
        </div>

        <div class="swiper-slide">
          <a href="#" class="cat-btn" title="R2M">R2M</a>
        </div>

        <div class="swiper-slide">
          <a href="#" class="cat-btn" title="뮤 모나크">뮤 모나크</a>
        </div>

        <div class="swiper-slide">
          <a href="#" class="cat-btn" title="뮤 아크엔젤">뮤 아크엔젤</a>
        </div>

        <div class="swiper-slide">
          <a href="#" class="cat-btn" title="메틴">메틴</a>
        </div>
        <div class="swiper-slide">
          <a href="#" class="cat-btn" title="뮤 아크엔젤">뮤 아크엔젤</a>
        </div>

        <div class="swiper-slide">
          <a href="#" class="cat-btn" title="메틴">메틴</a>
        </div>
        <div class="swiper-slide">
          <a href="#" class="cat-btn" title="뮤 아크엔젤">뮤 아크엔젤</a>
        </div>

        <div class="swiper-slide">
          <a href="#" class="cat-btn" title="메틴">메틴</a>
        </div>


        </div>    
      </div>

        <!-- 오른쪽 화살표 -->
      <button class="cat-arrow cat-next swiper-cat-next">
        <span>&gt;</span>
      </button>
    </div>
  </div>
</section>
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">

      <!-- 글쓰기 카드 -->
      <div class="card shadow-sm border-0">
        <div class="card-body p-4">

          <!-- 유저 정보 + 카테고리 + 첨부파일 -->
          <div class="d-flex align-items-center mb-4">

            <!-- 프로필 -->
            <img src="../images/user_admin/user_default.png" class="rounded-circle me-3" width="45" height="45" alt="profile">

            <!-- 닉네임 -->
            <div class="fw-semibold me-3">
              고드릭노눈임
            </div>

            <!-- 카테고리 선택 -->
            <select class="form-select w-auto me-auto" name="category">
              <option selected disabled>카테고리 선택</option>
              <option value="뮤 포켓 나이츠">뮤 포켓 나이츠</option>
              <option value="테르비스">테르비스</option>
              <option value="뮤 오리진3">뮤 오리진3</option>
              <option value="드래곤 소드">드래곤 소드</option>
            </select>

            <!-- 첨부파일 버튼 -->
            <label class="btn btn-danger px-3 mb-0">
              첨부파일
              <input type="file" name="upload_file" hidden>
            </label>

          </div>

          <!-- 제목 -->
          <div class="mb-3">
            <label class="form-label fw-semibold">제목을 입력해주세요</label>
            <input type="text" class="form-control" name="title" placeholder="제목을 입력해주세요">
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

<?php
  include('../common/footer.php');
?>