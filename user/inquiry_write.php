<?php
include '../common/header.php';
include '../db/db_conn.php';

// 로그인 체크 (로그인 안 했으면 접속 불가)
if (!isset($_SESSION['mb_no'])) {
  echo "<script>alert('로그인이 필요합니다.'); location.href='../auth/login.php';</script>";
  exit;
}

$user_no = intval($_SESSION['mb_no']);

// 유저 정보 가져오기 (닉네임, 프로필 이미지)
$sql_user = "SELECT user_nickname, user_img FROM users WHERE user_no = $user_no";
$result_user = mysqli_query($conn, $sql_user);
$user = mysqli_fetch_assoc($result_user);

$nickname = !empty($user['user_nickname']) ? $user['user_nickname'] : '회원';
$profile_img = !empty($user['user_img']) 
  ? '../uploads/profile/'.$user['user_img'] 
  : '../images/user_admin/user_default.png';
?>

<main>
  <div class="container-fluid py-5">
    <section class="mx-auto" style="max-width: 900px;">
      <div class="p-0">
        <h2 class="text-center mb-5">문의 작성</h2>

        <div class="card shadow-lg mx-auto" style="max-width: 700px;">
          <div class="card-body p-4 p-md-5">

            <!-- 문의 작성 폼 시작 -->
            <form action="../php/inquiry_write_ok.php" method="post" enctype="multipart/form-data">
              <!-- 숨은 값 : user_no -->
              <input type="hidden" name="user_no" value="<?= $user_no ?>">

              <!-- 유저 정보 + 카테고리 -->
              <div class="d-flex align-items-center mb-4">
                <!-- 프로필 이미지 -->
                <img src="<?= $profile_img ?>" 
                     class="rounded-circle me-3" 
                     width="45" height="45" alt="profile">

                <!-- 닉네임 -->
                <div class="fw-semibold me-3">
                  <?= htmlspecialchars($nickname) ?>
                </div>
              
                <!-- 카테고리 선택 -->
                <select class="form-select w-auto ms-auto" name="inquiry_category" required>
                  <option value="" selected disabled>카테고리 선택</option>
                  <option value="계정/로그인">계정/로그인</option>
                  <option value="게임이용">게임이용</option>
                  <option value="결제/환불">결제/환불</option>
                  <option value="보안/기타">보안/기타</option>
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

              <!-- 첨부파일 (옵션) -->
              <div class="mb-4">
                <label class="form-label fw-semibold">첨부파일 (선택)</label>
                <input type="file" class="form-control" name="inquiry_file">
              </div>
              
              <!-- 버튼 영역 -->
              <div class="text-center">
                <button type="submit" class="btn btn-danger px-4 me-2">등록하기</button>
                <button type="button" class="btn btn-dark px-4" onclick="history.back();">취소하기</button>
              </div>
            </form>
            <!-- 문의 작성 폼 끝 -->

          </div>
        </div>
      </div>
    </section>
  </div>
</main>

<?php
include_once '../common/footer.php';
?>