<?php
include('../db/db_conn.php');
include('admin_header.php'); 

// 회원 수 가져오기 
$sql_user = "SELECT COUNT(*) AS cnt FROM users";
// 검색 결과 담아줌 
$user_result = mysqli_query($conn, $sql_user);
// 결과값 즉 cnt 조건으로 검색 결과값 총 회원수 를 row로 담아준다 
$user_row = mysqli_fetch_assoc($user_result);
$user_count = $user_row['cnt'];

// 공지사항 수 가져오기 
$sql_notice = "SELECT COUNT(*) AS cnt FROM notice";
$notice_result = mysqli_query($conn, $sql_notice);
$notice_row = mysqli_fetch_assoc($notice_result);
$notice_count = $notice_row['cnt'];
?>

<div class="admin-wrapper d-flex">
    <!-- 관리자 사이드바 연결 -->
    <?php include('admin_sidebar.php'); ?>

    <main class="p-4 admin-content w-100">
        <h1 class="mb-4">관리자 대시보드</h1>

        <div class="row g-3">

        <!-- 1. 회원카드에 회원수 연결  -->
            <div class="col-md-3">
                <a href="member/member_list.php" class="nav-link">
                    <div class="card p-3 shadow-sm">
                        <h5>회원 수</h5>
                        <p class="fs-4 fw-bold"><?= $user_count?>명</p>
                    </div>
                </a>
            </div>
            <!-- 2. 게임 수 연결 -->
            <div class="col-md-3">
                <a href="game/game_list.php" class="nav-link">
                    <div class="card p-3 shadow-sm">
                        <h5>게임 등록 수</h5>
                        <p class="fs-4 fw-bold">12 건</p>
                    </div>
                </a>
            </div>

            <!-- 3. 공지사항에 공지사항 수 연결  -->
            <div class="col-md-3">
                <a href="notice/notice_list.php" class="nav-link">
                    <div class="card p-3 shadow-sm">
                        <h5>공지사항</h5>
                        <p class="fs-4 fw-bold"><?= $notice_count?>개</p>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="inquiry/inquiry_list.php" class="nav-link">
                    <div class="card p-3 shadow-sm">
                        <h5>문의</h5>
                        <p class="fs-4 fw-bold">3 건</p>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="board/board_list.php" class="nav-link">
                    <div class="card p-3 shadow-sm">
                        <h5>게시판 등록글 수 </h5>
                        <p class="fs-4 fw-bold">3 건</p>
                    </div>
                </a>
            </div>

        </div>

    </main>
</div>

<?php include('admin_footer.php'); ?>