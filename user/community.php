<?php
  include('../common/header.php');
?>
<!-- Tailwind CSS CDN 로드 -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Tailwind CSS 커스텀 설정 (색상 변수 정의를 위해 유지)
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
        }
        
        // 검색 폼 제출 시 실제 검색 동작을 시뮬레이션
        document.addEventListener('DOMContentLoaded', () => {
            const searchForm = document.getElementById('searchForm');
            if (searchForm) {
                searchForm.addEventListener('submit', (e) => {
                    // 검색어만 콘솔에 출력 (디버깅 목적)
                    const searchTerm = document.getElementById('searchInput').value;
                    console.log(`Searching for: ${searchTerm}`);
                    
                    // 실제 폼 제출은 막지 않고 (href="#search-results"로 이동 가정), e.preventDefault()는 제거
                });
            }
        });
    </script>
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
  <!-- 배경이미지 z-index로 조절  -->

</section>
<img src="../images/community/community_bg.jpg" alt="배경이미지" class="community_bg">
<section class="community-content">
        <div class="community-layout">

            <!-- 왼쪽: 게시판 목록 영역 (2/3) -->
            <div class="post-list-area mt-[-20rem]">
                <div class="write-button-container">
                    <!-- 글쓰기 버튼 -->
                    <a href="#" id="writeButton" class="write-button">
                        <span>글쓰기</span>
                    </a>
                </div>
                <!-- 게시글 목록 카드 -->
                <div class="post-list-card">
                    
                    <!-- 게시글 항목 1 -->
                    <article class="post-item">
                        <div class="post-item-detail">
                            <!-- 아바타 -->
                            <a href="index.html" class="avatar" title="사용자 A 프로필">
                                <img src="https://placehold.co/40x40/f43f5e/FFFFFF?text=A" alt="프로필 아바타" class="w-full h-full object-cover">
                            </a>
                            <!-- 게시글 내용 -->
                            <div class="flex-grow">
                                <div class="post-info-header">
                                    <div>
                                        <a href="#user-profile-a" class="username">집가고싶다</a>
                                        <p class="text-xs text-gray-500">20XX/11/20</p>
                                    </div>
                                    <span class="game-tag">뮤오리진 3</span>
                                </div>
                                <!-- 게시글 제목 -->
                                <a href="#post-1" class="post-title-link">
                                    님들 이거 어케함
                                </a>
                                <p class="post-summary">
                                    ㄹㅇ 뭐하고 있는건가 싶네요. 도저히 답이 안나와서 하루종일 붙잡고 있는데 저만 이런가요? 혹시 좋은 팁이나 공략 영상 아시는 분 있으면 공유 부탁드립니다!
                                </p>
                                <!-- 좋아요/댓글 버튼 -->
                                <div class="post-meta-actions">
                                    <a href="javascript:void(0)" class="meta-button" title="좋아요">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                                        <span>13</span>
                                    </a>
                                    <a href="#post-1-comments" class="meta-button" title="댓글 보기">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C5.385 15.655 6 14.128 6 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                        <span>2</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>

                    <!-- 게시글 항목 2 -->
                    <article class="post-item">
                        <div class="post-item-detail">
                            <a href="#user-profile-b" class="avatar" title="사용자 B 프로필">
                                <img src="https://placehold.co/40x40/10b981/FFFFFF?text=B" alt="프로필 아바타" class="w-full h-full object-cover">
                            </a>
                            <div class="flex-grow">
                                <div class="post-info-header">
                                    <div>
                                        <a href="#user-profile-b" class="username">우어우아우어</a>
                                        <p class="text-xs text-gray-500">20XX/11/20</p>
                                    </div>
                                    <span class="game-tag">뮤 : 포켓 나이츠</span>
                                </div>
                                <a href="#post-2" class="post-title-link">
                                    2층 보스 레이드 팟 구함
                                </a>
                                <p class="post-summary">
                                    5인 팟 레이드 서포터 한분 구해서 같이 작업할 예정입니다. 딜러 스펙이나 보상 템 드랍 등 자세한 사항은 쪽지로 문의 주세요. 선착순입니다.
                                </p>
                                <div class="post-meta-actions">
                                    <a href="javascript:void(0)" class="meta-button" title="좋아요">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                                        <span>3</span>
                                    </a>
                                    <a href="#post-2-comments" class="meta-button" title="댓글 보기">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C5.385 15.655 6 14.128 6 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                        <span>13</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                    
                    <!-- 게시글 항목 3 -->
                    <article class="post-item">
                        <div class="post-item-detail">
                            <a href="#user-profile-c" class="avatar" title="사용자 C 프로필">
                                <img src="https://placehold.co/40x40/3b82f6/FFFFFF?text=C" alt="프로필 아바타" class="w-full h-full object-cover">
                            </a>
                            <div class="flex-grow">
                                <div class="post-info-header">
                                    <div>
                                        <a href="#user-profile-c" class="username">세류</a>
                                        <p class="text-xs text-gray-500">20XX/11/19</p>
                                    </div>
                                    <span class="game-tag">드래곤소드</span>
                                </div>
                                <a href="#post-3" class="post-title-link">
                                    님들 점메추 ㅋㅋㅋ
                                </a>
                                <p class="post-summary">
                                    저는 어제 짜장 먹어서 오늘은 그냥 다른 거 땡겨요. 추천해 주실 만한 메뉴가 있을까요? 맵지 않은 음식 위주로 부탁드립니다!
                                </p>
                                <div class="post-meta-actions">
                                    <a href="javascript:void(0)" class="meta-button" title="좋아요">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                                        <span>7</span>
                                    </a>
                                    <a href="#post-3-comments" class="meta-button" title="댓글 보기">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C5.385 15.655 6 14.128 6 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                        <span>23</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="post-item">
                        <div class="post-item-detail">
                            <a href="#user-profile-c" class="avatar" title="사용자 C 프로필">
                                <img src="https://placehold.co/40x40/3b82f6/FFFFFF?text=C" alt="프로필 아바타" class="w-full h-full object-cover">
                            </a>
                            <div class="flex-grow">
                                <div class="post-info-header">
                                    <div>
                                        <a href="#user-profile-c" class="username">세류</a>
                                        <p class="text-xs text-gray-500">20XX/11/19</p>
                                    </div>
                                    <span class="game-tag">드래곤소드</span>
                                </div>
                                <a href="#post-3" class="post-title-link">
                                    님들 점메추 ㅋㅋㅋ
                                </a>
                                <p class="post-summary">
                                    저는 어제 짜장 먹어서 오늘은 그냥 다른 거 땡겨요. 추천해 주실 만한 메뉴가 있을까요? 맵지 않은 음식 위주로 부탁드립니다!
                                </p>
                                <div class="post-meta-actions">
                                    <a href="javascript:void(0)" class="meta-button" title="좋아요">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                                        <span>7</span>
                                    </a>
                                    <a href="#post-3-comments" class="meta-button" title="댓글 보기">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C5.385 15.655 6 14.128 6 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                        <span>23</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="post-item">
                        <div class="post-item-detail">
                            <a href="#user-profile-c" class="avatar" title="사용자 C 프로필">
                                <img src="https://placehold.co/40x40/3b82f6/FFFFFF?text=C" alt="프로필 아바타" class="w-full h-full object-cover">
                            </a>
                            <div class="flex-grow">
                                <div class="post-info-header">
                                    <div>
                                        <a href="#user-profile-c" class="username">세류</a>
                                        <p class="text-xs text-gray-500">20XX/11/19</p>
                                    </div>
                                    <span class="game-tag">드래곤소드</span>
                                </div>
                                <a href="#post-3" class="post-title-link">
                                    님들 점메추 ㅋㅋㅋ
                                </a>
                                <p class="post-summary">
                                    저는 어제 짜장 먹어서 오늘은 그냥 다른 거 땡겨요. 추천해 주실 만한 메뉴가 있을까요? 맵지 않은 음식 위주로 부탁드립니다!
                                </p>
                                <div class="post-meta-actions">
                                    <a href="javascript:void(0)" class="meta-button" title="좋아요">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                                        <span>7</span>
                                    </a>
                                    <a href="#post-3-comments" class="meta-button" title="댓글 보기">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C5.385 15.655 6 14.128 6 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                        <span>23</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- 페이지네이션 -->
                <div class="pagination-container">
                    <a href="#page-prev" class="pagination-arrow" title="이전 페이지">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    </a>
                    <a href="#page-1" class="pagination-link pagination-current">1</a>
                    <a href="#page-2" class="pagination-link">2</a>
                    <a href="#page-3" class="pagination-link">3</a>
                    <a href="#page-next" class="pagination-arrow" title="다음 페이지">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>
            </div>


	<!-- 오른쪽: 사이드바 영역 (1/3) -->
	<div class="sidebar-area mt-[-22rem]">
			
	<!-- 검색 박스 -->
	<div class="search-box-card">
			<!-- 검색 폼 -->
			<form id="searchForm" action="#search-results" class="search-form">
					<input id="searchInput" type="search" placeholder="제목을 입력해주세요." 
									class="search-input" 
									name="q" aria-label="게시글 검색">
					<button id="searchButton" type="submit" class="search-button" title="검색">
							<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
					</button>
			</form>
	</div>
                
                <!-- 광고/이미지 영역 -->
                <div class="ad-banner-placeholder">
                    <!-- 광고 이미지 placeholder -->
                    <a href="#event-link">
                        <img src="../images/notice/ad_banner01.png" alt="광고 이미지" class="w-full h-full object-cover">
                    </a>
                </div>

                <!-- 신규 게임 란 (New Games Section) -->
                <div class="new-games-card">
                    <h3 class="new-game-title">신규게임</h3>
                    <ul class="new-games-list">
                        <!-- 게임 1 -->
                        <li>
                            <a href="#game-mu-pocket-details" class="new-game-item">
                                <div class="game-thumb">
                                    <img src="../images/notice/new02.png" alt="뮤:포켓 나이츠 썸네일" class="w-full h-full object-cover">
                                </div>
                                <span>뮤:포켓 나이츠</span>
                            </a>
                        </li>
                        <!-- 게임 2 -->
                        <li>
                            <a href="#game-r2-origin-details" class="new-game-item">
                                <div class="game-thumb">
                                    <img src="../images/notice/new03.png" alt="R2 ORIGIN 썸네일" class="w-full h-full object-cover">
                                </div>
                                <span>R2 ORIGIN</span>
                            </a>
                        </li>
                        <!-- 게임 3 -->
                        <li>
                            <a href="#game-tervis-details" class="new-game-item">
                                <div class="game-thumb">
                                    <img src="../images/notice/new04.png" alt="테르비스 썸네일" class="w-full h-full object-cover">
                                </div>
                                <span>테르비스</span>
                            </a>
                        </li>
												<!-- 게임 4 -->
                        <li>
                            <a href="#game-dragonswords-details" class="new-game-item">
                                <div class="game-thumb">
                                    <img src="../images/notice/new01.png" alt="드래곤소드 썸네일" class="w-full h-full object-cover">
                                </div>
                                <span>테르비스</span>
                            </a>
                        </li>
                    </ul>
                </div>
                
            </div>
        </div>
    </section>
</main>


<?php
  include('../common/footer.php');
?>