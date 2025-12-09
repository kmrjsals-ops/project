<?php
include '../common/header.php';
include '../db/db_conn.php';

$game_no = intval($_GET['no']);

// 기본 게임 정보 불러오기
$sql_game = "SELECT * FROM games WHERE game_no = $game_no";
$result_game = mysqli_query($conn, $sql_game);
$game = mysqli_fetch_assoc($result_game);

// 이미지 불러오기 (썸네일 + 갤러리 순서대로)
$sql_img = "SELECT image_url FROM game_images WHERE game_no = $game_no ORDER BY image_no ASC";
$result_img = mysqli_query($conn, $sql_img);

$images = [];
while ($row = mysqli_fetch_assoc($result_img)) {
    $images[] = $row['image_url'];
}

// 부족할 경우 대비
$thumbs = array_slice($images, 0, 4);   // 0~3까지 – 상단 썸네일
$info_imgs = array_slice($images, 4, 3); // 4~6까지 – 상세 설명 이미지
?>

<script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css"/>
<link rel="stylesheet" href="../css/game_view.css" type="text/css">

<main>
<section class="details">

    <!-- 게임 제목 -->
    <h2><?= $game['game_title'] ?></h2>

    <div class="top_info">

        <!-- 상단 좌측(대표 이미지 + 썸네일) -->
        <div class="trailer">
            <div id="top_view" class="top_view">
                <!-- 첫 번째 썸네일을 기본 표시 -->
                <?php if (!empty($thumbs)) { ?>
                    <img src="../uploads/games/<?= $thumbs[0] ?>" alt="">
                <?php } ?>
            </div>

            <div class="thumb_list">
                <?php foreach ($thumbs as $t) { ?>
                <div class="thumb" data-type="image" data-src="../uploads/games/<?= $t ?>">
                    <img src="../uploads/games/<?= $t ?>" alt="">
                </div>
                <?php } ?>
            </div>
        </div>

        <!-- 상단 우측 -->
        <div class="right_info">
            <a href="<?= $game['game_url'] ?>" target="_blank" title="플레이 하러가기">플레이 하러가기</a>

            <div class="game_info">
                <ul>
                    <li>이용등급 : 12세 이용가</li>
                    <li>서비스 상태 : <?= $game['game_status'] ?></li>
                    <li>플랫폼 : <?= $game['game_platform']=='pc'?'PC':'Mobile' ?></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- 상세 설명 영역 -->
    <div class="infomation">
        <p><?= nl2br($game['game_summary']) ?></p>

        <?php if(isset($info_imgs[0])) { ?>
            <img src="../uploads/games/<?= $info_imgs[0] ?>" alt="">
        <?php } ?>

        <?php if(isset($info_imgs[1])) { ?>
            <p><?= nl2br($game['game_detail']) ?></p>
            <img src="../uploads/games/<?= $info_imgs[1] ?>" alt="">
        <?php } ?>

        <?php if(isset($info_imgs[2])) { ?>
            <img src="../uploads/games/<?= $info_imgs[2] ?>" alt="">
        <?php } ?>
    </div>

    <!-- 추천 슬라이드(원본 유지) -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="../images/game/slide01.png"></div>
            <div class="swiper-slide"><img src="../images/game/slide02.jpg"></div>
            <div class="swiper-slide"><img src="../images/game/slide03.png"></div>
            <div class="swiper-slide"><img src="../images/game/slide04.jpg"></div>
            <div class="swiper-slide"><img src="../images/game/slide05.jpg"></div>
            <div class="swiper-slide"><img src="../images/game/slide06.jpg"></div>
            <div class="swiper-slide"><img src="../images/game/slide07.png"></div>
            <div class="swiper-slide"><img src="../images/game/slide08.png"></div>
            <div class="swiper-slide"><img src="../images/game/slide09.png"></div>
            <div class="swiper-slide"><img src="../images/game/slide10.jpg"></div>
            <div class="swiper-slide"><img src="../images/game/slide11.jpg"></div>
            <div class="swiper-slide"><img src="../images/game/slide12.png"></div>
            <div class="swiper-slide"><img src="../images/game/slide13.jpg"></div>
            <div class="swiper-slide"><img src="../images/game/slide14.jpg"></div>
            <div class="swiper-slide"><img src="../images/game/slide15.png"></div>
            <div class="swiper-slide"><img src="../images/game/slide16.png"></div>
        </div>
    </div>

</section>
</main>

<script src="../script/game_view.js"></script>

<?php include '../common/footer.php'; ?>
