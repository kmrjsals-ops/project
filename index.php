<?php
session_start();
include __DIR__ . '/db/db_conn.php';

// 세션 편의 변수
$isLogin   = isset($_SESSION['mb_id']);
$isAdmin   = $isLogin && ($_SESSION['mb_role'] === 'admin');
$nick      = $isLogin ? $_SESSION['mb_nick'] : null;
$profileImg = ($isLogin && !empty($_SESSION['mb_img']))
  ? './uploads/profile/' . $_SESSION['mb_img']
  : './images/user_admin/img_upload.png';
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

  <!-- 스와이퍼 슬라이드 (1개만 사용) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

  <!-- 기본서식 -->
  <link rel="stylesheet" href="./css/common.css" type="text/css">
  <!-- 레이아웃 서식 (헤더,푸터) -->
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
          <li><a href="./user/faq.php" title="서포트">SUPPORT<span class="under_bar"></span></a></li>
        </ul>
      </nav>
    </div>

    <!-- 로그인/비로그인 표시 -->
    <div class="user_info">
      <ul>
        <?php if ($isLogin): ?>
          <!-- 로그인 상태 -->
          <li><a href="./user/mypage.php" title="마이페이지"><?= htmlspecialchars($nick) ?></a></li>
          <li><a href="./php/logout.php" title="로그아웃">로그아웃</a></li>

          <?php if ($isAdmin): ?>
            <li><a href="./admin/" title="관리자페이지">&#x007C; 관리자페이지</a></li>
          <?php endif; ?>

        <?php else: ?>
          <!-- 비로그인 -->
          <li><a href="./php/login.php" title="로그인하기">로그인</a></li>
          <li><a href="./php/register.php" title="회원가입">회원가입</a></li>
        <?php endif; ?>
      </ul>
    </div>
    
    <div class="m_user_info">
      <ul>
        <?php if ($isLogin): ?>
          <!-- 로그인: 프로필 + 마이페이지 -->
          <li>
            <a href="./user/mypage.php" title="마이페이지">
              <img src="<?= $profileImg ?>" alt="프로필이미지">
            </a>
          </li>
        <?php else: ?>
          <!-- 비로그인 -->
          <li><a href="./php/login.php" title="로그인하기">로그인</a></li>
        <?php endif; ?>
      </ul>
    </div>
    
    <!-- 모바일 버전 -->
    <div class="m_nav_panel">
      <!-- 환영 메시지 -->
      <div class="m_user_welcome">
        <?php if ($isLogin): ?>
          <?= htmlspecialchars($nick) ?> 님 반갑습니다!
        <?php else: ?>
          방문자님 환영합니다!
        <?php endif; ?>
      </div>

      <nav class="m_nav_list">
        <ul>
          <li><a href="./user/game.php">GAME</a></li>
          <li><a href="./user/notice.php">NEWS</a></li>
          <li><a href="./user/community.php">LOUNGE</a></li>
          <li><a href="./user/faq.php">SUPPORT</a></li>
        </ul>
      </nav>

      <?php if ($isLogin): ?>
        <!-- 로그인 상태 -->
        <div class="m_logout_btn_wrap">
          <a href="./php/logout.php" class="m_logout_btn">로그아웃</a>
        </div>

        <?php if ($isAdmin): ?>
          <div class="m_logout_btn_wrap">
            <a href="./admin/" class="m_logout_btn">관리자 페이지</a>
          </div>
        <?php endif; ?>

      <?php else: ?>
        <!-- 비로그인 상태 -->
        <div class="m_logout_btn_wrap">
          <a href="./php/login.php" class="m_logout_btn">로그인</a>
        </div>
      <?php endif; ?>
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
          <li data-img="./images/index/1_game1.png" data-title="테르비스" data-desc="&#34;꿈의 여정에서, 기적을 만드는 이야기&#34;" data-link="해당 상세페이지 경로">
            <img src="./images/index/1_game1.png" alt="">
          </li>
          <li data-img="./images/index/1_game2.png" data-title="R2 오리진" data-desc="&#34;혼돈의 대지에서 펼쳐지는 하드코어 전투&#34;" data-link="해당 상세페이지 경로">
            <img src="./images/index/1_game2.png" alt="">
          </li>
          <li data-img="./images/index/1_game3.png" data-title="뮤 포켓 나이츠" data-desc="&#34;손안에서 즐기는 뮤력뮤력 방치형 RPG&#34;" data-link="해당 상세페이지 경로">
            <img src="./images/index/1_game3.png" alt="">
          </li>
          <li data-img="./images/index/1_game4.png" data-title="드래곤 소드" data-desc="&#34;드래곤소드를 꿈꾸는 영웅들의 스토리&#34;" data-link="해당 상세페이지 경로">
            <img src="./images/index/1_game4.png" alt="">
          </li>
          <li data-img="./images/index/1_game5.png" data-title="뮤 온라인" data-desc="&#34;전설이 시작된 뮤 대륙의 본격 판타지 MMORPG&#34;" data-link="gameview.html"> 
            <img src="./images/index/1_game5.png" alt="">
          </li>
        </ul>
      </div>
    </section>

    <section class="newgame">
      <h2>새롭게 찾아온 모험들</h2>

      <div class="swiper newGameSwiper">
        <div class="swiper-wrapper">
          <?php
          // 전체 게임 최신순 출력
          $sql = "
            SELECT 
              g.game_no,
              g.game_title,
              g.game_platform,
              g.game_summary,
              (
                SELECT gi.image_url
                FROM game_images AS gi
                WHERE gi.game_no = g.game_no 
                  AND gi.image_type = 'thumbnail'
                ORDER BY gi.image_no ASC
                LIMIT 1
              ) AS thumb
            FROM games AS g
            ORDER BY g.created_datetime DESC
          ";
          $result = mysqli_query($conn, $sql);

          while ($row = mysqli_fetch_assoc($result)):
            // 썸네일이 없으면 gallery 1개라도 가져오기
            if (empty($row['thumb'])) {
              $backup_sql = "
                SELECT image_url 
                FROM game_images 
                WHERE game_no = {$row['game_no']}
                ORDER BY image_no ASC
                LIMIT 1
              ";
              $backup_result = mysqli_query($conn, $backup_sql);
              $backup = mysqli_fetch_assoc($backup_result);
              $row['thumb'] = $backup['image_url'] ?? '';
            }

            if (empty($row['thumb'])) {
              // 이미지가 아예 없으면 출력 스킵 (레이아웃 깨지는 것 방지)
              continue;
            }
          ?>
          <div class="swiper-slide">
            <a href="./user/game_view.php?no=<?= (int)$row['game_no'] ?>" class="game_card">
              <!-- 이미지 출력 -->
              <img src="./uploads/games/<?= htmlspecialchars($row['thumb']) ?>" 
                   alt="<?= htmlspecialchars($row['game_title']) ?>">

              <h3><?= htmlspecialchars($row['game_title']) ?></h3>
              <p><?= mb_substr($row['game_summary'], 0, 10) ?>...</p>

              <div class="icons">
                <?php if ($row['game_platform'] === 'mobile'): ?>
                  <img src="./images/index/android.png" alt="android">
                  <img src="./images/index/ios.png" alt="ios">
                <?php elseif ($row['game_platform'] === 'pc'): ?>
                  <img src="./images/index/microsoft.png" alt="pc">
                <?php endif; ?>
              </div>
            </a>
          </div>
          <?php endwhile; ?>
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
          <li>
            <a href="#" title="뮤 온라인">
              <img src="./images/index/3_game1.png" alt="뮤 온라인"
                   data-default="./images/index/3_game1.png"
                   data-hover="./images/index/3_game1_hover.png"
                   class="top3_img">
            </a>
          </li>
          <li>
            <a href="#" title="뮤 포켓 나이츠">
              <img src="./images/index/3_game2.png" alt="뮤 포켓 나이츠"
                   data-default="./images/index/3_game2.png"
                   data-hover="./images/index/3_game2_hover.png"
                   class="top3_img">
            </a>
          </li>
          <li>
            <a href="#" title="R2 ORIGIN">
              <img src="./images/index/3_game3.png" alt="R2 ORIGIN"
                   data-default="./images/index/3_game3.png"
                   data-hover="./images/index/3_game3_hover.png"
                   class="top3_img">
            </a>
          </li>
        </ul>
      </div>
    </section>

<section class="gamelist">
  <h2>webzen game collection</h2>
  <p>웹젠이 선보이는 모든 세계를 지금 경험해 보세요</p>

  <!-- 첫번째 그리드 -->
  <div class="layer01">
    <img src="./images/index/4_bg_1.png" alt="배경 이미지">
    <div class="grid01">

      <figure>
        <a href="./user/game.php" title="뮤 포켓나이츠 바로가기">
          <img src="./images/index/4_game1.png" alt="뮤 포켓 나이츠">
          <h3>뮤 : 포켓나이츠</h3>
          <div class="icon_array">
            <span>
              <img src="./images/index/ios.png" alt="IOS 아이콘">
              <img src="./images/index/android.png" alt="안드로이드 아이콘">
            </span>
          </div>
        </a>
        <figcaption>idle rpg</figcaption>
      </figure>

      <figure>
        <a href="./user/game.php" title="테르비스 바로가기">
          <img src="./images/index/4_game2.png" alt="테르비스">
          <h3>테르비스</h3>
          <div class="icon_array">
            <span>
              <img src="./images/index/ios.png" alt="IOS 아이콘">
              <img src="./images/index/android.png" alt="안드로이드 아이콘">
            </span>
          </div>
        </a>
        <figcaption>anime rpg</figcaption>
      </figure>

      <figure>
        <a href="./user/game.php" title="뮤 모나크2 바로가기">
          <img src="./images/index/4_game3.png" alt="뮤 모나크2">
          <h3>뮤 모나크2</h3>
          <div class="icon_array">
            <span>
              <img src="./images/index/ios.png" alt="IOS 아이콘">
              <img src="./images/index/android.png" alt="안드로이드 아이콘">
            </span>
          </div>
        </a>
        <figcaption>mmorpg</figcaption>
      </figure>

      <figure>
        <a href="./user/game.php" title="뮤 오리진3 바로가기">
          <img src="./images/index/4_game4.png" alt="뮤 오리진3">
          <h3>뮤 오리진3</h3>
          <div class="icon_array">
            <span>
              <img src="./images/index/ios.png" alt="IOS 아이콘">
              <img src="./images/index/android.png" alt="안드로이드 아이콘">
            </span>
          </div>
        </a>
        <figcaption>mmorpg</figcaption>
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
            <span><img src="./images/index/microsoft.png" alt="Windows 아이콘"></span>
          </div>
        </a>
        <figcaption>mmorpg</figcaption>
      </figure>

      <figure>
        <a href="./user/game.php" title="R2 바로가기">
          <img src="./images/index/4_game6.jpg" alt="R2">
          <h3>R2</h3>
          <div class="icon_array">
            <span><img src="./images/index/microsoft.png" alt="Windows 아이콘"></span>
          </div>
        </a>
        <figcaption>mmorpg</figcaption>
      </figure>

      <figure>
        <a href="./user/game.php" title="뮤 블루 바로가기">
          <img src="./images/index/4_game7.jpg" alt="뮤 블루">
          <h3>뮤 블루</h3>
          <div class="icon_array">
            <span><img src="./images/index/microsoft.png" alt="Windows 아이콘"></span>
          </div>
        </a>
        <figcaption>mmorpg</figcaption>
      </figure>

      <figure>
        <a href="./user/game.php" title="썬 리미티드 에디션 바로가기">
          <img src="./images/index/4_game8.jpg" alt="썬 리미티드 에디션">
          <h3>썬 : 리미티드 에디션</h3>
          <div class="icon_array">
            <span><img src="./images/index/microsoft.png" alt="Windows 아이콘"></span>
          </div>
        </a>
        <figcaption>mmorpg</figcaption>
      </figure>

    </div>
    <img src="./images/index/4_bg_2.png" alt="배경 이미지">
  </div>

  <!-- 세번째 그리드 -->
  <div class="layer03">
    <img src="./images/index/4_bg_3.png" alt="배경 이미지">
    <div class="grid03">

      <figure>
        <a href="./user/game.php" title="드래곤소드 바로가기">
          <img src="./images/index/4_game9.png" alt="드래곤소드">
          <h3>드래곤소드</h3>
          <div class="icon_array">
            <span>
              <img src="./images/index/ios.png" alt="IOS 아이콘">
              <img src="./images/index/android.png" alt="안드로이드 아이콘">
            </span>
          </div>
        </a>
        <figcaption>action rpg</figcaption>
      </figure>

      <figure>
        <a href="./user/game.php" title="R2 Online 바로가기">
          <img src="./images/index/4_game10.png" alt="R2 Online">
          <h3>R2</h3>
          <div class="icon_array">
            <span>
              <img src="./images/index/ios.png" alt="IOS 아이콘">
              <img src="./images/index/android.png" alt="안드로이드 아이콘">
            </span>
          </div>
        </a>
        <figcaption>mmorpg</figcaption>
      </figure>

      <figure>
        <a href="./user/game.php" title="R2M 바로가기">
          <img src="./images/index/4_game11.jpg" alt="R2M">
          <h3>R2M</h3>
          <div class="icon_array">
            <span>
              <img src="./images/index/ios.png" alt="IOS 아이콘">
              <img src="./images/index/android.png" alt="안드로이드 아이콘">
            </span>
          </div>
        </a>
        <figcaption>mmorpg</figcaption>
      </figure>

      <figure>
        <a href="./user/game.php" title="뮤 모나크 바로가기">
          <img src="./images/index/4_game12.png" alt="뮤 모나크">
          <h3>뮤 모나크</h3>
          <div class="icon_array">
            <span>
              <img src="./images/index/ios.png" alt="IOS 아이콘">
              <img src="./images/index/android.png" alt="안드로이드 아이콘">
            </span>
          </div>
        </a>
        <figcaption>mmorpg</figcaption>
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
            <span>
              <img src="./images/index/ios.png" alt="IOS 아이콘">
              <img src="./images/index/android.png" alt="안드로이드 아이콘">
            </span>
          </div>
        </a>
        <figcaption>mmorpg</figcaption>
      </figure>

      <figure>
        <a href="./user/game.php" title="뮤 온라인 바로가기">
          <img src="./images/index/4_game14.jpg" alt="뮤 온라인">
          <h3>뮤 온라인</h3>
          <div class="icon_array">
            <span><img src="./images/index/microsoft.png" alt="Windows 아이콘"></span>
          </div>
        </a>
        <figcaption>mmorpg</figcaption>
      </figure>

      <figure>
        <a href="./user/game.php" title="메틴 바로가기">
          <img src="./images/index/4_game15.jpg" alt="메틴">
          <h3>메틴</h3>
          <div class="icon_array">
            <span><img src="./images/index/microsoft.png" alt="Windows 아이콘"></span>
          </div>
        </a>
        <figcaption>mmorpg</figcaption>
      </figure>

      <figure>
        <a href="./user/game.php" title="샷온라인 바로가기">
          <img src="./images/index/4_game16.jpg" alt="샷온라인">
          <h3>샷온라인</h3>
          <div class="icon_array">
            <span><img src="./images/index/microsoft.png" alt="Windows 아이콘"></span>
          </div>
        </a>
        <figcaption>sports</figcaption>
      </figure>

    </div>
    <img src="./images/index/4_bg_4.png" alt="배경 이미지">
  </div>

</section>


    <section class="promotion">
      <!-- 5 신규또는 월간 프로모션 영상 영역  -->
      <img src="./images/index/5_promotion_bg.png" alt="" style="width: 100%;">
      <video src="./images/index/5_video.mp4" controls poster="./images/index/5_thumbnail.jpg"></video>
    </section>

    <section class="community">
      <!-- 6 최신 커뮤니티 슬라이드  -->
      <h2>지금 뜨는 커뮤니티 글</h2>
      <div class="commu_container">
        <div class="commu_box">
          <div class="commu_title">
            <h3>신규 서버 점핑 이벤트 후기 공유!</h3>
            <p>자유 게시판</p>
          </div>
          <div class="commu_name">
            <!-- 유저 프로필 임시삽입 -->
            <img src="./images/index/4_game1.png" alt="유저 프로필">
            <p>뮤전드&nbsp;&nbsp;</p>
            <p>&nbsp;&nbsp;2025.11.23</p>
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
            <img src="./images/index/4_game7.jpg" alt="유저 프로필">
            <p>아낙수나문&nbsp;&nbsp;</p>
            <p>&nbsp;&nbsp;2025.11.18</p>
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
            <img src="./images/index/4_game8.jpg" alt="유저 프로필">
            <p>뮤전드&nbsp;&nbsp;</p>
            <p>&nbsp;&nbsp;2025.11.23</p>
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

  <!-- JS 통합 스크립트 -->
  <script>
    // SECTION 1 : 메인 비주얼 슬라이드
    const mainImg   = document.getElementById('main_img');
    const mainText  = document.getElementById('main_text');
    const thumbs    = document.querySelectorAll('.visual_thumbs li');
    const mainLink  = document.getElementById('main_link');

    let currentIndex = 0;
    let autoSlide;

    function changeSlide(index) {
      thumbs.forEach((t) => t.classList.remove('active'));
      thumbs[index].classList.add('active');

      const target = thumbs[index];
      const img   = target.dataset.img;
      const title = target.dataset.title;
      const desc  = target.dataset.desc;
      const link  = target.dataset.link;

      mainLink.href   = link;
      mainImg.src     = img;
      mainText.innerHTML = `
        <h2>${title}</h2>
        <p>${desc}</p>
      `;
      currentIndex = index;
    }

    function startAutoSlide() {
      autoSlide = setInterval(() => {
        const nextIndex = (currentIndex + 1) % thumbs.length;
        changeSlide(nextIndex);
      }, 3000);
    }

    function stopAutoSlide() {
      clearInterval(autoSlide);
    }

    thumbs.forEach((thumb, index) => {
      thumb.addEventListener('click', () => {
        stopAutoSlide();
        changeSlide(index);
        startAutoSlide();
      });
    });

    changeSlide(0);
    startAutoSlide();

    // DOCUMENT READY (jQuery)
    $(function(){
      // 섹션2 : Swiper 슬라이드
      new Swiper(".newGameSwiper", {
        slidesPerView: 4,
        spaceBetween: 20,
        loop: false,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        }
      });

      // 섹션3 : top3 hover 효과
      $('.top3_img').hover(
        function(){
          $(this)
            .attr('src', $(this).data('hover'))
            .css('transform', 'scale(1.1)')
            .addClass('hover-effect');
        },
        function(){
          $(this)
            .attr('src', $(this).data('default'))
            .css('transform', 'scale(1)')
            .removeClass('hover-effect');
        }
      );

      // 섹션4 : 게임목록 스크롤 애니메이션
      const $grid01 = $('.grid01');
      const $grid02 = $('.grid02');
      const $grid03 = $('.grid03');
      const $grid04 = $('.grid04');
      const $b_img01 = $('.layer01 > img');
      const $b_img02 = $('.layer02 > img');
      const $b_img03 = $('.layer03 > img');
      const $b_img04 = $('.layer04 > img');

      $(window).on('scroll', function(){
        const y = $(this).scrollTop();

        if (y >= 1200) {
          $grid01.css('left','0px');
          $b_img01.css('top','0px');
        }
        if (y >= 1700) {
          $grid02.css('right','0px');
          $b_img02.css('top','0px');
        }
        if (y >= 2100) {
          $grid03.css('left','0px');
          $b_img03.css('top','0px');
        }
        if (y >= 2600) {
          $grid04.css('right','0px');
          $b_img04.css('top','0px');
        }
      });

      // 모바일 메뉴 탭
      const openBtn = document.getElementById("open_tab");
      const closeBtn = document.getElementById("clo_tab");
      const mPanel = document.querySelector(".m_nav_panel");

      if (openBtn && closeBtn && mPanel) {
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
      }
    });
  </script>
</body>
</html>