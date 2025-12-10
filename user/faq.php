<?php
include '../common/header.php';
include '../db/db_conn.php';

// 검색어 처리
$search = isset($_GET['search']) ? trim($_GET['search']) : "";

// 페이지네이션 기본값
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$limit = 10; // 페이지 당 10개
$offset = ($page - 1) * $limit;

// 검색 조건
$where = "";
if ($search !== "") {
    $safe = mysqli_real_escape_string($conn, $search);
    $where = "WHERE faq_question LIKE '%$safe%' OR faq_answer LIKE '%$safe%' OR faq_category LIKE '%$safe%'";
}

// 전체 FAQ 개수 조회
$sql_count = "SELECT COUNT(*) AS total FROM support_faq $where";
$count_result = mysqli_query($conn, $sql_count);
$total = mysqli_fetch_assoc($count_result)['total'];

$total_pages = ceil($total / $limit);

// FAQ 데이터 가져오기
$sql = "
    SELECT * FROM support_faq
    $where
    ORDER BY faq_no DESC
    LIMIT $limit OFFSET $offset
";
$result = mysqli_query($conn, $sql);
?>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<main class="faq_main">
<section class="faq_section">
<div>
<h2 class="text_center">자주 묻는 질문</h2>

<div class="faq_top_wrap">
<div class="search_wrap02">
    <form action="faq.php" method="get" class="search_form">

        <button class="btn_gray inquiries_btn" type="button" onclick="location.href='inquiry_write.php'">
            문의하기
        </button>

        <div class="search_wrap01">
            <div class="search_group">
                <input type="text" name="search" class="search_input" placeholder="검색어를 입력해주세요." value="<?= $search ?>">
                <i class="fa-solid fa-magnifying-glass search-icon"></i>
            </div>

            <button class="btn_red search_btn" type="submit">검색</button>
        </div>

    </form>
</div>
</div>

<!-- FAQ 테이블 -->
<table class="table_wrap02">
<thead>
    <tr>
        <th class="text_center">No.</th>
        <th class="text_center">질문/답변</th>
        <th></th>
    </tr>
</thead>

<tbody>
<?php 
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) { ?>
        
        <!-- 질문 -->
        <tr class="question">
            <td class="text_center"><?= $row['faq_no'] ?></td>
            <td class="text_start">Q. <?= $row['faq_question'] ?></td>
            <td class="text_center"><i class="fa-solid fa-sort-down"></i></td>
        </tr>

        <!-- 답변 -->
        <tr class="answer text_start">
            <td colspan="3">A. <?= nl2br($row['faq_answer']) ?></td>
        </tr>

<?php 
    }
} else { ?>
    <tr>
        <td colspan="3" class="text_center">검색 결과가 없습니다.</td>
    </tr>
<?php } ?>
</tbody>
</table>

<!-- 페이지네이션 -->
<div class="pagination02">
<ul class="pagination_modal">

    <!-- 이전 페이지 -->
    <li>
        <?php if ($page > 1) { ?>
            <a href="faq.php?page=<?= $page - 1 ?>&search=<?= $search ?>" class="left arrow">
                <i class="fa-solid fa-angle-left"></i>
            </a>
        <?php } ?>
    </li>

    <!-- 페이지 번호 -->
    <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
        <li>
            <a href="faq.php?page=<?= $i ?>&search=<?= $search ?>" class="num <?= ($i == $page) ? 'active_num' : '' ?>">
                <?= $i ?>
            </a>
        </li>
    <?php } ?>

    <!-- 다음 페이지 -->
    <li>
        <?php if ($page < $total_pages) { ?>
            <a href="faq.php?page=<?= $page + 1 ?>&search=<?= $search ?>" class="right arrow">
                <i class="fa-solid fa-angle-right"></i>
            </a>
        <?php } ?>
    </li>

</ul>
</div>

</div>
</section>
<script src="../script/faq.js"></script>
</main>

<?php include '../common/footer.php'; ?>