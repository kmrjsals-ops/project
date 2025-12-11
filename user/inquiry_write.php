<?php
include '../common/header.php';
include '../db/db_conn.php';

// 로그인 체크
if (!isset($_SESSION['mb_no'])) {
    echo "<script>alert('로그인이 필요합니다.'); location.href='../php/login.php';</script>";
    exit;
}

$user_no = intval($_SESSION['mb_no']);

// 유저 정보 조회
$sql_user = "SELECT user_nickname, user_img FROM users WHERE user_no = {$user_no} LIMIT 1";
$result_user = mysqli_query($conn, $sql_user);

if (!$result_user || mysqli_num_rows($result_user) === 0) {
    echo "<script>alert('회원 정보를 불러올 수 없습니다.'); history.back();</script>";
    exit;
}

$user = mysqli_fetch_assoc($result_user);

// 닉네임/프로필 기본값 처리
$nickname = htmlspecialchars($user['user_nickname'] ?: '회원', ENT_QUOTES);
$profile_img = (!empty($user['user_img']) && file_exists("../uploads/profile/{$user['user_img']}"))
    ? "../uploads/profile/" . htmlspecialchars($user['user_img'])
    : "../images/user_admin/user_default.png";

// 카테고리 배열 (유지보수 편함)
$categories = ["계정/로그인", "게임이용", "결제/환불", "보안/기타"];
?>

<main>
  <div class="container-fluid py-5">
    <section class="mx-auto" style="max-width: 900px;">
        <h2 class="text-center mb-5">문의 작성</h2>

        <div class="card shadow-lg mx-auto" style="max-width: 700px;">
            <div class="card-body p-4 p-md-5">

                <!-- 문의 작성 폼 시작 -->
                <form action="../php/inquiry_write_ok.php" method="post" enctype="multipart/form-data" autocomplete="off">

                    <!-- 숨겨진 user_no 값 -->
                    <input type="hidden" name="user_no" value="<?= $user_no ?>">

                    <!-- 유저 정보 + 카테고리 -->
                    <div class="d-flex align-items-center mb-4">

                        <!-- 프로필 이미지 -->
                        <img src="<?= $profile_img ?>"
                             class="rounded-circle me-3"
                             width="45" height="45" alt="프로필 이미지">

                        <!-- 닉네임 -->
                        <div class="fw-semibold me-3">
                            <?= $nickname ?>
                        </div>

                        <!-- 카테고리 선택 -->
                        <select class="form-select w-auto ms-auto" name="inquiry_category" required>
                            <option value="" disabled selected>카테고리 선택</option>

                            <?php foreach ($categories as $cat): ?>
                                <option value="<?= htmlspecialchars($cat, ENT_QUOTES) ?>">
                                    <?= htmlspecialchars($cat) ?>
                                </option>
                            <?php endforeach; ?>

                        </select>
                    </div>

                    <!-- 제목 -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">제목을 입력해주세요</label>
                        <input type="text"
                               class="form-control"
                               name="inquiry_title"
                               placeholder="제목을 입력해주세요"
                               required>
                    </div>

                    <!-- 내용 -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">내용을 입력해주세요</label>
                        <textarea class="form-control"
                                  name="inquiry_content"
                                  rows="10"
                                  placeholder="문의 내용을 자세히 입력해주세요."
                                  required></textarea>
                    </div>

                    <!-- 첨부파일 -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">첨부파일 (선택)</label>
                        <input type="file"
                               class="form-control"
                               name="inquiry_file"
                               accept=".jpg,.jpeg,.png,.gif,.pdf">
                        <small class="text-muted">이미지 또는 PDF 파일만 업로드 가능합니다.</small>
                    </div>

                    <!-- 버튼 -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-danger px-4 me-2">등록하기</button>
                        <button type="button" class="btn btn-dark px-4" onclick="history.back();">취소하기</button>
                    </div>

                </form>
                <!-- 문의 작성 폼 끝 -->

            </div>
        </div>

    </section>
  </div>
</main>

<?php include '../common/footer.php'; ?>
