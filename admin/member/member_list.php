<?php
include('../admin_header.php');
include('../../db/db_conn.php');
?>

<div class="admin-wrapper d-flex">

  <?php include('../admin_sidebar.php'); ?>

  <main class="admin-content p-4 w-100">

    <h2 class="mb-4">회원 관리</h2>

    <div class="card shadow-sm">
      <div class="card-body">

        <table class="table table-hover align-middle">
          <thead class="table-light">
            <tr>
              <th>No</th>
              <th>아이디</th>
              <th>이름</th>
              <th>닉네임</th>
              <th>전화번호</th>
              <th>이메일</th>
              <th>가입일</th>
            </tr>
          </thead>

          <tbody>

            <?php
            // 회원 정보 전체 조회
            $sql = "SELECT * FROM users ORDER BY user_no DESC";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) :
            ?>
              <tr onclick="location.href='member_view.php?no=<?= $row['user_no'] ?>'"
                  style="cursor:pointer;">

                <td><?= $row['user_no'] ?></td>
                <td><?= htmlspecialchars($row['user_id']) ?></td>
                <td><?= htmlspecialchars($row['user_name']) ?></td>
                <td><?= htmlspecialchars($row['user_nickname']) ?></td>
                <td><?= htmlspecialchars($row['user_phone']) ?></td>
                <td><?= htmlspecialchars($row['user_email']) ?></td>
                <td><?= $row['create_datetime'] ?></td>

              </tr>
            <?php endwhile; ?>

          </tbody>
        </table>

      </div>
    </div>

  </main>
</div>

<?php include('../admin_footer.php'); ?>
