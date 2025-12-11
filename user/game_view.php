<?php
include '../common/header.php';
include '../db/db_conn.php';

/* ===================================
   🔍 1. game_no 기본 검사
=================================== */
$game_no = isset($_GET['no']) ? intval($_GET['no']) : 0;

if ($game_no <= 0) {
    echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
    exit;
}

/* ===================================
   🎮 2. 기본 게임 정보 가져오기
=================================== */
$sql_game = "SELECT * FROM games WHERE game_no = {$game_no} LIMIT 1";
$result_game = mysqli_query($conn, $sql_game);

if (!$result_game || mysqli_num_rows($result_game) === 0) {
    echo "<script>alert('해당 게임 정보를 찾을 수 없습니다.'); history.back();</script>";
    exit;
}

$game = mysqli_fetch_assoc($result_game);

/* ===================================
   🖼 3. 이미지 불러오기
=================================== */
$sql_img = "
    SELECT image_url 
    FROM game_images 
    WHERE game_no = {$game_no}
    ORDER BY image_no ASC
";
$result_img = mysqli_query($conn, $sql_img);

$images = [];
while ($row = mysqli_fetch_assoc($result_img)) {
    if (!empty($row['image_url'])) {
        $images[] = $row['image_url'];
    }
}

// 안전한 slice 처리
$thumbs    = array_slice($images, 0, 4);   // 상단 썸네일 0~3
$info_imgs = array_slice($images, 4);      // 나머지 상세 이미지
?>

<!-- Swiper -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css">
<script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>

<link rel="stylesheet" href="../css/game_view.css">

<main>
<section class="details">

    <!-- ========= 🔶 게임 제목 ======== -->
    <h2><?= htmlspecialchars($game['game_title']) ?></h2>

    <div class="top_info">

        <!-- ========= 🎬 좌측 대표 이미지 + 썸네일 ========= -->
        <div class="trailer">

            <!-- 대표 이미지 -->
            <div id="top_view" class="top_view">
                <?php if (!empty($thumbs)): ?>
                    <img src="../uploads/games/<?= htmlspecialchars($thumbs[0]) ?>" alt="대표 이미지">
                <?php endif; ?>
            </div>

            <!-- 썸네일 목록 -->
            <div class="thumb_list">
                <?php foreach ($thumbs as $t): ?>
                    <div class="thumb" data-src="../uploads/games/<?= htmlspecialchars($t) ?>">
                        <img src="../uploads/games/<?= htmlspecialchars($t) ?>" alt="썸네일">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- ========= 📝 우측 게임 정보 ========= -->
        <div class="right_info">

            <a href="<?= htmlspecialchars($game['game_url']) ?>" 
               target="_blank" 
               title="플레이 하러가기">
               플레이 하러가기
            </a>

            <div class="game_info">
                <ul>
                    <li>이용등급 : 12세 이용가</li>
                    <li>서비스 상태 : <?= htmlspecialchars($game['game_status']) ?></li>
                    <li>플랫폼 : <?= $game['game_platform'] === 'pc' ? 'PC' : 'Mobile' ?></li>
                </ul>
            </div>
        </div>

    </div>

    <!-- ========= 📄 상세 설명 영역 ========= -->
    <div class="infomation">

        <p><?= nl2br(htmlspecialchars($game['game_summary'])) ?></p>

        <?php foreach ($info_imgs as $index => $img): ?>
            <?php if ($index === 1): ?>
                <p><?= nl2br(htmlspecialchars($game['game_detail'])) ?></p>
            <?php endif; ?>
            <img src="../uploads/games/<?= htmlspecialchars($img) ?>" alt="상세 이미지<?= $index + 1 ?>">
        <?php endforeach; ?>

    </div>

    <!-- ========= ⭐ 추천 슬라이드 ======== -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php 
            $slides = [
                "slide01.png","slide02.jpg","slide03.png","slide04.jpg",
                "slide05.jpg","slide06.jpg","slide07.png","slide08.png",
                "slide09.png","slide10.jpg","slide11.jpg","slide12.png",
                "slide13.jpg","slide14.jpg","slide15.png","slide16.png",
            ];
            foreach ($slides as $img): ?>
                <div class="swiper-slide">
                    <img src="../images/game/<?= $img ?>" alt="추천게임">
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</section>
</main>

<script src="../script/game_view.js"></script>

<?php include '../common/footer.php'; ?>
