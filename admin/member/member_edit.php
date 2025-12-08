<?
include('../../db/db_conn.php');
include('../admin_header.php');

//get 받은 유저 번호 
$user_no = $_GET['no'];

//해당 회원정보 가져오기 
$sql = "SELECT user_id, user_role FROM users WHERE user_no = '$user_no'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<div class="admin-wrapper d-flex">
  <? include('../admin_sidebar.php')?>

  <main class="admin-content p4 w-100">
    <h2 class="mb-4">회원 권한 수정</h2>

    <div class="card shadow-sm p-4">
      <form action="member_edit_ok.php" method="post">

        <input type="hidden" name="user_no" value="<?= $user_no?>">

        <div class="mb-3">
          <label>아이디</label>
          <input type="text" class="form-control" value="<?= $row['user_id']?>" disabled>
        </div>

        <div class="mb-3">
          <label>회원 권한</label> <!-- 마이페이지에서 등급에 쓸 예정 -->
          <select name="user_role" class="form-select">
            <option value="user" <?= ($row['user_role']=="user"?"selected":"")?>>일반회원</option>
            <option value="admin" <?= ($row['user_role']=="user"?"selected":"")?>>관리자</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary">권한 변경</button>
        <a href="member_view.php?no=<?= $user_no ?>" class="btn btn-secondary">취소</a>

      </form>

    </div>
  </main>
</div>

<? include('../admin_footer.php');?>