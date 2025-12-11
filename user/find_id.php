<?php
include_once '../common/header.php';
?>

<main>
  <section class="py-5">
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-12 col-md-5">

          <!-- 제목 -->
          <h2 class="text-center py-5">아이디 찾기</h2>

          <!-- 아이디 찾기 폼 -->
          <form action="find_id_result.php" method="post" autocomplete="off">

            <!-- 1. 이름 입력 -->
            <div class="mb-3">
              <label for="user_name" class="form-label fw-semibold">이름</label>
              <input 
                type="text" 
                name="user_name" 
                id="user_name"
                class="form-control p-2" 
                placeholder="이름을 입력해주세요"
                required>
            </div>

            <!-- 2. 전화번호 입력 -->
            <div class="mb-4">
              <label for="user_phone" class="form-label fw-semibold">전화번호</label>
              <input 
                type="text" 
                name="user_phone" 
                id="user_phone"
                class="form-control p-2" 
                placeholder="'-' 없이 번호만 입력해주세요"
                required
                pattern="[0-9]{10,11}"
                title="휴대폰 번호를 숫자만 입력해주세요 (10~11자리)">
            </div>

            <!-- 버튼 -->
            <div class="d-grid">
              <button type="submit" class="btn b_btn_red mt-3">
                아이디 찾기
              </button>
            </div>

          </form>
          <!-- 폼 끝 -->

        </div>
      </div>
    </div>
  </section>
</main>

<?php
include_once '../common/footer.php';
?>
