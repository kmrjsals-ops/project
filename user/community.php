<?php
include('../common/header.php');

// 카테고리 리스트 (중복 전부 제거)
$categories = [
  "뮤 포켓 나이츠", "테르비스", "뮤 오리진3", "드래곤 소드",
  "샷온라인", "R2 ORIGIN", "썬 리미티드 에디션", "뮤 블루",
  "R2M", "뮤 모나크", "뮤 아크엔젤", "메틴"
];
?>

<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = {
  theme: {
    extend: {
      colors: {
        'webzen-red': '#E4002B',
        'webzen-dark': '#111827',
        'webzen-active-red': '#D1242E',
      }
    }
  }
};

// 검색 기능 테스트용
document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('searchForm');
  if (form) {
    form.addEventListener('submit', () => {
      const keyword = document.getElementById('searchInput').value;
      console.log("검색어:", keyword);
    });
  }
});
</script>

<main>

<!-- ======================
      🔥 카테고리 영역
====================== -->
<section class="lounge-category-bar py-3">
  <h2 style="visibility:hidden">카테고리 영역</h2>
  <div class="container">
    <div class="d-flex align-items-center">
      
      <!-- 왼쪽 화살표 -->
      <button class="cat-arrow cat-prev swiper-cat-prev"><span>&lt;</span></button>
      
      <!-- 카테고리 슬라이더 -->
      <div class="swiper categorySwiper flex-grow-1">
        <div class="swiper-wrapper">
          <?php foreach ($categories as $i => $cat): ?>
            <div class="swiper-slide">
              <a href="#" 
                 class="cat-btn <?= $i === 0 ? 'active' : '' ?>"
                 title="<?= htmlspecialchars($cat) ?>">
                 <?= htmlspecialchars($cat) ?>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- 오른쪽 화살표 -->
      <button class="cat-arrow cat-next swiper-cat-next"><span>&gt;</span></button>

    </div>
  </div>
</section>

<!-- 배경 이미지 -->
<img src="../images/community/community_bg.jpg" 
     alt="커뮤니티 배경 이미지"
     class="community_bg">

     <!-- ======================
     🔥 커뮤니티 메인 레이아웃
     ====================== -->
     <section class="community-content">
       <h2 style="visibility:hidden">최신글</h2>
       <div class="community-layout">
         
         <!-- ======================
         📌 왼쪽 게시글 목록
         ======================= -->
         <div class="post-list-area mt-[-20rem]">
           
           <!-- 글쓰기 버튼 -->
           <div class="write-button-container">
             <a href="community_writeee.php" id="writeButton" class="write-button">
          <span>글쓰기</span>
        </a>
      </div>

      <!-- 게시글 카드 전체 -->
      <div class="post-list-card">

        <!-- ======================
              📌 게시글 반복영역
           (지금은 그대로 두되, 반복문 적용 가능)
        ======================= -->

        <!-- 게시글 1 -->
        <article class="post-item">
          <h3 style="visibility:hidden">카테고리 영역</h3>
          <div class="post-item-detail">

            <a class="avatar" href="no" title="사용자 A">
              <img src="https://placehold.co/40x40/f43f5e/fff?text=A" alt="이미지" class="w-full h-full object-cover">
            </a>

            <div class="flex-grow">
              <div class="post-info-header">
                <div>
                  <a class="username" href="no">집가고싶다</a>
                  <p class="text-xs text-gray-500">20XX/11/20</p>
                </div>
                <span class="game-tag">뮤오리진3</span>
              </div>

              <a class="post-title-link" href="no">님들 이거 어케함</a>

              <p class="post-summary">
                ㄹㅇ 뭐하고 있는건가 싶네요. 도저히 답이 안나와서 하루종일 붙잡고 있는데 저만 이런가요?
              </p>

              <div class="post-meta-actions">
                <a class="meta-button" href="javascript:void(0)">
                  ❤️ <span>13</span>
                </a>
                <a class="meta-button" href="#">
                  💬 <span>2</span>
                </a>
              </div>

            </div>
          </div>
        </article>

        <!-- ===== 게시글 2~N 동일 구조 ===== -->
        <!-- 그대로 유지 (필요하면 반복문으로 변환 가능) -->

      </div>

      <!-- 페이지네이션 -->
      <div class="pagination-container">
        <a href="no" class="pagination-arrow">〈</a>
        <a href="no" class="pagination-link pagination-current">1</a>
        <a href="no" class="pagination-link">2</a>
        <a href="no" class="pagination-link">3</a>
        <a href="no" class="pagination-arrow">〉</a>
      </div>

    </div>


    <!-- ======================
          📌 오른쪽 사이드바
    ======================= -->
    <div class="sidebar-area mt-[-22rem]">

      <!-- 검색 박스 -->
      <div class="search-box-card">
        <form id="searchForm" class="search-form" action="#">
          <input type="search" 
                 id="searchInput"
                 name="q"
                 placeholder="제목을 입력해주세요."
                 aria-label="게시글 검색"
                 class="search-input">

          <button class="search-button" type="submit">
            🔍
          </button>
        </form>
      </div>

      <!-- 광고 -->
      <div class="ad-banner-placeholder">
        <a href="#">
          <img src="../images/notice/ad_banner01.png" alt="광고" class="w-full h-full object-cover">
        </a>
      </div>

      <!-- 신규 게임 -->
      <div class="new-games-card">
        <h3 class="new-game-title">신규게임</h3>
        <ul class="new-games-list">

          <?php
          $newGames = [
            ["뮤:포켓 나이츠", "../images/notice/new02.png"],
            ["R2 ORIGIN", "../images/notice/new03.png"],
            ["테르비스", "../images/notice/new04.png"],
            ["드래곤소드", "../images/notice/new01.png"]
          ];

          foreach ($newGames as $g): ?>
            <li>
              <a href="#" class="new-game-item">
                <div class="game-thumb">
                  <img src="<?= $g[1] ?>" class="w-full h-full object-cover" alt="이미지">
                </div>
                <span><?= $g[0] ?></span>
              </a>
            </li>
          <?php endforeach; ?>

        </ul>
      </div>

    </div>

  </div>
</section>

</main>

<?php include('../common/footer.php'); ?>