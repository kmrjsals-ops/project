<?php
include '../common/header.php';
include '../db/db_conn.php';

// Post로 전달된 값 받기 
  $user_name = trim($_POST['user_name']??'');
  $user_phone = trim($_POST['user_phone']??'');

  if($user_name ==='' || $user_phone === ''){
    echo "<script>alert('이름과 전화번호를 입력해주세요.'); history.back();</script>";
    exit;
  }

  //sql 인젝션 방지 
  $user_name = mysqli_real_escape_string($conn, $user_name);
  $user_phone = mysqli_real_escape_string($conn, $user_phone);

  // db 조회 쿼리문 작성 
  $sql = "SELECT user_id FROM users WHERE user_name = '{$user_name}' AND user_phone = '{$user_phone}' LIMIT 1";

  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  // 아이디 마스킹 함수 설계 
  function mask_id($id){
    $len = mb_strlen($id, 'UTF-8');
    if($len <= 3)return mb_substr($id, 0, 1) . str_repeat('*', $len - 1);

    $start = mb_substr($id, 0, 3);
    $end = mb_substr($id,-1);
    return $start . str_repeat('*', $len - 4). $end;
  }

  $masked_id = $row ? mask_id($row['user_id']) : null; 

?>



<main>
  <section class="py-5">
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-12 col-md-5">
          <h2 class="text-center py-5">아이디 찾기</h2>

          <? if ($masked_id):?>
            <div class="text-center" style="font-size: 18px;">
              <p>
                회원님의 아이디는 &nbsp;&nbsp;
                <span style="text-decoration:underline; font-weight: bold; font-size: 22px; color: #ed1c24;">
                  <?= $masked_id?>
                </span>
                &nbsp;&nbsp; 입니다, 
              </p>
            </div>
            <? else :?>
              <div class="text-center" style="font-size:18px; color:#777;">
                <p>일치하는 회원 정보를 찾을 수 없습니다.</p>
              </div>
              <? endif ?>

          <!-- 버튼 -->
          <div class="d-flex gap-3 justify-content-center pt-4">
            <button type="button" class="btn b_btn_red  mt-3" onclick="location.href='../php/login.php'">로그인하러 가기</button>
            <button type="button" class="btn b_btn_gray  mt-3" onclick="location.href='find_pw.php'">비밀번호 찾기</button>
          </div>

          </div>
      </div>
    </div>
  </section>
</main>

<?php
include '../common/footer.php';
?>