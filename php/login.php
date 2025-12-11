<?php 
include('../db/db_conn.php');
include('../common/header.php');
?>

<main>
  <section class="py-5">
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-12 col-md-5">

          <h2 class="text-center py-3">로그인</h2>

          <form name="login_form" method="post" action="login_check.php">

            <!-- 아이디 입력 -->
            <div class="mb-2">
              <label for="log_id" class="form">아이디</label>
              <input 
                type="text" 
                id="log_id" 
                name="user_id" 
                class="form-control p-2" 
                placeholder="아이디를 입력해주세요" 
                required
              >
            </div>

            <!-- 비밀번호 입력 -->
            <div class="mb-4">
              <label for="log_pw" class="form">비밀번호</label>
              <input 
                type="password" 
                id="log_pw" 
                name="user_pw"
                class="form-control p-2"
                placeholder="비밀번호를 입력해주세요"
                required
              >
            </div>

            <!-- 로그인유지 & 계정찾기 -->
            <div class="d-flex justify-content-between mb-4">
              <div class="form-check">
                <input 
                  type="checkbox" 
                  class="form-check-input" 
                  id="ch_login"
                >
                <label for="ch_login" class="form-check-label">로그인 유지</label>
              </div>

              <div class="find_account">
                <a href="../user/find_id.php" class="text-white">아이디 찾기</a>
                <span class="mx-2 text-white">|</span>
                <a href="../user/find_pw.php" class="text-white">비밀번호 찾기</a>
              </div>
            </div>

            <!-- 로그인 / 회원가입 -->
            <div class="d-grid gap-3">
              <button type="submit" class="btn b_btn_red p-2">로그인</button>

              <a href="register.php" class="btn b_btn_gray p-2 text-center">
                회원가입
              </a>
            </div>

            <!-- 다른 방법 로그인 -->
            <div class="hr-sect">다른 방법으로 로그인</div>

            <div class="d-grid gap-3 log_btn_etc">
              <button class="btn p-2" type="button">
                <i class="fa-solid fa-n"></i> 네이버 로그인
              </button>

              <button class="btn p-2" type="button">
                <i class="fab fa-facebook-f"></i> 페이스북 로그인
              </button>

              <button class="btn p-2" type="button">
                <i class="fa-brands fa-google"></i> 구글 로그인
              </button>
            </div>

          </form>

        </div>
      </div>
    </div>
  </section>
</main>

<?php include('../common/footer.php'); ?>
