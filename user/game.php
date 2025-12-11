<?php
include '../common/header.php';
include '../db/db_conn.php';

/* ---------------------------------------------------
   📌 게임 목록 조회 (썸네일 없는 게임도 대비)
--------------------------------------------------- */
$sql = "
    SELECT 
        g.game_no,
        g.game_title,
        g.game_platform,
        g.game_summary,
        img.image_url
    FROM games g
    LEFT JOIN game_images img
        ON g.game_no = img.game_no
       AND img.image_type = 'thumbnail'
    ORDER BY g.game_no DESC
";

$result = mysqli_query($conn, $sql);

$games = [];
while ($row = mysqli_fetch_assoc($result)) {
    $row['image_url'] = $row['image_url'] ?: "default.png"; // 썸네일 없을 때 대비
    $row['game_summary'] = $row['game_summary'] ?? "";      // NULL 방지
    $games[] = $row;
}
?>

<link rel="stylesheet" href="../css/game.css">

<main>
<div class="main-container">

    <!-- 🎞 슬라이드 배너 -->
    <div class="slider-container">
        <div class="slide-item active" style="background-image:url('../images/game/banner01.png')"></div>
        <div class="slide-item" style="background-image:url('../images/game/banner02.png')"></div>
        <div class="slide-item" style="background-image:url('../images/game/banner03.png')"></div>
        <div class="slide-item" style="background-image:url('../images/game/banner04.png')"></div>
    </div>

    <!-- 탭 + 검색 -->
    <div class="filter-section">
        <div class="tabs">
            <button class="tab-button active" data-platform="pc">PC게임</button>
            <button class="tab-button" data-platform="mobile">MOBILE게임</button>
        </div>

        <div class="search-box">
            <input type="search" id="searchInput" class="search-input" placeholder="검색어를 입력하세요">
            <svg class="search-icon" viewBox="0 0 24 24">
                <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 
                         16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 
                         5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 
                         4.99L20.49 19l-4.99-5z" />
            </svg>
        </div>
    </div>

    <!-- 게임 목록 -->
    <ul class="game-list" id="gameList"></ul>

</div>

<script>
// ---------------------------------------------------
// 📌 PHP → JS 데이터 변환
// ---------------------------------------------------
const allGames = <?= json_encode($games, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) ?>;

// HTML escape (XSS 예방)
const escapeHTML = (str) =>
    String(str)
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;");


// ---------------------------------------------------
// 📌 게임 렌더링 함수
// ---------------------------------------------------
function renderGameList(platform, keyword = "") {
    const list = document.querySelector("#gameList");
    list.innerHTML = "";

    keyword = keyword.toLowerCase();

    const filtered = allGames.filter(g => {
        const title = (g.game_title || "").toLowerCase();
        const summary = (g.game_summary || "").toLowerCase();
        return g.game_platform === platform && (title.includes(keyword) || summary.includes(keyword));
    });

    if (filtered.length === 0) {
        list.innerHTML = `<p class="no-data">검색된 게임이 없습니다.</p>`;
        return;
    }

    filtered.forEach(g => {
        const cardHTML = `
            <a class="game-card" href="game_view.php?no=${g.game_no}">
                <div class="card-image"
                     style="background-image:url('../uploads/games/${escapeHTML(g.image_url)}')">
                </div>
                <div class="card-content">
                    <div class="card-title">${escapeHTML(g.game_title)}</div>
                </div>
            </a>
        `;
        list.insertAdjacentHTML("beforeend", cardHTML);
    });
}


// ---------------------------------------------------
// 📌 탭 기능
// ---------------------------------------------------
let currentPlatform = "pc";
document.querySelectorAll(".tab-button").forEach(btn => {
    btn.addEventListener("click", () => {
        document.querySelectorAll(".tab-button").forEach(b => b.classList.remove("active"));
        btn.classList.add("active");

        currentPlatform = btn.dataset.platform;
        renderGameList(currentPlatform, document.querySelector("#searchInput").value);
    });
});


// ---------------------------------------------------
// 📌 검색 기능
// ---------------------------------------------------
document.querySelector("#searchInput").addEventListener("input", (e) => {
    renderGameList(currentPlatform, e.target.value);
});


// ---------------------------------------------------
// 📌 페이지 로드시 기본 PC 게임 출력
// ---------------------------------------------------
renderGameList("pc");
</script>

</main>

<?php include '../common/footer.php'; ?>
