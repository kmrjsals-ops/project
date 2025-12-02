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

            <div class="col-md-3">
                <div class="card p-3 shadow-sm">
                    <h5>게임 등록 수</h5>
                    <p>12 건</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card p-3 shadow-sm">
                    <h5>공지사항</h5>
                    <p>5 개</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card p-3 shadow-sm">
                    <h5>문의</h5>
                    <p>3 건</p>
                </div>
            </div>

        </div>

    </main>
</div>

<?php include('admin_footer.php'); ?>