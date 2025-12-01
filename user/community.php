<?
session_start();
  include('../common/header.php');
?>

<main>
  <!-- 커뮤니티 페이지  -->
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
<!-- 배경이미지 z-index로 조절  -->
<img src="../images/community/community_bg.jpg" alt="배경이미지" class="community_bg">
</main>

<section>
  
</section>
<?
  include('../common/footer.php');
?>