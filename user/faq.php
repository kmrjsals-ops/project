<?php
include '../common/header.php';
include '../db/db_conn.php';

/* ============================
   🔍 검색어 처리
============================ */
$search = isset($_GET['search']) ? trim($_GET['search']) : "";

/* ============================
   📌 페이지네이션 설정
============================ */
$page   = max(1, intval($_GET['page'] ?? 1));
$limit  = 10;
$offset = ($page - 1) * $limit;

/* ============================
   🔒 SQL WHERE 처리 (보안 포함)
============================ */
$where = "";
if ($search !== "") {
    $safe = mysqli_real_escape_string($conn, $search);
    $where = "WHERE faq_question LIKE '%$safe%' 
              OR faq_answer LIKE '%$safe%'
              OR faq_category LIKE '%$safe%'";
}

/* ============================
   📌 총 데이터 개수 조회
============================ */
$sql_count = "SELECT COUNT(*) AS total FROM support_faq $where";
$total     = mysqli_fetch_assoc(mysqli_query($conn, $sql_count))['total'];
$total_pages = max(1, ceil($total / $limit));

/* ============================
   📌 FAQ 목록 가져오기
============================ */
$sql = "
    SELECT faq_no, faq_question, faq_answer
    FROM support_faq
    $where
    ORDER BY faq_no DESC
    LIMIT $limit OFFSET $offset
";
$result = mysqli_query($conn, $sql);
?>



<main class="faq_main">
<section class="faq_section">
<div>

<h2 class="text_center">자주 묻는 질문</h2>

<!-- ============================
     🔍 검색 영역
============================ -->
<div class="faq_top_wrap">
    <div class="search_wrap02">
        <form action="faq.php" method="get" class="search_form">

            <button type="button" class="btn_gray inquiries_btn"
                    onclick="location.href='inquiry_write.php'">
                문의하기
            </button>

            <div class="search_wrap01">
                <div class="search_group">
                    <input type="text" 
                           name="search" 
                           class="search_input" 
                           placeholder="검색어를 입력해주세요."
                           value="<?= htmlspecialchars($search) ?>">
                    <i class="fa-solid fa-magnifying-glass search-icon"></i>
                </div>

                <button type="submit" class="btn_red search_btn">검색</button>
            </div>

        </form>
    </div>
</div>

<!-- ============================
     📋 FAQ 목록 테이블
============================ -->
<table class="table_wrap02">
<thead>
    <tr>
        <th class="text_center">No.</th>
        <th class="text_center">질문/답변</th>
        <th></th>
    </tr>
</thead>

<tbody>
<?php if ($total > 0) { ?>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <!-- 질문 -->
        <tr class="question">
            <td class="text_center"><?= $row['faq_no'] ?></td>
            <td class="text_start">Q. <?= htmlspecialchars($row['faq_question']) ?></td>
            <td class="text_center"><i class="fa-solid fa-sort-down"></i></td>
        </tr>

        <!-- 답변 -->
        <tr class="answer text_start">
            <td colspan="3">A. <?= nl2br(htmlspecialchars($row['faq_answer'])) ?></td>
        </tr>
    <?php } ?>

<?php } else { ?>
    <tr>
        <td colspan="3" class="text_center">검색 결과가 없습니다.</td>
    </tr>
<?php } ?>
</tbody>
</table>

<!-- ============================
     📌 페이지네이션
============================ -->
<div class="pagination02">
<ul class="pagination_modal">

    <!-- 이전 페이지 -->
    <?php if ($page > 1): ?>
        <li>
            <a href="faq.php?page=<?= $page - 1 ?>&search=<?= urlencode($search) ?>"
               class="left arrow">
                <i class="fa-solid fa-angle-left"></i>
            </a>
        </li>
    <?php endif; ?>

    <!-- 페이지 번호 -->
    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
        <li>
            <a href="faq.php?page=<?= $i ?>&search=<?= urlencode($search) ?>"
               class="num <?= ($i == $page ? 'active_num' : '') ?>">
               <?= $i ?>
            </a>
        </li>
    <?php endfor; ?>

    <!-- 다음 페이지 -->
    <?php if ($page < $total_pages): ?>
        <li>
            <a href="faq.php?page=<?= $page + 1 ?>&search=<?= urlencode($search) ?>"
               class="right arrow">
                <i class="fa-solid fa-angle-right"></i>
            </a>
        </li>
    <?php endif; ?>

</ul>
</div>

</div>
</section>

<script src="../script/faq.js"></script>
</main>

<?php include '../common/footer.php'; ?>
