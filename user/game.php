<?php
include('../common/header.php');
include('../db/db_conn.php');

// 전체 게임 데이터 불러오기
$sql = "
    SELECT g.game_no, g.game_title, g.game_platform, g.game_summary, img.image_url
    FROM games g
    LEFT JOIN game_images img 
        ON g.game_no = img.game_no 
       AND img.image_type = 'thumbnail'
    ORDER BY g.game_no DESC
";
$result = mysqli_query($conn, $sql);

// PHP 배열로 저장
$games = [];
while ($row = mysqli_fetch_assoc($result)) {
    $games[] = $row;
}
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

        <!-- 검색 기능 (필요하면 연동) -->
        <div class="search-box">
            <input type="search" id="searchInput" class="search-input" placeholder="Search">
            <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
            </svg>
        </div>
    </div>

    <!-- 게임 카드 출력 영역 -->
    <ul class="game-list" id="gameList"></ul>

  </div>

<script src="../script/game.js"></script>
<script>
// -----------------------------------------------
// 1) PHP 데이터를 JS로 변환
// -----------------------------------------------
const allGames = <?= json_encode($games, JSON_UNESCAPED_UNICODE) ?>;


// -----------------------------------------------
// 2) 게임 목록 렌더링 함수
// platform: pc / mobile
// -----------------------------------------------
function renderGameList(platform, keyword = "") {
    const list = document.getElementById("gameList");
    list.innerHTML = "";

    const filtered = allGames.filter(g =>
        g.game_platform === platform &&
        (g.game_title.includes(keyword) || g.game_summary.includes(keyword))
    );

    if (filtered.length === 0) {
        list.innerHTML = "<p class='no-data'>게임이 없습니다.</p>";
        return;
    }

    filtered.forEach(g => {
        const card = `
            <a class="game-card" href="game_view.php?no=${g.game_no}">
                <div class="card-image" style="background-image: url('../uploads/games/${g.image_url}')"></div>
                <div class="card-content">
                    <div class="card-title">${g.game_title}</div>
                </div>
            </a>
        `;
        list.innerHTML += card;
    });
}


// -----------------------------------------------
// 3) 탭 버튼 클릭 → 즉시 필터링
// -----------------------------------------------
const tabButtons = document.querySelectorAll(".tab-button");
let currentPlatform = "pc";

tabButtons.forEach(btn => {
    btn.addEventListener("click", () => {

        // 탭 상태 변경
        tabButtons.forEach(b => b.classList.remove("active"));
        btn.classList.add("active");

        currentPlatform = btn.dataset.platform;
        renderGameList(currentPlatform, document.getElementById("searchInput").value);
    });
});


// -----------------------------------------------
// 4) 검색 기능
// -----------------------------------------------
document.getElementById("searchInput").addEventListener("input", (e) => {
    renderGameList(currentPlatform, e.target.value);
});


// -----------------------------------------------
// 5) 페이지 로드 시 PC게임 자동 출력
// -----------------------------------------------
renderGameList("pc");
</script>

</main>

<?php include('../common/footer.php'); ?>

