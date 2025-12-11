<?php
session_start();
// 모든 세션값 안전한 방식으로 불러오기
$mb_id   = $_SESSION['mb_id'] ?? null;
$mb_name = $_SESSION['mb_name'] ?? null;
$mb_nick = $_SESSION['mb_nickname'] ?? null; // 테이블 기준
$mb_role = $_SESSION['mb_role'] ?? null;
$mb_no   = $_SESSION['mb_no'] ?? null;
$mb_img   = $_SESSION['mb_img'] ?? null;
$login_nick = $mb_nick ?: $mb_name; // 닉네임 없으면 이름 사용
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- reset.css -->
  <link href="../css/reset.css" rel="stylesheet" type="text/css">
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"/>
  <!-- swiper -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <!-- common css -->
  <link rel="stylesheet" href="../css/common.css" type="text/css">
  <!-- layout css -->
  <link rel="stylesheet" href="../css/layout.css" type="text/css">
  <!-- sub css -->
  <link rel="stylesheet" href="../css/sub.css" type="text/css">

  <link rel="icon" href="../images/favicon_logo.ico">
  <title>webzen</title>
</head>
<body>

<header>
  <!-- 모바일 네비게이션용 -->
  <div class="m_nav_btn">
    <!-- 버튼 -->
    <i class="fa-solid fa-bars" id="open_tab"></i>
    <i class="fa-solid fa-xmark" id="clo_tab"></i>
  </div>
  
  <div class="log_nav_wrap">
    <h1>
      <a href="../index.php" title="메인페이지 바로가기">
        <img src="../images/header_logo.png" alt="메인로고">
      </a>
    </h1>
    
    
    <!-- 상단 메뉴 -->
    <nav>
      <ul>
        <li><a href="../user/game.php" title="게임">GAME<span class="under_bar"></span></a></li>
        <li><a href="../user/notice.php" title="뉴스">NEWS<span class="under_bar"></span></a></li>
        <li><a href="../user/community.php" title="라운지">LOUNGE<span class="under_bar"></span></a></li>
        <li><a href="../user/faq.php" title="서포트">SUPPORT<span class="under_bar"></span></a></li>
      </ul>
    </nav>
  </div>

  <!-- 로그인/비로그인 표시 -->
  <div class="user_info">
    <ul>
      <?php if(isset($_SESSION['mb_id'])) { ?>

        <!-- 로그인 상태 -->
        <li><a href="../user/mypage.php" title="마이페이지"><?=$_SESSION['mb_nick']?></a></li>
        <li><a href="../php/logout.php" title="로그아웃">로그아웃</a></li>

        <?php if($_SESSION['mb_role'] == 'admin'){ ?>
          <li><a href="../admin/" title="관리자페이지">&#x007C; 관리자페이지</a></li>
        <?php } ?>

        <?php } else { ?>
          <!-- 비로그인 -->
          <li><a href="../php/login.php" title="로그인하기">로그인</a></li>
          <li><a href="../php/register.php" title="회원가입">회원가입</a></li>
        <?php } ?>
    </ul>
  </div>
  
<div class="m_user_info">
  <ul>
    <?php if(isset($_SESSION['mb_id'])) { ?>

      <!-- 로그인: 프로필 + 마이페이지 -->
      <li>
        <a href="../user/mypage.php" title="마이페이지">
          <img src="<?php 
            // 프로필 이미지가 있으면 출력
            echo $_SESSION['mb_img'] 
              ? '../uploads/profile/'.$_SESSION['mb_img'] 
              : '../images/user_admin/img_upload.png'; 
          ?>" alt="프로필이미지">
        </a>
      </li>



    <?php } else { ?>

      <!-- 비로그인 -->
      <li><a href="../php/login.php" title="로그인하기">로그인</a></li>

    <?php } ?>
  </ul>
</div>
  
  <!-- 모바일 버전 -->
 <div class="m_nav_panel">

  <!-- 환영 메시지 -->
  <div class="m_user_welcome">
    <?php if(isset($_SESSION['mb_id'])) { ?>
      <?= $login_nick ?> 님 반갑습니다!
    <?php } else { ?>
      방문자님 환영합니다!
    <?php } ?>
  </div>

  <nav class="m_nav_list">
    <ul>
      <li><a href="../user/game.php">GAME</a></li>
      <li><a href="../user/notice.php">NEWS</a></li>
      <li><a href="../user/community.php">LOUNGE</a></li>
      <li><a href="../user/faq.php">SUPPORT</a></li>
    </ul>
  </nav>

  <?php if(isset($_SESSION['mb_id'])) { ?>
    <!-- 로그인 상태 -->
    <div class="m_logout_btn_wrap">
      <a href="../php/logout.php" class="m_logout_btn">로그아웃</a>
    </div>

    <?php if($_SESSION['mb_role'] == 'admin'){ ?>
      <div class="m_logout_btn_wrap">
        <a href="../admin/" class="m_logout_btn">관리자 페이지</a>
      </div>
    <?php } ?>

  <?php } else { ?>
    <!-- 비로그인 상태 -->
    <div class="m_logout_btn_wrap">
      <a href="../php/login.php" class="m_logout_btn">로그인</a>
    </div>
  <?php } ?>

</div>
</header>