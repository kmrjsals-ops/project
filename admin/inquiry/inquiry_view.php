<?php
include('../../db/db_conn.php');
include('../admin_header.php');

$inquiry_no = intval($_GET['no']);

// 문의 정보 가져오기
$sql = "
    SELECT i.*, u.user_id, u.user_name
    FROM support_inquiry i
    JOIN users u ON i.user_no = u.user_no
    WHERE i.inquiry_no = $inquiry_no
";
$result = mysqli_query($conn, $sql);
$inq = mysqli_fetch_assoc($result);

if (!$inq) {
    echo "<script>alert('해당 문의를 찾을 수 없습니다.'); history.back();</script>";
    exit;
}
?>

<div class="admin-wrapper d-flex">

    <?php include('../admin_sidebar.php'); ?>

    <main class="admin-content p-4 w-100">

        <h2 class="mb-4">문의 상세보기</h2>

        <div class="card shadow-sm">
            <div class="card-body p-4">

                <!-- 사용자 정보 -->
                <div class="mb-3">
                    <strong>유저 ID:</strong> <?= htmlspecialchars($inq['user_id']) ?><br>
                    <strong>카테고리:</strong> <?= htmlspecialchars($inq['inquiry_category']) ?><br>
                    <strong>작성일:</strong> <?= $inq['create_datetime'] ?>
                </div>

                <!-- 제목 -->
                <div class="mb-4">
                    <h4><?= htmlspecialchars($inq['inquiry_title']) ?></h4>
                </div>

                <!-- 내용 -->
                <div class="mb-4 p-3 bg-light rounded">
                    <?= nl2br(htmlspecialchars($inq['inquiry_content'])) ?>
                </div>

                <!-- 첨부파일 -->
                <?php if (!empty($inq['inquiry_file'])) : ?>
                <div class="mb-4">
                    <strong>첨부파일:</strong><br>
                    <a href="/webzen/uploads/inquiry/<?= htmlspecialchars($inq['inquiry_file']) ?>"
                       download
                       class="btn btn-sm btn-secondary mt-2">
                        다운로드
                    </a>
                </div>
                <?php endif; ?>

                <!-- 답변 입력 폼 -->
                <form action="inquiry_answer_ok.php" method="post">

                    <input type="hidden" name="inquiry_no" value="<?= $inq['inquiry_no'] ?>">

                    <div class="mb-3">
                        <label class="fw-bold">답변 작성</label>
                        <textarea class="form-control" name="inquiry_reply" rows="6" required><?= htmlspecialchars($inq['inquiry_reply'] ?? '') ?></textarea>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">답변 등록</button>
                        <button type="button" class="btn btn-secondary" onclick="history.back()">뒤로가기</button>
                    </div>

                </form>

            </div>
        </div>

    </main>
</div>

<?php include('../admin_footer.php'); ?>
