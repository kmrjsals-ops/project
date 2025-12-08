<?
    include('../common/header.php');
    include('../db/db_conn.php');

    //  1. 검색 기능을 위한 검색어 처리 
    $search = isset($_GET['search']) ? trim($_GET['search']) : "";

    // where 조건을 생성해준다 
    $where = "";
    if($search !== ""){
        $search_escape = mysqli_real_escape_string($conn, $search);
        $where = "WHERE notice_title LIKE '%$search_escape%'";
    }

    //2. 페이지네이션 변수 설정
    $list_per_page = 10; //한 페이지 당 보여질 공지사항 수 정하기 10개
    $page = isset($_GET['page'])?intval($_GET['page']) : 1;
    if($page < 1) $page = 1;

    // 전체 데이터의 개수를 가져온다 
    $count_sql = "SELECT COUNT(*) AS cnt FROM notice $where";
    $count_result = mysqli_query($conn, $count_sql);
    $total_count = mysqli_fetch_assoc($count_result)['cnt'];

    // 전체 페이지의 수 담아주기 
    $total_page = ceil($total_count/$list_per_page);

    // 시작점 설정하기
    $start = ($page -1)*$list_per_page;

    // 3. db에서 공지사항 데이터 가져오기 
    $sql = "SELECT notice_no, notice_title, create_datetime FROM notice $where ORDER BY notice_no DESC LIMIT $start, $list_per_page";
    $result = mysqli_query($conn,$sql);
?>
<link rel="stylesheet" href="../css/notice.css" type="text/css">

<main>
	<section class="notice">
    <div class="hero-section">
        <h1 class="page-title">공지사항</h1>
    </div>

    <div class="main-container">

        <!-- 검색 박스 설정 -->
        <div class="search-section">
            <form action="notice.php" method="get" class="search-box">
                <input type="text" name="search" class="search-input" placeholder="Search"
                       value="<?= htmlspecialchars($search) ?>">
                <button type="submit" class="search-icon-btn">
                    <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 
                        16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 
                        5.91 16 9.5 16c1.61 0 3.09-.59 
                        4.23-1.57l.27.28v.79l5 4.99L20.49 
                        19l-4.99-5zm-6 0C7.01 14 5 11.99 
                        5 9.5S7.01 5 9.5 5 14 7.01 
                        14 9.5 11.99 14 9.5 14z"/>
                    </svg>
                </button>
            </form>
        </div>

        <!-- 공지사항 리스트 출력 -->
        <div class="notice-list">

        <?php
            if(mysqli_num_rows($result) == 0){
                echo "<p style='padding:20px; text-align:center;'>검색 결과가 없습니다.</p>";
            }

            while($row = mysqli_fetch_assoc($result)){
                $date = date("Y.m.d", strtotime($row['create_datetime']));
        ?>

            <a href="notice_view.php?no=<?= $row['notice_no'] ?>">
                <div class="list-item">
                    <span class="item-title"><?= htmlspecialchars($row['notice_title']) ?></span>
                    <span class="item-date"><?= $date ?></span>
                </div>
            </a>

        <?php } ?>

        </div>

        <!-- 페이지네이션 영역 -->
        <div class="pagination">

            <!-- 이전 페이지 -->
            <?php if($page > 1){ ?>
                <a class="page-arrow" href="?page=<?= ($page-1) ?>&search=<?= urlencode($search) ?>">&lt;</a>
            <?php } else { ?>
                <div class="page-arrow disabled">&lt;</div>
            <?php } ?>

            <!-- 페이지 번호 -->
            <?php
                for($i = 1; $i <= $total_page; $i++){
                    $active = ($i == $page) ? "active" : "";
                    echo "<a class='page-link $active' href='?page=$i&search=".urlencode($search)."'>$i</a>";
                }
            ?>

            <!-- 다음 페이지 -->
            <?php if($page < $total_page){ ?>
                <a class="page-arrow" href="?page=<?= ($page+1) ?>&search=<?= urlencode($search) ?>">&gt;</a>
            <?php } else { ?>
                <div class="page-arrow disabled">&gt;</div>
            <?php } ?>

        </div>

    </div>
	</section>
</main>

<?php include('../common/footer.php'); ?>