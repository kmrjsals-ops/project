<?php
include '../common/header.php';

// reset_user_no 없으면 접근 차단
if (!isset($_SESSION['reset_user_no'])) {
    echo "<script>alert('잘못된 접근입니다.'); location.href='find_pw.php';</script>";
    exit;
}
?>

<main>
  <section class="py-5">
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-12 col-md-5">

          <h2 class="text-center py-5">새 비밀번호를 입력해주세요</h2>

          <!-- 비밀번호 변경 폼 -->
          <form action="../php/reset_pw_ok.php" method="post">

            <!-- 새 비밀번호 -->
            <div class="mb-4">
              <label class="form" for="log_pw">새 비밀번호</label>
              <input 
                type="password"
                id="log_pw"
                name="new_pw"
                class="form-control p-2"
                placeholder="10~20자 영문/숫자/특수문자 조합"
                required
              >
            </div>

            <!-- 새 비밀번호 확인 -->
            <div class="mb-4">
              <label class="form" for="log_new_pw">새 비밀번호 확인</label>
              <input 
                type="password"
                id="log_new_pw"
                name="new_pw_check"
                class="form-control p-2"
                placeholder="새 비밀번호를 다시 입력해주세요"
                required
              >
            </div>

            <!-- 버튼 -->
            <div class="d-grid">
              <button type="submit" class="btn b_btn_red mt-3">비밀번호 변경</button>
            </div>

          </form>

        </div>
      </div>
    </div>
  </section>
</main>

<?php include '../common/footer.php'; ?>
