<?php
include '../common/header.php';
?>
<link rel="stylesheet" type="text/css" href="../css/game.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<main>
  <div class="main-container">
    <!-- 슬라이드 배너 -->
    <div class="slider-container">
        <div class="slide-item active" style="background-image: url('../images/game/banner01.png');"></div>
        <div class="slide-item" style="background-image: url('../images/game/banner02.png');"></div>
        <div class="slide-item" style="background-image: url('../images/game/banner03.png');"></div>
        <div class="slide-item" style="background-image: url('../images/game/banner04.png');"></div>
    </div>

    <!-- 탭 및 검색 영역 -->
    <div class="filter-section">
        <div class="tabs">
            <button class="tab-button active" data-platform="pc">PC게임</button>
            <button class="tab-button" data-platform="mobile">MOBILE게임</button>
        </div>
        
        <div class="search-box">
            <input type="search" class="search-input" placeholder="Search">
            <!-- SVG 검색 아이콘 -->
            <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
            </svg>
        </div>
    </div>

        <!-- 5. 게임 목록 카드 영역 -->
        <ul class="game-list" id="gameList">
        </ul>
    </div>

<script src="../script/game.js"></script>
</main>

<?php
include_once '../common/footer.php';
?>