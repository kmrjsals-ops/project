<?php
include '../common/header.php';
?>



<main>
  <section class="py-5">
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-12 col-md-5">
          <h2 class="text-center py-5">아이디 찾기</h2>

          <!-- 아이디 찾기 폼 시작 -->
          <form action="find_id_result.php" method="post">
            <!-- 1. 이름 입력 -->
            <div class="mb-2">
              <label for="log_name" class="form">이름</label>
              <input type="text" name="user_name" class="form-control p-2" id="log_name" placeholder="이름을 입력해주세요" required>
            </div>

            <!-- 2. 전화번호 입력 -->
            <div class="mb-4">
              <label for="log_pnum" class="form">전화번호</label>
              <input type="text" class="form-control p-2" id="log_pnum" name="user_phone" placeholder="'-' 없이 번호만 입력해주세요" required>
            </div>

            <div class="d-grid">
              <button class="btn b_btn_red mt-3">아이디 찾기</button>
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