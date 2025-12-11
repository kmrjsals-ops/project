<?php
include('../db/db_conn.php');
include('../common/header.php');

// 로그인 상태 체크
$isLogin = isset($_SESSION['mb_no']);

if ($isLogin) {
    $user_no = intval($_SESSION['mb_no']);
    $sql = "SELECT * FROM users WHERE user_no = $user_no";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
}
?>

<main>
  <section>
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-12 col-md-5">

          <h2 class="text-center py-3">
            <?= $isLogin ? "회원정보 수정" : "회원가입"; ?>
          </h2>

          <form method="post"
                action="<?= $isLogin ? 'edit_ok.php' : 'register_ok.php'; ?>"
                enctype="multipart/form-data">

            <!-- 프로필 이미지 -->
            <label for="img_upload" class="img_upload text-center d-block mb-4">

              <?php if ($isLogin && !empty($user['user_img'])): ?>
                <img src="../uploads/profile/<?= htmlspecialchars($user['user_img']) ?>"
                     alt="프로필 이미지">
              <?php else: ?>
                <img src="../uploads/profile/default.png"
                     alt="기본 프로필 이미지">
              <?php endif; ?>

              <input type="file" name="user_img" accept="image/*" id="img_upload">
            </label>


            <!-- 공통 항목 -->
            <div>

              <!-- 이름 -->
              <div class="mb-2">
                <label class="form" for="reg_name">이름</label>
                <input type="text"
                       id="reg_name"
                       name="user_name"
                       class="form-control p-2"
                       placeholder="이름을 입력해주세요"
                       value="<?= $isLogin ? htmlspecialchars($user['user_name']) : '' ?>"
                       required>
              </div>

              <!-- 전화번호 -->
              <div class="mb-4">
                <label class="form" for="reg_pnum">전화번호</label>
                <input type="text"
                       id="reg_pnum"
                       name="user_phone"
                       class="form-control p-2"
                       placeholder="‘-’ 없이 번호만 입력해주세요"
                       value="<?= $isLogin ? htmlspecialchars($user['user_phone']) : '' ?>"
                       required>
              </div>

              <!-- 닉네임 -->
              <div class="mb-2">
                <label class="form" for="reg_aka">닉네임</label>
                <input type="text"
                       id="reg_aka"
                       name="user_nickname"
                       class="form-control p-2"
                       placeholder="10자 이내 한글/숫자, 20자 이내 영문/숫자"
                       value="<?= $isLogin ? htmlspecialchars($user['user_nickname']) : '' ?>"
                       required>
              </div>

              <!-- 아이디 -->
              <div class="mb-2">
                <label class="form" for="reg_id">아이디</label>
                <input type="text"
                       id="reg_id"
                       name="user_id"
                       class="form-control p-2"
                       placeholder="4~16자 영문/숫자 조합"
                       value="<?= $isLogin ? htmlspecialchars($user['user_id']) : '' ?>"
                       <?= $isLogin ? "readonly" : "required" ?>>
              </div>

              <!-- 이메일 -->
              <div class="mb-4">
                <label class="form" for="reg_email">이메일</label>
                <input type="email"
                       id="reg_email"
                       name="user_email"
                       class="form-control p-2"
                       placeholder="이메일 주소 입력"
                       value="<?= $isLogin ? htmlspecialchars($user['user_email']) : '' ?>">
              </div>

            </div>


            <!-- ≡ 신규 회원가입 영역 -->
            <?php if (!$isLogin): ?>
              <div>

                <!-- 비밀번호 -->
                <div class="mb-2">
                  <label class="form" for="reg_pw">비밀번호</label>
                  <input type="password"
                         id="reg_pw"
                         name="user_pw"
                         class="form-control p-2"
                         placeholder="10~20자 영문/숫자/특수문자"
                         required>
                </div>

                <!-- 비밀번호 확인 -->
                <div class="mb-4">
                  <label class="form" for="reg_pw_ch">비밀번호 확인</label>
                  <input type="password"
                         id="reg_pw_ch"
                         name="pw_check"
                         class="form-control p-2"
                         placeholder="비밀번호 확인"
                         required>
                </div>

                <div class="d-flex gap-3 justify-content-center pt-4">
                  <input type="submit"
                         class="btn b_btn_red flex-fill"
                         value="회원가입">
                  <a href="../index.php"
                     class="btn b_btn_gray flex-fill text-center">취소하기</a>
                </div>

              </div>
            <?php endif; ?>


            <!-- ≡ 기존 회원 정보 수정 영역 -->
            <?php if ($isLogin): ?>
              <div>

                <!-- 기존 비밀번호 -->
                <div class="mb-2">
                  <label class="form" for="old_pw">기존 비밀번호</label>
                  <input type="password"
                         id="old_pw"
                         name="old_pw"
                         class="form-control p-2"
                         placeholder="기존 비밀번호 입력">
                </div>

                <!-- 새 비밀번호 -->
                <div class="mb-2">
                  <label class="form" for="new_pw">새 비밀번호</label>
                  <input type="password"
                         id="new_pw"
                         name="user_pw"
                         class="form-control p-2"
                         placeholder="변경시 입력">
                </div>

                <!-- 새 비밀번호 확인 -->
                <div class="mb-4">
                  <label class="form" for="new_pw_ch">새 비밀번호 확인</label>
                  <input type="password"
                         id="new_pw_ch"
                         name="pw_check"
                         class="form-control p-2"
                         placeholder="새 비밀번호 확인">
                </div>

                <input type="hidden" name="user_no"
                       value="<?= $user['user_no'] ?>">

                <div class="d-flex gap-3 justify-content-center pt-4">
                  <input type="submit"
                         class="btn b_btn_red flex-fill"
                         value="정보수정">
                  <a href="../user/mypage.php"
                     class="btn b_btn_gray flex-fill text-center">취소하기</a>
                </div>

              </div>
            <?php endif; ?>

          </form>

        </div>
      </div>
    </div>
  </section>
</main>

<?php include('../common/footer.php'); ?>
