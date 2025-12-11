<?php
include('../db/db_conn.php');
include('admin_header.php');

// -----------------------------
// 공통 카운트 함수 (중복 제거)
// -----------------------------
function getCount($conn, $table) {
    $sql = "SELECT COUNT(*) AS cnt FROM {$table}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return intval($row['cnt']);
}

// -----------------------------
// 1) 카운트 데이터 가져오기
// -----------------------------
$user_count    = getCount($conn, 'users');
$notice_count  = getCount($conn, 'notice');
$game_count    = getCount($conn, 'games');
$inquiry_count = getCount($conn, 'support_inquiry');

// 게시판 글 수 (DB 적용 원하면 테이블명 알려줘)
$board_count   = getCount($conn, 'board_posts'); 
?>

<div class="admin-wrapper d-flex">
    <?php include('admin_sidebar.php'); ?>

    <main class="p-4 admin-content w-100">
        <h1 class="mb-4">관리자 대시보드</h1>

        <div class="row g-3">

            <!-- 1) 회원 수 -->
            <div class="col-md-3">
                <a href="member/member_list.php" class="nav-link">
                    <div class="card p-3 shadow-sm">
                        <h5>회원 수</h5>
                        <p class="fs-4 fw-bold"><?= $user_count ?>명</p>
                    </div>
                </a>
            </div>

            <!-- 2) 게임 등록 수 -->
            <div class="col-md-3">
                <a href="game/game_list.php" class="nav-link">
                    <div class="card p-3 shadow-sm">
                        <h5>게임 등록 수</h5>
                        <p class="fs-4 fw-bold"><?= $game_count ?>개</p>
                    </div>
                </a>
            </div>

            <!-- 3) 공지사항 수 -->
            <div class="col-md-3">
                <a href="notice/notice_list.php" class="nav-link">
                    <div class="card p-3 shadow-sm">
                        <h5>공지사항</h5>
                        <p class="fs-4 fw-bold"><?= $notice_count ?>개</p>
                    </div>
                </a>
            </div>

            <!-- 4) 문의 수 -->
            <div class="col-md-3">
                <a href="inquiry/inquiry_list.php" class="nav-link">
                    <div class="card p-3 shadow-sm">
                        <h5>문의</h5>
                        <p class="fs-4 fw-bold"><?= $inquiry_count ?>개</p>
                    </div>
                </a>
            </div>

            <!-- 5) 게시판 글 수 -->
            <div class="col-md-3">
                <a href="board/board_list.php" class="nav-link">
                    <div class="card p-3 shadow-sm">
                        <h5>게시판 등록글 수</h5>
                        <p class="fs-4 fw-bold"><?= $board_count ?>건</p>
                    </div>
                </a>
            </div>

        </div>
    </main>
</div>

<?php include('admin_footer.php'); ?>
