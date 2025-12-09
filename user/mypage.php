<?php
session_start();
include '../db/db_conn.php';
include '../common/header.php';

// 로그인 체크
if(!isset($_SESSION['mb_no'])){
  echo "<script>alert('로그인이 필요합니다.'); location.href='../auth/login.php';</script>";
  exit;
}

$user_no = intval($_SESSION['mb_no']);

// 1. 내 정보 불러오기
$sql_user = "SELECT * FROM users WHERE user_no = $user_no";
$result_user = mysqli_query($conn, $sql_user);
$user = mysqli_fetch_assoc($result_user);

// 프로필 이미지
$profile_img = (!empty($user['user_img'])) 
  ? "../uploads/profile/" . $user['user_img'] 
  : "../images/user_admin/img_upload.png";

// 2. 내가 쓴 글 불러오기
$sql_posts = "SELECT post_no, post_title, view_count, created_datetime
              FROM board_posts
              WHERE user_no = $user_no
              ORDER BY post_no DESC";
$result_posts = mysqli_query($conn, $sql_posts);

// 3. 문의 내역 불러오기
$sql_inquiry = "SELECT * FROM support_inquiry 
                WHERE user_no = $user_no 
                ORDER BY inquiry_no DESC";
$result_inquiry = mysqli_query($conn, $sql_inquiry);
?>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<main>
  <div>
    <h2 class="text_center">MY PAGE</h2>

    <div class="page_wrap">

      <!-- 1. 내정보 섹션 -->
      <section id="info" class="page_section">
        <h3 class="head_tag">
          <p>내 정보</p>
        </h3>

        <!-- 프로필 이미지 -->
        <div class="profile_img">
          <img src="<?= $profile_img ?>" alt="프로필 이미지" class="p_img">
        </div>

        <!-- 정보 테이블 -->
        <table>
          <tbody>
            <tr>
              <th class="text_end">이름</th>
              <td class="text_start"><?= $user['user_name'] ?></td>
            </tr>
            <tr>
              <th class="text_end">전화번호</th>
              <td class="text_start"><?= $user['user_phone'] ?></td>
            </tr>
            <tr>
              <th class="text_end">닉네임</th>
              <td class="text_start"><?= $user['user_nickname'] ?></td>
            </tr>
            <tr>
              <th class="text_end">아이디</th>
              <td class="text_start"><?= $user['user_id'] ?></td>
            </tr>
            <tr>
              <th class="text_end">이메일</th>
              <td class="text_start"><?= $user['user_email'] ?></td>
            </tr>
          </tbody>
        </table>
      </section>



<!-- 2. 내가 쓴 글 섹션 -->
<section id="my_writing" class="page_section">
  <h3 class="head_tag">
    <i class="fa-solid fa-angle-left" onclick='infoPage()'></i>
    <p>내가 쓴 글</p>
  </h3>

<?php
// 페이지네이션 설정
$list_num = 10; // 한 페이지당 10개
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$start = ($page - 1) * $list_num;

// 게시글 목록 가져오기
$sql_posts = "
  SELECT post_no, title, created_at
  FROM board_posts
  WHERE user_no = $user_no
  ORDER BY post_no DESC
  LIMIT $start, $list_num
";
$result_posts = mysqli_query($conn, $sql_posts);

// 게시글 총 개수 구하기
$sql_total = "
  SELECT COUNT(*) AS total
  FROM board_posts
  WHERE user_no = $user_no
";
$total_result = mysqli_query($conn, $sql_total);
$total_row = mysqli_fetch_assoc($total_result);
$total = $total_row['total'];

$total_page = ceil($total / $list_num); // 총 페이지 수
?>

  <table class="table_wrap">
    <thead>
      <tr>
        <th class="text_center">No.</th>
        <th class="text_center">제목</th>
        <th class="text_center">작성일</th>
      </tr>
    </thead>

    <tbody>
      <?php 
      if ($total > 0) {
        while ($post = mysqli_fetch_assoc($result_posts)) { ?>
          <tr>
            <td class="text_center"><?= $post['post_no'] ?></td>
            <td class="text_start">
              <a href="../community/board_view.php?no=<?= $post['post_no'] ?>">
                <?= htmlspecialchars($post['title']) ?>
              </a>
            </td>
            <td class="text_center"><?= $post['created_at'] ?></td>
          </tr>
      <?php }
      } else { ?>
        <tr>
          <td colspan="3" class="text_center">작성한 게시글이 없습니다.</td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

  <!-- 페이지네이션 -->
  <?php if ($total_page > 1) { ?>
  <div class="pagination">
    <ul class="pagination_modal">

      <!-- 이전 버튼 -->
      <li>
        <?php if ($page > 1) { ?>
          <a href="?page=<?= $page - 1 ?>" class="arrow">
            <i class="fa-solid fa-angle-left"></i>
          </a>
        <?php } else { ?>
          <a class="arrow disabled"><i class="fa-solid fa-angle-left"></i></a>
        <?php } ?>
      </li>

      <!-- 페이지 번호 -->
      <?php
      // 페이지 번호는 1~10개씩만 보이도록 구성 가능 (원하면 개선해줄게)
      for ($i = 1; $i <= $total_page; $i++) { ?>
        <li>
          <a href="?page=<?= $i ?>" class="num <?= ($i == $page) ? 'active_num' : '' ?>">
            <?= $i ?>
          </a>
        </li>
      <?php } ?>

      <!-- 다음 버튼 -->
      <li>
        <?php if ($page < $total_page) { ?>
          <a href="?page=<?= $page + 1 ?>" class="arrow">
            <i class="fa-solid fa-angle-right"></i>
          </a>
        <?php } else { ?>
          <a class="arrow disabled"><i class="fa-solid fa-angle-right"></i></a>
        <?php } ?>
      </li>

    </ul>
  </div>
  <?php } ?>

</section>

<!-- 3. 문의 내역 섹션 -->
<section id="inquiries" class="page_section">
  <div>
    <h3 class="head_tag">
      <i class="fa-solid fa-angle-left" onclick='infoPage()'></i>
      <p>문의 내역</p>
    </h3>

    <!-- 문의하기 버튼 -->
    <div class="btn_wrap">
      <button class="btn_red" type="button" onclick="location.href='../support/inquiry_write.php'">문의하기</button>
    </div>

<?php
// 페이지네이션 설정
$list_num_inq = 10;
$page_inq = isset($_GET['inq_page']) ? intval($_GET['inq_page']) : 1;
$start_inq = ($page_inq - 1) * $list_num_inq;

// 문의 목록 가져오기
$sql_inquiry = "
  SELECT * 
  FROM support_inquiry
  WHERE user_no = $user_no
  ORDER BY inquiry_no DESC
  LIMIT $start_inq, $list_num_inq
";
$result_inquiry = mysqli_query($conn, $sql_inquiry);

// 총 문의 수
$sql_inquiry_total = "
  SELECT COUNT(*) AS total_inq
  FROM support_inquiry
  WHERE user_no = $user_no
";
$inq_count_result = mysqli_query($conn, $sql_inquiry_total);
$inq_total = mysqli_fetch_assoc($inq_count_result)['total_inq'];

$inq_total_page = ceil($inq_total / $list_num_inq);
?>

    <!-- 문의 테이블 -->
    <table class="table_wrap">
      <thead>
        <tr>
          <th class="text_center">No.</th>
          <th class="text_center">제목</th>
          <th class="text_center">작성일</th>
          <th class="text_center">처리상태</th>
          <th></th>
        </tr>
      </thead>

      <tbody>
        <?php
        if (mysqli_num_rows($result_inquiry) > 0) {
          while ($inq = mysqli_fetch_assoc($result_inquiry)) { ?>
          
            <tr class="question">
              <td class="text_center"><?= $inq['inquiry_no'] ?></td>
              <td class="text_start"><?= htmlspecialchars($inq['inquiry_title']) ?></td>
              <td class="text_center"><?= $inq['created_datetime'] ?></td>
              <td class="text_center">
                <?= ($inq['inquery_status'] === 'done') ? '처리완료' : '대기중'; ?>
              </td>
              <td class="text_center"><i class="fa-solid fa-sort-down"></i></td>
            </tr>

            <tr class="answer text_center">
              <td colspan="5">
                <?= !empty($inq['inquiry_reply']) ? nl2br($inq['inquiry_reply']) : '아직 답변이 등록되지 않았습니다.' ?>
              </td>
            </tr>

        <?php }
        } else { ?>
          <tr>
            <td colspan="5" class="text_center">문의 내역이 없습니다.</td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

    <!-- 페이지네이션 -->
    <?php if ($inq_total_page > 1) { ?>
    <div class="pagination">
      <ul class="pagination_modal">

        <!-- 이전 버튼 -->
        <li>
          <?php if ($page_inq > 1) { ?>
            <a href="?inq_page=<?= $page_inq - 1 ?>" class="arrow">
              <i class="fa-solid fa-angle-left"></i>
            </a>
          <?php } else { ?>
            <a class="arrow disabled"><i class="fa-solid fa-angle-left"></i></a>
          <?php } ?>
        </li>

        <!-- 페이지 번호 -->
        <?php for ($i = 1; $i <= $inq_total_page; $i++) { ?>
          <li>
            <a href="?inq_page=<?= $i ?>" class="num <?= ($i == $page_inq) ? 'active_num' : '' ?>">
              <?= $i ?>
            </a>
          </li>
        <?php } ?>

        <!-- 다음 버튼 -->
        <li>
          <?php if ($page_inq < $inq_total_page) { ?>
            <a href="?inq_page=<?= $page_inq + 1 ?>" class="arrow">
              <i class="fa-solid fa-angle-right"></i>
            </a>
          <?php } else { ?>
            <a class="arrow disabled"><i class="fa-solid fa-angle-right"></i></a>
          <?php } ?>
        </li>

      </ul>
    </div>
    <?php } ?>

  </div>
</section>




    </div>
  </div>

  <!-- 좌측 네비게이션  -->
  <nav class="side_nav" id="side-nav">
    <ul>
      <li><a href="#info" class="active_nav">내 정보</a></li>
      <li id="nav_register">
        <i class="fa-regular fa-user"></i>
        <a href="../php/register.php" title="정보 수정">내 정보 수정</a>
      </li>
      <li>
        <i class="fa-regular fa-file-lines"></i>
        <a href="#my_writing" title="내가 쓴 글">내가 쓴 글</a>
      </li>
      <li>
        <i class="fa-regular fa-headphones"></i>
        <a href="#inquiries" title="문의 내역">문의 내역</a>
      </li>
      <li>
        <i class="fa-regular fa-circle-xmark"></i>
        <a href="#" onclick="leaveFunction()" class="leave">탈퇴하기</a>
      </li>
    </ul>
  </nav>

  <script src="../script/mypage.js"></script>
</main>

<?php include '../common/footer.php'; ?>