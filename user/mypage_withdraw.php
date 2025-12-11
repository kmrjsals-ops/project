<?php
include '../common/header.php';

// 🔐 로그인 체크
if (!isset($_SESSION['mb_no'])) {
    echo "<script>alert('로그인이 필요합니다.'); location.href='../php/login.php';</script>";
    exit;
}
?>

<main>
  <section class="py-5">
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-12 col-md-5">

          <!-- 제목 -->
          <h2 class="text-center py-5">회원탈퇴</h2>

          <!-- 탈퇴 폼 -->
          <form action="../php/withdraw_ok.php" method="post" autocomplete="off">

            <!-- 비밀번호 입력 -->
            <div class="mb-4">
              <label for="user_pw" class="form-label fw-semibold">비밀번호 확인</label>
              <input type="password"
                     id="user_pw"
                     name="user_pw"
                     class="form-control p-2"
                     placeholder="비밀번호를 입력해주세요"
                     required
                     minlength="4"
                     autocomplete="off">
            </div>

            <!-- 탈퇴 버튼 -->
            <div class="d-grid">
              <button type="submit" class="btn b_btn_red mt-3">
                탈퇴하기
              </button>
            </div>

            <!-- 취소 버튼 -->
            <div class="text-center pt-3">
              <a href="mypage.php" class="btn b_btn_gray text-decoration-none">
                취소하고 돌아가기
              </a>
            </div>

          </form>

        </div>
      </div>
    </div>
  </section>
</main>

<?php
include '../common/footer.php';
?>
