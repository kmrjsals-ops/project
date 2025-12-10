<?
  include '../common/header.php';

  // 로그인 안한 상태면 막기 
  if(!isset($_SESSION['mb_no'])){
    echo"<script>alert('로그인이 필요합니다.'); location.href='../php/login.php';</script>";
    exit;
  }
?>

<main>
  <section class="py-5">
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-12 col-md-5">
          <h2 class="text-center py-5">회원탈퇴</h2>

          <form action="../php/withdraw_ok.php" method="post">
            <div class="mb-4">
              <label for="user_pw" class="form">비밀번호 확인</label>
              <input type="password" id="user_pw" name="user_pw" class="form-control p-2" placeholder="비밀번호를 입력해주세요" required>
            </div>

            <div class="d-grid">
              <button type="submit" class="btn b_btn_red mt-3">탈퇴하기</button>
            </div>

            <div class="text-center pt-3">
              <a href="mypage.php" class="text-decoration-none btn b_btn_gray">취소하고 돌아가기</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>

<?
  include '../common/footer.php';
?>