
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

  <title>webzen</title>
</head>
<body>

<header>
  <h1>
    <a href="../index.php" title="메인페이지 바로가기">
      <img src="../images/header_logo.png" alt="메인로고">
    </a>
  </h1>

  <!-- 상단 메뉴 -->
  <nav>
    <ul>
      <li><a href="" title="게임">GAME<span class="under_bar"></span></a></li>
      <li><a href="" title="뉴스">NEWS<span class="under_bar"></span></a></li>
      <li><a href="../user/community.php" title="라운지">LOUNGE<span class="under_bar"></span></a></li>
      <li><a href="" title="서포트">SUPPORT<span class="under_bar"></span></a></li>
    </ul>
  </nav>

  <!-- 로그인/비로그인 표시 -->
  <div class="user_info">
    <ul>
      <?php if(isset($_SESSION['mb_id'])) { ?>
      
        <!-- 로그인 상태 -->
        <li><a href="../user/user.php" title="마이페이지"><?=$_SESSION['mb_nick']?></a></li>
        <li><a href="../php/logout.php" title="로그아웃">로그아웃</a></li>

        <?php if($_SESSION['mb_role'] == 'admin'){ ?>
          <li><a href="../admin/" title="관리자페이지">관리자페이지</a></li>
        <?php } ?>

      <?php } else { ?>

        <!-- 비로그인 -->
        <li><a href="../php/login.php" title="로그인하기">로그인</a></li>
        <li><a href="../php/register.php" title="회원가입">회원가입</a></li>

      <?php } ?>
    </ul>
  </div>

</header>