<?php
include('../../db/db_conn.php');
include('../admin_header.php');

// 공지 목록 가져오기
$sql = "
    SELECT n.notice_no, n.notice_title, u.user_name, n.create_datetime
    FROM notice n
    JOIN users u ON n.admin_no = u.user_no
    ORDER BY n.notice_no DESC
";
$result = mysqli_query($conn, $sql);
?>

<div class="admin-wrapper d-flex">

  <!-- 관리자 사이드바 -->
  <?php include('../admin_sidebar.php'); ?>

  <!-- 메인 콘텐츠 -->
  <main class="admin-content p-4 w-100">

    <h2 class="mb-4">공지사항 관리</h2>

    <div class="text-end mb-3">
      <a href="notice_write.php" class="btn btn-primary">공지 작성</a>
    </div>

    <div class="card shadow-sm">
      <div class="card-body">

        <table class="table table-hover text-center align-middle">
          <thead class="table-light">
            <tr>
              <th width="10%">번호</th>
              <th>제목</th>
              <th width="15%">작성자</th>
              <th width="20%">작성일</th>
            </tr>
          </thead>

          <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
              <tr style="cursor:pointer"
                  onclick="location.href='notice_view.php?no=<?= $row['notice_no'] ?>'">

                <td><?= $row['notice_no'] ?></td>

                <!-- htmlspecialchars 추가 (XSS 방지) -->
                <td class="text-start px-3"><?= htmlspecialchars($row['notice_title']) ?></td>

                <td><?= htmlspecialchars($row['user_name']) ?></td>

                <!-- 날짜 포맷 변경 없이 그대로 출력 (DB 입력 그대로 사용) -->
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
