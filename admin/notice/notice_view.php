<?
include('../../db/db_conn.php');
include('../admin_header.php');

$notice_no = intval($_GET['no']);

// notice 의 전부 user의 user_name  notice n 에서 , users u 에 admin_no 를 fk로 가져온다 어디서? 전달받은 notice 번호로 일치하는 notice 테이블 번호를~ 
$sql= "SELECT n.*, u.user_name FROM notice n  JOIN users u ON n.admin_no = u.user_no WHERE n.notice_no = $notice_no";
$result =  mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
?>

<div class="admin-wrapper d-flex">
  <? include('../admin_sidebar.php');?>

  <main class="admin-content p-4 w-100">
    <h2 class="mb-4">공지사항 상세보기</h2>

    <div class="card p-4 shadow-sm">
      <table class="table table-bordered">
        <tr>
          <th style="width:150px;">제목</th>
          <td><?=$row['notice_title']?></td>
        </tr>
        <tr>
          <th>작성자</th>
          <td><?= $row['user_name']?>(관리자)</td>
        </tr>
        <tr>
          <th>내용</th>
          <td style="white-space:pre-line;"><?= $row['notice_content']?></td>
        </tr>

        <? if($row['notice_img']){?>
          <tr>
            <th>첨부 이미지</th>
            <td>
              <img src="/webzen/uploads/notice/<?= $row['notice_img']?>" alt="공지 이미지" style="max-width: 400px; border:1px solid #ddd;">
            </td>
          </tr>
        <?}?>
      </table>

      <div class="mt-4 d-flex gap-2">
        <a href="notice_edit.php?no=<?= $row['notice_no'] ?>" class="btn btn-primary">공지 수정</a>
        <a href="notice_delete.php?no=<?= $row['notice_no'] ?>" class="btn btn-danger" onclick="return confrim('정말 삭제하시겠습니까?');">공지 삭제</a>
        <a href="notice_list.php" class="btn btn-secondary">목록으로</a>
      </div>
    </div>
  </main>
</div>

<? include('../admin_footer.php');?>