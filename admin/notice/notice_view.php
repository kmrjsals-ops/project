<?php
include('../../db/db_conn.php');
include('../admin_header.php');

$notice_no = intval($_GET['no']);

// notice 작성자 정보 가져오기
$sql = "
  SELECT n.*, u.user_name 
  FROM notice n
  JOIN users u ON n.admin_no = u.user_no
  WHERE n.notice_no = $notice_no
";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<div class="admin-wrapper d-flex">

  <?php include('../admin_sidebar.php'); ?>

  <main class="admin-content p-4 w-100">
    <h2 class="mb-4">공지사항 상세보기</h2>

    <div class="card p-4 shadow-sm">

      <table class="table table-bordered">
        <tr>
          <th style="width:150px;">제목</th>
          <td><?= htmlspecialchars($row['notice_title']) ?></td>
        </tr>

        <tr>
          <th>작성자</th>
          <td><?= htmlspecialchars($row['user_name']) ?> (관리자)</td>
        </tr>

        <tr>
          <th>내용</th>
          <td style="white-space: pre-line;">
            <?= htmlspecialchars($row['notice_content']) ?>
          </td>
        </tr>

        <?php if (!empty($row['notice_img'])) : ?>
          <tr>
            <th>첨부 이미지</th>
            <td>
              <img src="/webzen/uploads/notice/<?= htmlspecialchars($row['notice_img']) ?>"
                   alt="공지 이미지"
                   style="max-width: 400px; border:1px solid #ddd;">
            </td>
          </tr>
        <?php endif; ?>
      </table>

      <div class="mt-4 d-flex gap-2">
        <a href="notice_edit.php?no=<?= $row['notice_no'] ?>" class="btn btn-primary">
          공지 수정
        </a>
        <!-- 삭제 confirm 오타 수정 -->
        <a href="notice_delete.php?no=<?= $row['notice_no'] ?>"
           class="btn btn-danger"
           onclick="return confirm('정말 삭제하시겠습니까?');">
          공지 삭제
        </a>
        <a href="notice_list.php" class="btn btn-secondary">목록으로</a>
      </div>

    </div>
  </main>
</div>

<?php include('../admin_footer.php'); ?>
