<?php
include('../common/header.php');
include('../db/db_conn.php');

// -------------------------
// 1) 공지 번호 확인
// -------------------------
$notice_no = isset($_GET['no']) ? intval($_GET['no']) : 0;

if ($notice_no < 1) {
    echo "<script>alert('잘못된 접근입니다.'); location.href='notice.php';</script>";
    exit;
}

// -------------------------
// 2) 조회수 증가
// -------------------------
$updateViewSql = "UPDATE notice SET view_count = view_count + 1 WHERE notice_no = $notice_no";
mysqli_query($conn, $updateViewSql);

// -------------------------
// 3) 공지 상세 정보 가져오기
// -------------------------
$sql = "SELECT * FROM notice WHERE notice_no = $notice_no";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    echo "<script>alert('공지사항을 찾을 수 없습니다.'); location.href='notice.php';</script>";
    exit;
}

// 데이터 가공
$title   = htmlspecialchars($row['notice_title'], ENT_QUOTES, 'UTF-8');
$content = nl2br(htmlspecialchars($row['notice_content'], ENT_QUOTES, 'UTF-8'));
$date    = date("Y.m.d", strtotime($row['create_datetime']));
$view    = intval($row['view_count']);
$img     = !empty($row['notice_img']) ? $row['notice_img'] : null;

// 날짜 포맷 함수
function formatDate($d) {
    return date("Y.m.d", strtotime($d));
}

// -------------------------
// 4) 이전글 / 다음글
// -------------------------

// 이전글(번호 큰 것 중 가장 작은 번호)
$prev_sql = "
    SELECT notice_no, notice_title, create_datetime
    FROM notice
    WHERE notice_no > $notice_no
    ORDER BY notice_no ASC
    LIMIT 1
";
$prev = mysqli_fetch_assoc(mysqli_query($conn, $prev_sql));

// 다음글(번호 작은 것 중 가장 큰 번호)
$next_sql = "
    SELECT notice_no, notice_title, create_datetime
    FROM notice
    WHERE notice_no < $notice_no
    ORDER BY notice_no DESC
    LIMIT 1
";
$next = mysqli_fetch_assoc(mysqli_query($conn, $next_sql));
?>

<link rel="stylesheet" href="../css/notice_view.css" type="text/css">

<section class="notice_view">
    <div class="main-container">

        <div class="top-nav">
            <div class="page-category">공지사항</div>
            <a href="notice.php" class="btn-list">목록</a>
        </div>

        <div class="post-header">
            <div class="post-title"><?= $title ?></div>

            <div class="post-info">
                <div class="info-left"></div>
                <div class="info-right">
                    <span>조회수 <?= $view ?> / <?= $date ?></span>
                    <svg class="icon-folder" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M10 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 
                        2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2h-8l-2-2z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="post-body">
            <?php if ($img && file_exists("../uploads/notice/$img")) { ?>
                <img src="../uploads/notice/<?= htmlspecialchars($img) ?>" 
                     alt="공지사항 이미지" 
                     class="post-banner">
            <?php } ?>

            <div class="text-highlight"><?= $content ?></div>
        </div>

        <!-- 이전글 / 다음글 -->
        <div class="post-nav-list">

            <!-- 이전글 -->
            <?php if ($prev) { ?>
                <a href="notice_view.php?no=<?= $prev['notice_no'] ?>" class="nav-item">
                    <div class="nav-arrow arrow-up"></div>
                    <div class="nav-title nav-left"><?= htmlspecialchars($prev['notice_title']) ?></div>
                    <div class="nav-date"><?= formatDate($prev['create_datetime']) ?></div>
                </a>
            <?php } else { ?>
                <div class="nav-item disabled">
                    <div class="nav-arrow arrow-up disabled"></div>
                    <div class="nav-title nav-left">이전글 없음</div>
                    <div class="nav-date"></div>
                </div>
            <?php } ?>

            <!-- 다음글 -->
            <?php if ($next) { ?>
                <a href="notice_view.php?no=<?= $next['notice_no'] ?>" class="nav-item">
                    <div class="nav-arrow arrow-down"></div>
                    <div class="nav-title nav-right"><?= htmlspecialchars($next['notice_title']) ?></div>
                    <div class="nav-date"><?= formatDate($next['create_datetime']) ?></div>
                </a>
            <?php } else { ?>
                <div class="nav-item disabled">
                    <div class="nav-arrow arrow-down disabled"></div>
                    <div class="nav-title nav-right">다음글 없음</div>
                    <div class="nav-date"></div>
                </div>
            <?php } ?>

        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded',function(){
    const titleLeft = document.querySelector('.nav-left');
    const titleRight = document.querySelector('.nav-right');

    const mediaQuery = window.matchMedia('(max-width: 768px)');

    function handleScreenChange(e){
        if(e.matches){
            if(titleLeft)  titleLeft.textContent  = '이전글';
            if(titleRight) titleRight.textContent = '다음글';
        }
    }
    handleScreenChange(mediaQuery);
    mediaQuery.addEventListener('change', handleScreenChange);
});
</script>

<?php include('../common/footer.php'); ?>
