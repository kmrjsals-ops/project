<?php
include '../common/header.php';
?>
<link rel="stylesheet" type="text/css" href="../css/game.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<main>
  <section class="py-5">
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-12 col-md-5">
          <h2 class="text-center py-5">비밀번호 찾기</h2>
          <!-- 1. 새 비밀번호 입력 -->
          <div class="mb-4">
            <label class="form" for="log_pw">새 비밀번호</label>
            <input type="password" id="log_pw" class="form-control p-2"
              placeholder="10~20자 이내 영문/숫자/특수문자 2가지 이상의 글자 조합" />
          </div>

          <!-- 2. 새 비밀번호 확인 -->
          <div class="mb-4">
            <label class="form" for="log_new_pw">새 비밀번호</label>
            <input type="password" id="log_new_pw" class="form-control p-2"
              placeholder="새 비밀번호 확인" />
          </div>

          <div class="d-grid">
            <button type="button" class="btn btn_red  mt-3">로그인하러 가기</button>
          </div>

        </div>
      </div>
    </div>
  </section>
</main>

<?php
include_once '../common/footer.php';
?>