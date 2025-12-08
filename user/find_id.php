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
          <h2 class="text-center py-5">아이디 찾기</h2>
          <!-- 1. 이름 입력 -->
          <div class="mb-2">
            <label class="form" for="log_name">이름</label>
            <input type="text" id="log_name" class="form-control p-2"
              placeholder="이름을 입력해주세요" />
          </div>

          <!-- 2. 전화번호 입력 -->
          <div class="mb-4">
            <label class="form" for="log_pnum">전화번호</label>
            <input type="text" id="log_pnum" class="form-control p-2"
              placeholder="‘-’ 없이 번호만 입력해주세요" />
          </div>

          <div class="d-grid">
            <button type="button" class="btn btn_red  mt-3">아이디 찾기</button>
          </div>

        </div>
      </div>
    </div>
  </section>
</main>

<?php
include_once '../common/footer.php';
?>