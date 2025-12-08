<?
  include('../../db/db_conn.php');

  $game_no = intval($_GET['no']);

  $upload_dir = "../../uploads/games/";

  // 1. 삭제 전 이미지 파일 목록 가져오기 
  $sql_img = "SELECT image_url FROM game_images WHERE game_no = $game_no";
  $result_img = mysqli_query($conn, $sql_img);

  // 2. 게임 삭제 (cascade 떄문에 이미지는 자동 삭제처리)
  mysqli_query($conn, "DELETE FROM games WHERE game_no = $game_no");

  // 3. 물리 파일 삭제 
  while($row = mysqli_fetch_assoc($result_img)){
    $file = $upload_dir. $row['image_url'];
    if(file_exists($file)){
      unlink($file);
    }
  }
  echo "<script>alert('게임이 삭제되었습니다.'); location.href='game_list.php';</script>";
?>