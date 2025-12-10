<?
session_start();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- reset.css -->
  <link href="./css/reset.css" rel="stylesheet" type="text/css">

  <!-- 폰트어썸 cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />

  <!-- 애니메이션 -->
  <link rel="stylesheet" href="./css/animate.css">

  <!-- 섹션 6 스와이퍼 -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

  <!-- 스와이퍼 슬라이드  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <!-- 기본서식 -->
  <link rel="stylesheet" href="./css/common.css" type="text/css">
  <!-- 레이아웃 서식 (헤더,푸터)-->
  <link rel="stylesheet" href="./css/layout.css" type="text/css">
  <!-- 메인서식 -->
  <link rel="stylesheet" href="./css/main.css" type="text/css">

  <title>webzen</title>
</head>
<body>
  <!-- 헤더 영역 시작 -->
<header>
  <!-- 모바일 네비게이션용 -->
  <div class="m_nav_btn">
    <!-- 버튼 -->
    <i class="fa-solid fa-bars" id="open_tab"></i>
    <i class="fa-solid fa-xmark" id="clo_tab"></i>
  </div>
  
  <div class="log_nav_wrap">
    <h1>
      <a href="./index.php" title="메인페이지 바로가기">
        <img src="./images/header_logo.png" alt="메인로고">
      </a>
    </h1>
    
    
    <!-- 상단 메뉴 -->
    <nav>
      <ul>
        <li><a href="./user/game.php" title="게임">GAME<span class="under_bar"></span></a></li>
        <li><a href="./user/notice.php" title="뉴스">NEWS<span class="under_bar"></span></a></li>
        <li><a href="./user/community.php" title="라운지">LOUNGE<span class="under_bar"></span></a></li>
        <li><a href="" title="서포트">SUPPORT<span class="under_bar"></span></a></li>
      </ul>
    </nav>
  </div>

  <!-- 로그인/비로그인 표시 -->
  <div class="user_info">
    <ul>
      <?php if(isset($_SESSION['mb_id'])) { ?>

        <!-- 로그인 상태 -->
        <li><a href="./user/mypage.php" title="마이페이지"><?=$_SESSION['mb_nick']?></a></li>
        <li><a href="./php/logout.php" title="로그아웃">로그아웃</a></li>

        <?php if($_SESSION['mb_role'] == 'admin'){ ?>
          <li><a href="./admin/" title="관리자페이지">&#x007C; 관리자페이지</a></li>
        <?php } ?>

        <?php } else { ?>
          <!-- 비로그인 -->
          <li><a href="./php/login.php" title="로그인하기">로그인</a></li>
          <li><a href="./php/register.php" title="회원가입">회원가입</a></li>
        <?php } ?>
    </ul>
  </div>
  
<div class="m_user_info">
  <ul>
    <?php if(isset($_SESSION['mb_id'])) { ?>

      <!-- 로그인: 프로필 + 마이페이지 -->
      <li>
        <a href="./user/mypage.php" title="마이페이지">
          <img src="<?php 
            // 프로필 이미지가 있으면 출력
            echo $_SESSION['mb_img'] 
              ? './uploads/profile/'.$_SESSION['mb_img'] 
              : './images/user_admin/img_upload.png'; 
          ?>" alt="프로필이미지">
        </a>
      </li>



    <?php } else { ?>

      <!-- 비로그인 -->
      <li><a href="./php/login.php" title="로그인하기">로그인</a></li>

    <?php } ?>
  </ul>
</div>
  
  <!-- 모바일 버전 -->
 <div class="m_nav_panel">

  <!-- 환영 메시지 -->
  <div class="m_user_welcome">
    <?php if(isset($_SESSION['mb_id'])) { ?>
      <?= $_SESSION['mb_nick'] ?> 님 반갑습니다!
    <?php } else { ?>
      방문자님 환영합니다!
    <?php } ?>
  </div>

  <nav class="m_nav_list">
    <ul>
      <li><a href="./user/game.php">GAME</a></li>
      <li><a href="./user/notice.php">NEWS</a></li>
      <li><a href="./user/community.php">LOUNGE</a></li>
      <li><a href="./user/faq.php">SUPPORT</a></li>
    </ul>
  </nav>

  <?php if(isset($_SESSION['mb_id'])) { ?>
    <!-- 로그인 상태 -->
    <div class="m_logout_btn_wrap">
      <a href="./php/logout.php" class="m_logout_btn">로그아웃</a>
    </div>

    <?php if($_SESSION['mb_role'] == 'admin'){ ?>
      <div class="m_logout_btn_wrap">
        <a href="./admin/" class="m_logout_btn">관리자 페이지</a>
      </div>
    <?php } ?>

  <?php } else { ?>
    <!-- 비로그인 상태 -->
    <div class="m_logout_btn_wrap">
      <a href="./php/login.php" class="m_logout_btn">로그인</a>
    </div>
  <?php } ?>

</div>
</header>
  <!-- 메인 영역 시작 -->
  <main>
<!-- 1 메인 슬라이드 영역  -->
<section id="visual_area">
<!-- 메인비주얼  -->
  <div class="visual_main">
    <a id="main_link" href="#" target="_self">
      <img id="main_img" src="./images/index/1_game1.png" alt="메인 이미지">
      <div class="visual_text" id="main_text">
        <h2>게임 제목 또는 설명</h2>
        <p>이미지에 따라 바뀌는 상세 설명 텍스트</p>
      </div>
    </a>
  </div>

  <!-- 썸네일 영역 -->
  <div class="visual_thumbs">
    <ul>
      <li data-img="./images/index/1_game1.png" data-title="테르비스" data-desc="&#34꿈의 여정에서, 기적을 만드는 이야기&#34" data-link="해당 상세페이지 경로">
        <img src="./images/index/1_game1.png" alt="">
      </li>
      <li data-img="./images/index/1_game2.png" data-title="R2 오리진" data-desc="&#34혼돈의 대지에서 펼쳐지는 하드코어 전투&#34" data-link="해당 상세페이지 경로">
        <img src="./images/index/1_game2.png" alt="">
      </li>
      <li data-img="./images/index/1_game3.png" data-title="뮤 포켓 나이츠" data-desc="&#34손안에서 즐기는 뮤력뮤력 방치형 RPG&#34" data-link="해당 상세페이지 경로">
        <img src="./images/index/1_game3.png" alt="">
      </li>
      <li data-img="./images/index/1_game4.png" data-title="드래곤 소드" data-desc="&#34드래곤소드를 꿈꾸는 영웅들의 스토리&#34" data-link="해당 상세페이지 경로">
        <img src="./images/index/1_game4.png" alt="">
      </li>
      <li data-img="./images/index/1_game5.png" data-title="뮤 온라인" data-desc="&#34전설이 시작된 뮤 대륙의 본격 판타지 MMORPG&#34" data-link="gameview.html"> 
        <img src="./images/index/1_game5.png" alt="">
      </li>
    </ul>
  </div>
</section>

<section class="newgame">
  <h2>전체 게임 목록</h2>

  <div class="swiper newGameSwiper">
    <div class="swiper-wrapper">

      <?php
      include __DIR__ . '/db/db_conn.php';

      // 전체 게임 최신순 출력
      $sql = "
        SELECT 
          g.game_no,
          g.game_title,
          g.game_platform,
          g.game_summary,
          (
            SELECT image_url
            FROM game_images 
            WHERE game_no = g.game_no 
              AND image_type = 'thumbnail'
            ORDER BY image_no ASC
            LIMIT 1
          ) AS thumb
        FROM games g
        ORDER BY g.created_datetime DESC
      ";

      $result = mysqli_query($conn, $sql);

      while($row = mysqli_fetch_assoc($result)) {

          // 썸네일이 없으면 gallery 1개라도 가져오기
          if(!$row['thumb']){
            $backup_sql = "
              SELECT image_url 
              FROM game_images 
              WHERE game_no = {$row['game_no']}
              ORDER BY image_no ASC
              LIMIT 1
            ";
            $backup_result = mysqli_query($conn, $backup_sql);
            $backup = mysqli_fetch_assoc($backup_result);
            $row['thumb'] = $backup['image_url'];
          }
      ?>
      <div class="swiper-slide">
        <a href="./user/game_view.php?no=<?= $row['game_no'] ?>" class="game_card">

          <!-- 이미지 출력 -->
          <img src="./uploads/games/<?= $row['thumb'] ?>" 
          alt="<?= $row['game_title'] ?>">

          <h3><?= $row['game_title'] ?></h3>
          <p><?= mb_substr($row['game_summary'], 0, 10) ?>...</p>

          <div class="icons">
            <?php if($row['game_platform'] === 'mobile'){ ?>
              <img src="./images/index/android.png" alt="android">
              <img src="./images/index/ios.png" alt="ios">
            <?php } ?>

            <?php if($row['game_platform'] === 'pc'){ ?>
              <img src="./images/index/microsoft.png" alt="pc">
            <?php } ?>
          </div>
        </a>
      </div>
      <?php } ?>
    </div>
  </div>
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
</section>

    <section class="top3">
      <h2>모두가 선택한 웹젠의 하이라이트</h2>
      <p>웹젠을 대표하는 불멸의 top3</p>
        
      <!-- 3 top3 영역 -->
      <div class="top3_wrapper">
        <ul>
          <li><a href="해당 상세 페이지 주소 " title="뮤 온라인">
            <img src="./images/index/3_game1.png" alt="뮤 온라인" data-default="./images/index/3_game1.png" data-hover="./images/index/3_game1_hover.png" class="top3_img">
          </a></li>
          <li><a href="해당 상세 페이지 주소 " title="뮤 포켓 나이츠" >
            <img src="./images/index/3_game2.png" alt="뮤 포켓 나이츠" data-default="./images/index/3_game2.png" data-hover="./images/index/3_game2_hover.png" class="top3_img">
          </a></li>
          <li><a href="해당 상세 페이지 주소 " title="R2 ORIGIN" >
            <img src="./images/index/3_game3.png" alt="R2 ORIGIN" data-default="./images/index/3_game3.png" data-hover="./images/index/3_game3_hover.png" class="top3_img">
          </a></li>
        </ul>
      </div>
    </section>

<section class="gamelist">
<!-- 4. 전체게임 영역 -->
    <h2>webzen game collection</h2>
    <p>웹젠이 선보이는 모든 세계를 지금 경험해 보세요</p>
<!-- 첫번째 그리드 -->
    <div class="layer01">
      <img src="./images/index/4_bg_1.png" alt="이미지">
      <div class="grid01">
      <figure>
        <a href="./user/game.php" title="뮤 포켓나이츠 바로가기">
        <img src="./images/index/4_game1.png" alt="뮤 포켓 나이츠">
        <h3>뮤 : 포켓 나이츠</h3>
        <div class="icon_array">
          <figcaption>idle rpg</figcaption>
          <span>
            <img src="./images/index/ios.png" alt="구동체제 아이콘">&nbsp;
            <img src="./images/index/android.png" alt="구동체제 아이콘">
          </span>
        </div>
        </a>
      </figure>
      <figure>
        <a href="./user/game.php" title="테르비스 바로가기">
        <img src="./images/index/4_game2.png" alt="테르비스">
        <h3>테르비스</h3>
        <div class="icon_array">
          <figcaption>anime rpg</figcaption>
          <span>
            <img src="./images/index/ios.png" alt="구동체제 아이콘">&nbsp;
            <img src="./images/index/android.png" alt="구동체제 아이콘">
          </span>
        </div>
        </a>
      </figure>
      <figure>
        <a href="./user/game.php" title="뮤 모나크2 바로가기">
        <img src="./images/index/4_game3.png" alt="뮤 모나크2">
        <h3>뮤 모나크2</h3>
        <div class="icon_array">
          <figcaption>mmorpg</figcaption>
          <span>
            <img src="./images/index/ios.png" alt="구동체제 아이콘">&nbsp;
            <img src="./images/index/android.png" alt="구동체제 아이콘">
          </span>
        </div>
        </a>
      </figure>
      <figure>
        <a href="./user/game.php" title="뮤 오리진3 바로가기">
        <img src="./images/index/4_game4.png" alt="뮤 오리진3">
        <h3>뮤 오리진3</h3>
        <div class="icon_array">
          <figcaption>mmorpg</figcaption>
          <span>
            <img src="./images/index/ios.png" alt="구동체제 아이콘">&nbsp;
            <img src="./images/index/android.png" alt="구동체제 아이콘">
          </span>
        </div>
        </a>
      </figure>
      </div>
    </div>
<!-- 두번째 그리드 -->
    <div class="layer02">
      <div class="grid02">
      <figure>
        <a href="./user/game.php" title="썬 클래식 바로가기">
        <img src="./images/index/4_game5.png" alt="썬 클래식">
        <h3>썬 클래식</h3>
        <div class="icon_array">
          <figcaption>mmorpg</figcaption>
          <span>
            <img src="./images/index/microsoft.png" alt="구동체제 아이콘">
          </span>
        </div>
        </a>
      </figure>
      <figure>
        <a href="./user/game.php" title="r2 바로가기">
        <img src="./images/index/4_game6.jpg" alt="r2">
        <h3>R2</h3>
        <div class="icon_array">
          <figcaption>mmorpg</figcaption>
          <span>
            <img src="./images/index/microsoft.png" alt="구동체제 아이콘">
          </span>
        </div>
        </a>
      </figure>
      <figure>
        <a href="./user/game.php" title="뮤 블루 바로가기">
        <img src="./images/index/4_game7.jpg" alt="뮤 블루">
        <h3>뮤 블루</h3>
        <div class="icon_array">
          <figcaption>mmorpg</figcaption>
          <span>
            <img src="./images/index/microsoft.png" alt="구동체제 아이콘">
          </span>
        </div>
        </a>
      </figure>
      <figure>
        <a href="./user/game.php" title="썬 리미티드 에디션 바로가기">
        <img src="./images/index/4_game8.jpg" alt="썬 리미티드 에디션">
        <h3>썬:리미티드 에디션</h3>
        <div class="icon_array">
          <figcaption>mmorpg</figcaption>
          <span>
            <img src="./images/index/microsoft.png" alt="구동체제 아이콘">
          </span>
        </div>
        </a>
      </figure>
      </div>
      <img src="./images/index/4_bg_2.png" alt="이미지">
    </div>
<!-- 세번째 그리드 -->
    <div class="layer03">
      <img src="./images/index/4_bg_3.png" alt="이미지">
      <div class="grid03">
      <figure>
        <a href="./user/game.php" title="드래곤소드 바로가기">
        <img src="./images/index/4_game9.png" alt="드래곤소드">
        <h3>드래곤소드</h3>
        <div class="icon_array">
          <figcaption>action rpg</figcaption>
          <span>
            <img src="./images/index/ios.png" alt="구동체제 아이콘">&nbsp;
            <img src="./images/index/android.png" alt="구동체제 아이콘">
          </span>
        </div>
        </a>
      </figure>
      <figure>
        <a href="./user/game.php" title="r2 online 바로가기">
        <img src="./images/index/4_game10.png" alt="r2 online">
        <h3>R2</h3>
        <div class="icon_array">
          <figcaption>mmorpg</figcaption>
          <span>
            <img src="./images/index/ios.png" alt="구동체제 아이콘">&nbsp;
            <img src="./images/index/android.png" alt="구동체제 아이콘">
          </span>
        </div>
        </a>
      </figure>
      <figure>
        <a href="./user/game.php" title="r2m 바로가기">
        <img src="./images/index/4_game11.jpg" alt="r2m">
        <h3>R2M</h3>
        <div class="icon_array">
          <figcaption>mmorpg</figcaption>
          <span>
            <img src="./images/index/ios.png" alt="구동체제 아이콘">&nbsp;
            <img src="./images/index/android.png" alt="구동체제 아이콘">
          </span>
        </div>
        </a>
      </figure>
      <figure>
        <a href="./user/game.php" title="뮤 모나크 바로가기">
        <img src="./images/index/4_game12.png" alt="뮤 모나크">
        <h3>뮤 모나크</h3>
        <div class="icon_array">
          <figcaption>mmorpg</figcaption>
          <span>
            <img src="./images/index/ios.png" alt="구동체제 아이콘">&nbsp;
            <img src="./images/index/android.png" alt="구동체제 아이콘">
          </span>
        </div>
        </a>
      </figure>
      </div>
    </div>
<!-- 네번째 그리드 -->
    <div class="layer04">
      <div class="grid04">
      <figure>
        <a href="./user/game.php" title="뮤 아크엔젤 바로가기">
        <img src="./images/index/4_game13.jpg" alt="뮤 아크엔젤">
        <h3>뮤 아크엔젤</h3>
        <div class="icon_array">
          <figcaption>mmorpg</figcaption>
          <span>
            <img src="./images/index/ios.png" alt="구동체제 아이콘">&nbsp;
            <img src="./images/index/android.png" alt="구동체제 아이콘">
          </span>
        </div>
        </a>
      </figure>
      <figure>
        <a href="./user/game.php" title="뮤 온라인 바로가기">
        <img src="./images/index/4_game14.jpg" alt="뮤 온라인">
        <h3>뮤 온라인</h3>
        <div class="icon_array">
          <figcaption>mmorpg</figcaption>
          <span>
            <img src="./images/index/microsoft.png" alt="구동체제 아이콘">
          </span>
        </div>
        </a>
      </figure>
      <figure>
        <a href="./user/game.php" title="메틴 바로가기">
        <img src="./images/index/4_game15.jpg" alt="메틴">
        <h3>메틴</h3>
        <div class="icon_array">
          <figcaption>mmorpg</figcaption>
          <span>
            <img src="./images/index/microsoft.png" alt="구동체제 아이콘">
          </span>
        </div>
        </a>
      </figure>
      <figure>
        <a href="./user/game.php" title="샷온라인 바로가기">
        <img src="./images/index/4_game16.jpg" alt="샷온라인">
        <h3>샷온라인</h3>
        <div class="icon_array">
          <figcaption>sports</figcaption>
          <span>
            <img src="./images/index/microsoft.png" alt="구동체제 아이콘">
          </span>
        </div>
        </a>
      </figure>
      </div>
      <img src="./images/index/4_bg_4.png" alt="이미지">
    </div>
  </section>

<section class="promotion">
<!-- 5 신규또는 월간 프로모션 영상 영역  -->
  <img src="./images/index/5_promotion_bg.png" alt="" style="width: 100%;">
  <video src="./images/index/5_video.mp4" controls poster="./images/index/5_thumbnail.jpg">

  </video>
</section>

<section class="community">
<!-- 6 최신 커뮤니티 슬라이드  -->
    <h2>최신 커뮤니티 글</h2>
    <div class="commu_container">
    <div class="commu_box">
      <div class="commu_title">
        <h3>신규 서버 점핑 이벤트 후기 공유!</h3>
        <p>자유 게시판</p>
      </div>
      <div class="commu_name">
<!-- 유저 프로필 임시삽입 -->
        <img src="./images/index/4_game1.png" alt="유저 프로필"><p>뮤전드&nbsp;&nbsp;</p><p>&nbsp;&nbsp;2025.11.23</p>
      </div>
      <pre>이벤트 보상으로 받은 장비 덕분에 200레벨까지 순식간에 달성했어요!</pre>
      <span><i class="fa-regular fa-heart"></i>12</span>
      <span><i class="fa-regular fa-message"></i>3</span>
    </div>
    <div class="commu_box">
      <div class="commu_title">
        <h3>법사 룬세팅+스킬 부탁드립니다.</h3>
        <p>공략게시판</p>
      </div>
      <div class="commu_name">
        <img src="./images/index/4_game7.jpg" alt="유저 프로필"><p>아낙수나문&nbsp;&nbsp;</p><p>&nbsp;&nbsp;2025.11.18</p>
      </div>
      <pre>보스 , 히든 (블캐) , PK 시 어찌 세팅해야 할까요? 부탁드립니다. 날이 많이 추우니 감기 조심하세요.</pre>
      <span><i class="fa-regular fa-heart"></i>12</span>
      <span><i class="fa-regular fa-message"></i>3</span>
    </div>
    <div class="commu_box">
      <div class="commu_title">
        <h3>신규 서버 점핑 이벤트 후기 공유!</h3>
        <p>자유 게시판</p>
      </div>
      <div class="commu_name">
        <img src="./images/index/4_game8.jpg" alt="유저 프로필"><p>뮤전드&nbsp;&nbsp;</p><p>&nbsp;&nbsp;2025.11.23</p>
      </div>
      <pre>이벤트 보상으로 받은 장비 덕분에 200레벨까지 순식간에 달성했어요!</pre>
      <span><i class="fa-regular fa-heart"></i>12</span>
      <span><i class="fa-regular fa-message"></i>3</span>
    </div>
    </div>
  </section>
  </main>
  <!-- 푸터 영역 시작 -->
<footer>
    <div class="fd_wrap">
      <ul>
        <li><a href="" title="about">about</a></li>
        <li><a href="" title="copyright">copyright</a></li>
        <li><a href="" title="privacy policy">privacy policy</a></li>
        <li><a href="" title="terms">terms</a></li>
      </ul>
      
      <div class="f_logo">
        <a href="" title="페이지 상단 바로가기">
          <img src="./images/footer_logo.png" alt="푸터 로고">
        </a>
        <span class="location">
          <a href="https://maps.app.goo.gl/zyh4ZD2e4ZCoW8gd8" title="위치 알아보기" target="_blank">
            KOREA&nbsp;37.402652, 127.101576
          </a>
        </span>
      </div>
    </div>

    <div class="fm_wrap">
      <div class="fm_logo">
        <a href="" title="메인페이지 바로가기">
          <img src="./images/header_logo.png" alt="푸터 로고">
        </a>
      </div>

      <div class="info_wrap">
        <ul class="link_group_wrapper">
          <li>
            <ul class="link_group">
              <li><a href="" title="이용약관">이용약관</a></li>
              <li><a href="" title="개인정보처리방침">개인정보처리방침</a></li>
              <li><a href="" title="청소년보호정책">청소년보호정책</a></li>
            </ul>
          </li>
          <li>
            <ul class="link_group">
              <li><a href="" title="회사소개">회사소개</a></li>
              <li><a href="" title="웹젠PC방">웹젠PC방</a></li>
            </ul>
          </li>
        </ul>
        
        <div class="company_info">
          <p>상호명 : (주)웹젠&nbsp;대표이사 : 김태영&nbsp;사업자등록 : 214-86-57130</p>
          <p>통신판매업 신고번호 : 제2012-경기성남-0753호</p>
          <p>주소 : 경기도 성남시 분당구 판교로 242 (주)웹젠</p>
          <p>웹마스터메일 : <a href="mailto:webzen-help@webzen.co.kr">webzen-help@webzen.co.kr</a></p>
          <p>고객지원센터 : 1566-3003 <a href="https://www.ftc.go.kr/bizCommPop.do?wrkr_no=2148657130">사업자정보확인</a></p>
        </div>

      </div>
      
      <div class="top_btn">
        <i class="fa-solid fa-angle-up"></i>
      </div>
      
      <div class="copyright">
        Webzen Inc. Global Digital Entertainment Leader<br>
        COPYRIGHT&copy; Webzen Inc. ALL RIGHTS RESERVED.
      </div>
    </div>
  </footer>
  <!-- 스크립트 관련  -->
  <!-- jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
  <!-- 쿠키생성 js -->
  <script src="./script/jquery.cookie.js"></script>
  <!-- 화면 스크롤시 동작하는 애니메이션 플러그인 -->
  <script src="./script/jquery.scrollUp.min.js"></script>

  <!-- swiper.js  -->

  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>


  <!-- SECTION 1 스크립트 -->
  <script>
  const mainImg = document.getElementById('main_img');
  const mainText = document.getElementById('main_text');
  const thumbs = document.querySelectorAll('.visual_thumbs li');
  const mainLink = document.getElementById('main_link');

  let currentIndex = 0;
  let autoSlide;

  // 슬라이드 변경 함수
  function changeSlide(index) {
    thumbs.forEach(t => t.classList.remove('active')); //thums안에 들어간 li개수 값 만큼 active라는 서식을 반복 제거 함
    thumbs[index].classList.add('active'); //선택 또는 활성화할에 active 클래스 부여 

    // li에 작성한 변경할 텍스트 +이미지 + 이동 경로 가져와서 변수 처리 해준닷
    const img = thumbs[index].dataset.img;
    const title = thumbs[index].dataset.title;
    const desc = thumbs[index].dataset.desc;

    //메인에서 가져온 빈 변수를 썸네일에서 가져와 활성화된 값을 넣어준다 
    mainLink.href = thumbs[index].dataset.link;
    mainImg.src = img;
    mainText.innerHTML = `
      <h2>${title}</h2>
      <p>${desc}</p>
    `;
    currentIndex = index;
  }

  // 자동 슬라이드 시작
  function startAutoSlide(){
    autoSlide = setInterval(() => {
      let nextIndex = (currentIndex + 1) % thumbs.length;
      changeSlide(nextIndex);
    }, 3000);
  }

  // 자동 슬라이드 정지
  function stopAutoSlide(){
    clearInterval(autoSlide);
  }

  // 클릭 이벤트
  thumbs.forEach((thumb, index) => {
    thumb.addEventListener('click', () => {
      stopAutoSlide();
      changeSlide(index);
      startAutoSlide();
    });
  });

  changeSlide(0);
  startAutoSlide();
  </script>

  <!-- 섹션2 스크립트 -->
  <script>
    const newGameSwiper = new Swiper(".newGameSwiper", {
  slidesPerView: 4,
  spaceBetween: 20,
  loop: false,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  }
});
  </script>
  <!-- 섹션 3 스크립트 -->
  <script>
    $(document).ready(function(){
      $('.top3_img').hover( //tpo3 이미지 오버시 
        function(){
          $(this).attr('src', $(this).data('hover')); //이미지 주소값 변경
          $(this).css('transform', 'scale(1.1)'); //css 이미지 스케일 업 
          $(this).addClass('hover-effect');
        },
        function(){
          //마우스 아웃시 원본 이미지로 돌아가기
          $(this).attr('src', $(this).data('default'));
          $(this).css('transform','scale(1)');
          $(this).removeClass('hover-effect');
        }
      );
    });
  </script>
<!-- 섹션 4 스크립트 -->
  <script>
    $(document).ready(function(){
  // 게임목록 윈도우이벤트
  $(window).on('scroll',function(){
    $grid01 = $('.grid01')
    $grid02 = $('.grid02')
    $grid03 = $('.grid03')
    $grid04 = $('.grid04')
    $b_img01 = $('.layer01 > img')
    $b_img02 = $('.layer02 > img')
    $b_img03 = $('.layer03 > img')
    $b_img04 = $('.layer04 > img')

    let y = $(this).scrollTop();
    console.log(y);

    if(y>=1200){
      $grid01.css('left','0px');
    }
    if(y>=1200){
      $b_img01.css('top','0px');
    }
    if(y>=1700){
      $grid02.css('right','0px');
    }
    if(y>=1700){
      $b_img02.css('top','0px');
    }
    if(y>=2100){
      $grid03.css('left','0px');
    }
    if(y>=2100){
      $b_img03.css('top','0px');
    }
    if(y>=2600){
      $grid04.css('right','0px');
    }
    if(y>=2600){
      $b_img04.css('top','0px');
    }
  });
});

    // 모바일 메뉴 탭
    document.addEventListener("DOMContentLoaded", () => {
      const openBtn = document.getElementById("open_tab");
      const closeBtn = document.getElementById("clo_tab");
      const mPanel = document.querySelector(".m_nav_panel");

      openBtn.addEventListener("click", () => {
        mPanel.style.display = "block";
        openBtn.style.display = "none";
        closeBtn.style.display = "block";
      });

      closeBtn.addEventListener("click", () => {
        mPanel.style.display = "none";
        closeBtn.style.display = "none";
        openBtn.style.display = "block";
      });
    });
  </script>
</body>
</html>