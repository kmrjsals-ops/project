<?
  include('../admin_header.php');
  include('../../db/db_conn.php');

  // 게임번호 가져오기
  $game_no = intval($_GET['no']);

  // 1. 게임 기본 정보 가져오기
  $sql = "SELECT * FROM games WHERE game_no = $game_no";
  $result = mysqli_query($conn, $sql);
  $game = mysqli_fetch_assoc($result);

  if(!$game){
    echo "<script>alert('게임 정보를 찾을 수 없습니다.'); history.back();</script>";
    exit; 
  }

  // 2. 이미지 가져오가
  $img_spl = "SELECT * FROM game_images WHERE game_no = $game_no";
  $img_res = mysqli_query($conn,$img_spl);

  $thumbnail = null;
  $gallery = [];
  
  while($row = mysqli_fetch_assoc($img_res)){
    if($row['image_type'] === 'thumbnail'){
      $thumbnail = $row['images_url'];
    }else{
      $gallery[] = $row['image_url'];
    }
  }
?>
<div class="admin-wrapper d-flex">
  <? include('../admin_sidebar.php'); ?>

  <main class="admin-content p-4 w-100">

    <h2 class="mb-4">게임 수정</h2>

    <form action="game_edit_ok.php" method="post" enctype="multipart/form-data">

      <input type="hidden" name="game_no" value="<?= $game_no ?>">

      <!-- 게임 제목 -->
      <div class="mb-3">
        <label class="form-label">게임 제목</label>
        <input type="text" name="game_title" class="form-control" value="<?= $game['game_title'] ?>" required>
      </div>

      <!-- 플랫폼 -->
      <div class="mb-3">
        <label class="form-label">플랫폼</label>
        <select name="game_platform" class="form-select" required>
          <option value="pc" <?= $game['game_platform']=="pc"?"selected":""?>>PC</option>
          <option value="mobile" <?= $game['game_platform']=="mobile"?"selected":""?>>모바일</option>
          <option value="both" <?= $game['game_platform']=="both"?"selected":""?>>PC + 모바일</option>
        </select>
      </div>

      <!-- 서비스 상태 -->
      <div class="mb-3">
        <label class="form-label">서비스 상태</label>
        <select name="game_status" class="form-select">
          <option value="service" <?= $game['game_status']=="service"?"selected":""?>>서비스 중</option>
          <option value="end" <?= $game['game_status']=="end"?"selected":""?>>서비스 종료</option>
          <option value="test" <?= $game['game_status']=="test"?"selected":""?>>테스트 중</option>
        </select>
      </div>

      <!-- 요약 설명 -->
      <div class="mb-3">
        <label class="form-label">요약 설명</label>
        <input type="text" name="game_summary" class="form-control" value="<?= $game['game_summary'] ?>" required>
      </div>

      <!-- 상세 설명 -->
      <div class="mb-3">
        <label class="form-label">상세 설명</label>
        <textarea name="game_detail" class="form-control" rows="6" required><?= $game['game_detail'] ?></textarea>
      </div>

      <!-- 게임 URL -->
      <div class="mb-3">
        <label class="form-label">게임 URL</label>
        <input type="url" name="game_url" class="form-control" value="<?= $game['game_url'] ?>" required>
      </div>

      <!-- 기존 썸네일 -->
      <div class="mb-3">
        <label class="form-label">현재 썸네일</label><br>
        <?php if($thumbnail){ ?>
          <img src="../../uploads/games/<?= $thumbnail ?>" width="300" class="mb-2"><br>
        <?php } ?>
        <input type="hidden" name="old_thumbnail" value="<?= $thumbnail ?>">
        <input type="file" name="thumbnail" class="form-control">
      </div>

      <!-- 기존 갤러리 -->
      <div class="mb-3">
        <label class="form-label">현재 갤러리 이미지</label><br>

        <?php if(count($gallery) > 0){ ?>
          <div class="d-flex flex-wrap gap-2 mb-2">
            <?php foreach($gallery as $g){ ?>
            <img src="../../uploads/games/<?= $g ?>" width="200">
            <?php } ?>
          </div>
        <?php } else { ?>
          <p>등록된 갤러리가 없습니다.</p>
        <?php } ?>

        <input type="file" name="gallery[]" class="form-control" multiple>
      </div>

      <button type="submit" class="btn btn-primary">수정 완료</button>
      <a href="game_view.php?no=<?= $game_no ?>" class="btn btn-secondary">취소</a>

    </form>

  </main>
</div>

<? include('../admin_footer.php'); ?>