<?php
include('../admin_header.php');
include('../../db/db_conn.php');

// 게임번호 가져오기
$game_no = intval($_GET['no']);

// 1) 게임 기본 정보 불러오기
$sql = "
    SELECT * FROM games 
    WHERE game_no = $game_no
";
$result = mysqli_query($conn, $sql);
$game = mysqli_fetch_assoc($result);

if(!$game){
    echo "<script>alert('게임 정보를 찾을 수 없습니다.'); history.back();</script>";
    exit;
}

// 2) 이미지 불러오기
$img_sql = "
    SELECT * FROM game_images
    WHERE game_no = $game_no
";
$img_result = mysqli_query($conn, $img_sql);

// 이미지 분류
$thumbnail = null;
$gallery = [];

while($row = mysqli_fetch_assoc($img_result)){
    if($row['image_type'] == 'thumbnail'){
        $thumbnail = $row['image_url'];
    } else if($row['image_type'] == 'gallery'){
        $gallery[] = $row['image_url'];
    }
}
?>

<div class="admin-wrapper d-flex">
  <? include('../admin_sidebar.php'); ?>

  <main class="admin-content p-4 w-100">
    <div class="d-flex justify-content-between mb-4">
      <h2>게임 상세보기</h2>
      <div>
        <a href="game_edit.php?no=<?= $game_no ?>" class="btn btn-success">수정</a>
        <a href="game_delete.php?no=<?= $game_no ?>" class="btn btn-danger" onclick="return confirm('정말 삭제하시겠습니까?')">삭제</a>
        <a href="game_list.php" class="btn btn-secondary">목록</a>
      </div>
    </div>

    <div class="card shadow-sm p-4">

      <!-- 썸네일 -->
      <h4 class="mb-3">게임 썸네일</h4>
      <?php if($thumbnail){ ?>
        <img src="../../uploads/games/<?= $thumbnail ?>" width="400" class="mb-4" style="border-radius:10px;">
      <?php } else { ?>
        <p>썸네일 이미지 없음</p>
      <?php } ?>

      <hr>

      <!-- 기본 정보 -->
      <h4 class="mt-4 mb-3">게임 정보</h4>

      <table class="table table-bordered">
        <tr>
          <th width="200">게임명</th>
          <td><?= $game['game_title'] ?></td>
        </tr>

        <tr>
          <th>플랫폼</th>
          <td><?= $game['game_platform'] ?></td>
        </tr>

        <tr>
          <th>서비스 상태</th>
          <td><?= $game['game_status'] ?></td>
        </tr>

        <tr>
          <th>요약 설명</th>
          <td><?= $game['game_summary'] ?></td>
        </tr>

        <tr>
          <th>상세 설명</th>
          <td style="white-space:pre-line;"><?= $game['game_detail'] ?></td>
        </tr>

        <tr>
          <th>게임 링크</th>
          <td><a href="<?= $game['game_url'] ?>" target="_blank"><?= $game['game_url'] ?></a></td>
        </tr>

        <tr>
          <th>등록일</th>
          <td><?= $game['created_datetime'] ?></td>
        </tr>
      </table>

      <hr>

      <!-- 갤러리 -->
      <h4 class="mt-4 mb-3">갤러리 이미지</h4>

      <?php if(count($gallery) > 0){ ?>
        <div class="d-flex flex-wrap gap-3">
          <?php foreach($gallery as $img){ ?>
            <img src="../../uploads/games/<?= $img ?>" 
                 width="250"
                 style="border-radius:10px; border:1px solid #ddd;">
          <?php } ?>
        </div>
      <?php } else { ?>
        <p>등록된 갤러리 이미지가 없습니다.</p>
      <?php } ?>

    </div>
  </main>
</div>

<? include('../admin_footer.php'); ?>