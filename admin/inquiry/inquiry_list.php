<?php
include('../../db/db_conn.php');
include('../admin_header.php');

// 문의 리스트 가져오기
$sql = "
  SELECT i.*, u.user_id, u.user_name
  FROM support_inquiry i
  JOIN users u ON i.user_no = u.user_no
  ORDER BY i.inquiry_no DESC
";
$result = mysqli_query($conn, $sql);
?>

<div class="admin-wrapper d-flex">

  <?php include('../admin_sidebar.php'); ?>

  <main class="admin-content p-4 w-100">

    <h2 class="mb-4">문의 관리</h2>

    <div class="card shadow-sm">
      <div class="card-baby">

        <table class="table table-hover text-center align-middle">
          <thead class="table-light">
            <tr>
              <th width="8%">No</th>
              <th width="15%">유저ID</th>
              <th>제목</th>
              <th width="18%">작성일</th>
              <th width="12%">상태</th>
              <th width="12%">관리</th>
            </tr>
          </thead>

          <tbody>
            <?php
            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_assoc($result)){
            ?>
              <tr>
                <td><?= $row['inquiry_no']; ?></td>
                <td><?= htmlspecialchars($row['user_id']); ?></td>
                <td class="text-center px-3"><?= htmlspecialchars($row['inquiry_title']); ?></td>
                <td><?= $row['create_datetime']; ?></td>

                <td>
                  <?php if($row['inquiry_status'] === 'done'){ ?>
                    <span class="badge bg-success">답변완료</span>
                  <?php } else { ?>
                    <span class="badge bg-secondary">대기중</span>
                  <?php } ?>
                </td>
                <td>
                  <a href="inquiry_view.php?no=<?= $row['inquiry_no'] ?>" 
                    class="btn btn-sm btn-primary">답변하기</a>

                  <a href="inquiry_delete.php?no=<?= $row['inquiry_no'] ?>"
                    class="btn btn-sm btn-danger"
                    onclick="return confirm('정말 삭제하시겠습니까?');">
                    삭제
                  </a>
                </td>
              </tr>
            <?php
              }
            } else {
            ?>
              <tr>
                <td colspan="6" class="py-4">문의 내역이 없습니다.</td>
              </tr>
            <?php } ?>
          </tbody>

        </table>

      </div>
    </div>

  </main>
</div>

<?php include('../admin_footer.php'); ?>