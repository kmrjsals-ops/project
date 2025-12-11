<?php
include('../../db/db_conn.php');
include('../admin_header.php');

// member_list에서 전달된 회원번호 받기
$user_no = intval($_GET['no']);

// DB에서 회원 정보 조회
$sql = "SELECT * FROM users WHERE user_no = $user_no";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// 회원 정보가 없으면
if (!$row) {
  echo "<script>alert('해당 회원 정보를 찾을 수 없습니다.'); history.back();</script>";
  exit;
}
?>

<div class="admin-wrapper d-flex">

  <?php include('../admin_sidebar.php'); ?>

  <main class="admin-content p-4 w-100">

    <h2 class="mb-4">회원 상세 정보</h2>

    <div class="card shadow-sm p-4">

      <div class="row">

        <!-- 프로필 이미지 -->
        <div class="col-md-3 text-center">
          <?php if (!empty($row['user_img'])) : ?>
            <img src="/webzen/uploads/profile/<?= htmlspecialchars($row['user_img']) ?>"
                 alt="회원 프로필 이미지"
                 class="img-fluid rounded-circle mb-3"
                 style="max-width:150px;">
          <?php else : ?>
            <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center"
                 style="width:150px; height:150px;">
              No Image
            </div>
          <?php endif; ?>
        </div>

        <!-- 회원 정보 테이블 -->
        <div class="col-md-9">
          <table class="table table-bordered">

            <tr>
              <th style="width:150px;">회원번호</th>
              <td><?= $row['user_no'] ?></td>
            </tr>

            <tr>
              <th>아이디</th>
              <td><?= htmlspecialchars($row['user_id']) ?></td>
            </tr>

            <tr>
              <th>이름</th>
              <td><?= htmlspecialchars($row['user_name']) ?></td>
            </tr>

            <tr>
              <th>닉네임</th>
              <td><?= htmlspecialchars($row['user_nickname']) ?></td>
            </tr>

            <tr>
              <th>전화번호</th>
              <td><?= htmlspecialchars($row['user_phone']) ?></td>
            </tr>

            <tr>
              <th>이메일</th>
              <td><?= htmlspecialchars($row['user_email']) ?></td>
            </tr>

            <tr>
              <th>가입일</th>
              <td><?= $row['create_datetime'] ?></td>
            </tr>

            <tr>
              <th>회원권한</th>
              <td>
                <?= $row['user_role'] === 'admin' ? '관리자' : '일반회원' ?>
              </td>
            </tr>

          </table>
        </div>
      </div>

      <!-- 버튼 영역 -->
      <div class="mt-4 d-flex gap-2">
        <a href="member_edit.php?no=<?= $row['user_no'] ?>" class="btn btn-primary">회원권한 수정</a>
        <a href="member_delete.php?no=<?= $row['user_no'] ?>"
           class="btn btn-danger"
           onclick="return confirm('정말 삭제하시겠습니까?');">
           회원 삭제
        </a>
        <a href="member_list.php" class="btn btn-secondary">목록으로 돌아가기</a>
      </div>

    </div>
  </main>
</div>

<?php include('../admin_footer.php'); ?>
