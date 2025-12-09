<?php
include '../common/header.php';
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<main>
  <section class="py-5">
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-12 col-md-5">
          <h2 class="text-center py-5">아이디 찾기</h2>

            <div class="text-center" style="font-size: 18px;">
              <p>회원님의 아이디는  &nbsp;&nbsp; 
                <span style="text-decoration:underline; font-weight: bold; font-size: 22px; color: #ED1C24;">
                  oldman
                </span> &nbsp;&nbsp; 입니다
              </p>
            </div>

          <!-- 버튼 -->
          <div class="d-flex gap-3 justify-content-center pt-4">
            <button type="button" class="btn btn_red  mt-3">로그인하러 가기</button>
            <button type="button" class="btn btn_gray  mt-3">비밀번호 찾기</button>
          </div>

          </div>
      </div>
    </div>
  </section>
</main>

<?php
include_once '../common/footer.php';
?>