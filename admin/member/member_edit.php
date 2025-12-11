<?php
include('../../db/db_conn.php');
include('../admin_header.php');

// GET 받은 유저 번호 (보안 처리)
$user_no = intval($_GET['no']);

// 해당 회원 정보 가져오기
$sql = "SELECT user_id, user_role FROM users WHERE user_no = $user_no";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// 회원 정보 없음 처리
if (!$row) {
  echo "<script>alert('해당 회원 정보를 찾을 수 없습니다.'); history.back();</script>";
  exit;
}
?>

<div class="admin-wrapper d-flex">

  <?php include('../admin_sidebar.php'); ?>

  <main class="admin-content p-4 w-100">
    <h2 class="mb-4">회원 권한 수정</h2>

    <div class="card shadow-sm p-4">
      <form action="member_edit_ok.php" method="post">

        <!-- user_no 전달 -->
        <input type="hidden" name="user_no" value="<?= $user_no ?>">

        <!-- 아이디 -->
        <div class="mb-3">
          <label>아이디</label>
          <input type="text" class="form-control"
                 value="<?= htmlspecialchars($row['user_id']) ?>" disabled>
        </div>

        <!-- 회원 권한 -->
        <div class="mb-3">
          <label>회원 권한</label>
          <select name="user_role" class="form-select">
            <option value="user"  <?= ($row['user_role'] == "user"  ? "selected" : "") ?>>일반회원</option>
            <option value="admin" <?= ($row['user_role'] == "admin" ? "selected" : "") ?>>관리자</option>
          </select>
        </div>

        <!-- 버튼 -->
        <button type="submit" class="btn btn-primary">권한 변경</button>
        <a href="member_view.php?no=<?= $user_no ?>" class="btn btn-secondary">취소</a>

      </form>
    </div>

  </main>
</div>

<?php include('../admin_footer.php'); ?>
