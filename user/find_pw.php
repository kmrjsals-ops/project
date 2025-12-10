<?php
include '../common/header.php';
?>



<main>
  <section class="py-5">
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-12 col-md-5">
          <h2 class="text-center py-5">비밀번호 찾기</h2>
          <!-- 폼시작 -->
          <form action="../php/find_pw_check.php" method="post">

          <!-- 아이디 입력 -->
            <div class="mb-2">
              <label class="form" for="log_id">아이디</label>
              <input type="text" id="log_id" name="user_id" class="form-control p-2"
              placeholder="아이디를 입력해주세요" />
            </div>
            
            <!-- 2. 전화번호 입력 -->
            <div class="mb-4">
              <label class="form" for="log_pnum">전화번호</label>
              <input type="text" id="log_pnum" name="user_phone" class="form-control p-2"
              placeholder="‘-’ 없이 번호만 입력해주세요" />
            </div>
            
            <div class="d-grid">
              <button type="submit" class="btn b_btn_red  mt-3">비밀번호 찾기</button>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
include_once '../common/footer.php';
?>