<?php
include '../common/header.php';
include '../db/db_conn.php';

// 🔒 로그인 체크
if (!isset($_SESSION['mb_no'])) {
    echo "<script>alert('로그인이 필요합니다.'); location.href='../auth/login.php';</script>";
    exit;
}

$user_no = intval($_SESSION['mb_no']);

// =============================================
// 🔧 1) 유틸 함수들
// =============================================
function h($str) { return htmlspecialchars($str ?? '', ENT_QUOTES, 'UTF-8'); }

// 페이지네이션 HTML 생성
function pagination($now, $total, $paramName = 'page') {
    if ($total <= 1) return '';

    $html = '<div class="pagination"><ul class="pagination_modal">';

    // 이전
    if ($now > 1) {
        $prev = $now - 1;
        $html .= "<li><a href=\"?{$paramName}={$prev}\" class=\"arrow\"><i class=\"fa-solid fa-angle-left\"></i></a></li>";
    } else {
        $html .= "<li><a class='arrow disabled'><i class='fa-solid fa-angle-left'></i></a></li>";
    }

    // 번호
    for ($i=1; $i <= $total; $i++) {
        $active = ($i == $now) ? 'active_num' : '';
        $html .= "<li><a href=\"?{$paramName}={$i}\" class=\"num {$active}\">{$i}</a></li>";
    }

    // 다음
    if ($now < $total) {
        $next = $now + 1;
        $html .= "<li><a href=\"?{$paramName}={$next}\" class=\"arrow\"><i class=\"fa-solid fa-angle-right\"></i></a></li>";
    } else {
        $html .= "<li><a class='arrow disabled'><i class='fa-solid fa-angle-right'></i></a></li>";
    }

    return $html . "</ul></div>";
}


// =============================================
// 🔧 2) 사용자 정보 가져오기
// =============================================
$sql_user = "SELECT * FROM users WHERE user_no = $user_no";
$user = mysqli_fetch_assoc(mysqli_query($conn, $sql_user));

$profile_img = (!empty($user['user_img'])) 
    ? "../uploads/profile/" . $user['user_img']
    : "../images/user_admin/img_upload.png";


// =============================================
// 🔧 3) 내가 쓴 글 페이지네이션 + 목록
// =============================================
$post_per_page = 10;
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$start = ($page - 1) * $post_per_page;

// 총 개수
$total_posts = mysqli_fetch_assoc(mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM board_posts WHERE user_no = $user_no"
))['total'];

$total_post_page = ceil($total_posts / $post_per_page);

// 목록
$sql_posts = "
    SELECT post_no, title, created_at
    FROM board_posts
    WHERE user_no = $user_no
    ORDER BY post_no DESC
    LIMIT $start, $post_per_page
";
$posts = mysqli_query($conn, $sql_posts);


// =============================================
// 🔧 4) 문의 목록 페이지네이션 + 목록
// =============================================
$inq_per_page = 10;
$page_inq = isset($_GET['inq_page']) ? max(1, intval($_GET['inq_page'])) : 1;
$start_inq = ($page_inq - 1) * $inq_per_page;

$total_inq = mysqli_fetch_assoc(mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM support_inquiry WHERE user_no = $user_no"
))['total'];

$total_inq_page = ceil($total_inq / $inq_per_page);

$sql_inquiry = "
    SELECT *
    FROM support_inquiry
    WHERE user_no = $user_no
    ORDER BY inquiry_no DESC
    LIMIT $start_inq, $inq_per_page
";
$inquiry = mysqli_query($conn, $sql_inquiry);
?>



<main>
  <h2 class="text_center">MY PAGE</h2>

  <div class="page_wrap">

    <!-- ===============================
         1. 내 정보
    =============================== -->
    <section id="info" class="page_section">
      <h3 class="head_tag"><p>내 정보</p></h3>

      <div class="profile_img">
        <img src="<?= $profile_img ?>" alt="프로필 이미지" class="p_img">
      </div>

      <table>
        <tbody>
          <tr><th class="text_end">이름</th>       <td class="text_start"><?= h($user['user_name']) ?></td></tr>
          <tr><th class="text_end">전화번호</th>   <td class="text_start"><?= h($user['user_phone']) ?></td></tr>
          <tr><th class="text_end">닉네임</th>     <td class="text_start"><?= h($user['user_nickname']) ?></td></tr>
          <tr><th class="text_end">아이디</th>     <td class="text_start"><?= h($user['user_id']) ?></td></tr>
          <tr><th class="text_end">이메일</th>     <td class="text_start"><?= h($user['user_email']) ?></td></tr>
        </tbody>
      </table>
    </section>



    <!-- ===============================
         2. 내가 쓴 글
    =============================== -->
    <section id="my_writing" class="page_section">
      <h3 class="head_tag">
        <i class="fa-solid fa-angle-left" onclick="infoPage()"></i>
        <p>내가 쓴 글</p>
      </h3>

      <table class="table_wrap">
        <thead>
          <tr>
            <th class="text_center">No.</th>
            <th class="text_center">제목</th>
            <th class="text_center">작성일</th>
          </tr>
        </thead>

        <tbody>
        <?php if ($total_posts == 0): ?>
          <tr><td colspan="3" class="text_center">작성한 게시글이 없습니다.</td></tr>
        <?php else: 
          while ($p = mysqli_fetch_assoc($posts)): ?>
          <tr>
            <td class="text_center"><?= h($p['post_no']) ?></td>
            <td class="text_start">
              <a href="../community/board_view.php?no=<?= $p['post_no'] ?>">
                <?= h($p['title']) ?>
              </a>
            </td>
            <td class="text_center"><?= h($p['created_at']) ?></td>
          </tr>
        <?php endwhile; endif; ?>
        </tbody>
      </table>

      <?= pagination($page, $total_post_page, 'page') ?>
    </section>



    <!-- ===============================
         3. 문의 내역
    =============================== -->
    <section id="inquiries" class="page_section">
      <h3 class="head_tag">
        <i class="fa-solid fa-angle-left" onclick="infoPage()"></i>
        <p>문의 내역</p>
      </h3>

      <div class="btn_wrap">
        <button class="btn_red" type="button" onclick="location.href='inquiry_write.php'">문의하기</button>
      </div>

      <table class="table_wrap">
        <thead>
          <tr>
            <th class="text_center">No.</th>
            <th class="text_center">제목</th>
            <th class="text_center">작성일</th>
            <th class="text_center">상태</th>
            <th></th>
          </tr>
        </thead>

        <tbody>
        <?php if ($total_inq == 0): ?>
          <tr><td colspan="5" class="text_center">문의 내역이 없습니다.</td></tr>
        <?php else: 
          while ($q = mysqli_fetch_assoc($inquiry)): ?>
          <tr class="question">
            <td class="text_center"><?= h($q['inquiry_no']) ?></td>
            <td class="text_start"><?= h($q['inquiry_title']) ?></td>
            <td class="text_center"><?= h($q['create_datetime']) ?></td>
            <td class="text_center"><?= ($q['inquiry_status'] === 'done') ? '처리완료' : '대기중' ?></td>
            <td class="text_center"><i class="fa-solid fa-sort-down"></i></td>
          </tr>
          <tr class="answer text_center">
            <td colspan="5">
              <?= !empty($q['inquiry_reply']) ? nl2br(h($q['inquiry_reply'])) : '아직 답변이 등록되지 않았습니다.' ?>
            </td>
          </tr>
        <?php endwhile; endif; ?>
        </tbody>
      </table>

      <?= pagination($page_inq, $total_inq_page, 'inq_page') ?>
    </section>

  </div>



  <!-- ===============================
       좌측 네비게이션
  =============================== -->
  <nav class="side_nav" id="side-nav">
    <ul>
      <li><a href="#info" class="active_nav">내 정보</a></li>
      <li>
        <i class="fa-regular fa-user"></i>
        <a href="../php/register.php">내 정보 수정</a>
      </li>
      <li>
        <i class="fa-regular fa-file-lines"></i>
        <a href="#my_writing">내가 쓴 글</a>
      </li>
      <li>
        <i class="fa-regular fa-headphones"></i>
        <a href="#inquiries">문의 내역</a>
      </li>
      <li>
        <i class="fa-regular fa-circle-xmark"></i>
        <a href="#" onclick="location.href='mypage_withdraw.php'" class="leave">탈퇴하기</a>
      </li>
    </ul>
  </nav>

  <script src="../script/mypage.js"></script>
</main>

<?php include '../common/footer.php'; ?>
