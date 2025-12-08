<?
  include('../admin_header.php');
  include('../../db/db_conn.php');
?>

<div class="admin-wrapper d-flex">
  <? include('../admin_sidebar.php');?>

  <main class="admin-content p-4 w-100">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="mb-0">게임 관리</h2>
      <a href="game_write.php" class="btn btn-primary">게임 등록</a>
    </div>

    <div class="card shadow-sm">
      <div class="card-baby">
        <table class="table table-hover align-middle">
          <thead class="table-light">
            <tr>
              <th>No</th>
              <th>게임명</th>
              <th>플랫폼</th>
              <th>상태</th>
              <th>요약 설명</th>
              <th>등록일</th>
            </tr>
          </thead>

          <tbody>
            <?
            // db에서 게임 리스트 불러오기
            $sql = "SELECT game_no, game_title, game_platform, game_status, game_summary, created_datetime FROM games ORDER BY game_no DESC";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) == 0){
              // 만약에 등록된 게임이 없다면
            ?>
              <tr>
                <td colspan="6">등록된 게임이 없습니다.</td>
              </tr>
            <?
            } else {
              while($row = mysqli_fetch_assoc($result)){
            ?>
              <tr onclick="location.href='game_view.php?no=<?=$row['game_no'];?>'" style="cursor:pointer;">
                <td><?=$row['game_no']?></td>
                <td><?=$row['game_title']?></td>
                <td><?=$row['game_platform']?></td>
                <td><?=$row['game_status']?></td>
                <td class="text-start"><?=$row['game_summary']?></td>
                <td><?=$row['create_datetime']?></td>
              </tr>
            <?
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>
</div>

<? include('../admin_footer.php');?>