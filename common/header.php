<?php session_start();?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- reset.css -->
  <link href="../css/reset.css" rel="stylesheet" type="text/css">
  <!-- 부트스트랩 서식  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- 폰트어썸 서식 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"/>
  <!-- 기본서식 -->
  <link rel="stylesheet" href="../css/common.css" type="text/css">
    <!-- 레이아웃 서식 (헤더,푸터)-->
    <link rel="stylesheet" href="../css/layout.css" type="text/css">
    <!-- 서브서식 -->
  <link rel="stylesheet" href="../css/sub.css" type="text/css">

  <title>webzen</title>
</head>
<body>
  <header>
    <h1>
      <a href="../index.html" title="메인페이지 바로가기">
        <img src="../images/header_logo.png" alt="메인로고">
      </a>
    </h1>
<!-- 상단메뉴 -->
    <nav>
      <ul>
        <li>
          <a href="" title="게임">
            GAME<span class="under_bar"></span>
          </a>
        </li>
        <li>
          <a href="" title="뉴스">
            NEWS<span class="under_bar"></span>
          </a>
        </li>
        <li>
          <a href="../user/community.php" title="라운지">
            LOUNGE<span class="under_bar"></span>
          </a>
        </li>
        <li>
          <a href="" title="서포트">
            SUPPORT<span class="under_bar"></span>
          </a>
        </li>
      </ul>
    </nav>
    <!-- 헤더 우측 로그인/비로그인 -->
    <div class="user_info">
  <?php if(isset($_SESSION['user_id'])){?>
<!-- 로그인 상태-->
      <ul>
        <li><a href="" title="마이페이지 바로가기">프로필닉네임</a></li>
        <li><a href="" title="마이페이지 바로가기">로그아웃</a></li>
      </ul>
      <?php }else{?>
<!-- 비로그인 상태 -->
      <ul>
        <li><a href="" title="로그인하기">로그인</a></li>
        <li><a href="" title="회원가입">회원가입</a></li>
      <?php }?>
      </div>
      </ul>
  </header>