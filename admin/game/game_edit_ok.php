<?php
include('../../db/db_conn.php');

$game_no = intval($_POST['game_no']);

$title = mysqli_real_escape_string($conn, $_POST['game_title']);
$platform = $_POST['game_platform'];
$status = $_POST['game_status'];
$summary = mysqli_real_escape_string($conn, $_POST['game_summary']);
$detail = mysqli_real_escape_string($conn, $_POST['game_detail']);
$url = mysqli_real_escape_string($conn, $_POST['game_url']);

$old_thumbnail = $_POST['old_thumbnail'];

$upload_dir = "../../uploads/games/";

// 1. 게임 기본 정보 업데이트
$sql = "UPDATE games SET game_title = '$title', game_platform = '$platform', game_status = '$status', game_summary = '$summary', game_detail = '$detail', game_url = '$url' WHERE game_no = $game_no";

if(!mysqli_query($conn, $sql)){
    echo "UPDATE ERROR: " . mysqli_error($conn);
    exit;
}


// 2. 썸네일 변경 처리
if($_FILES['thumbnail']['size'] > 0){

    // 기존 파일 삭제하기
    if($old_thumbnail && file_exists($upload_dir . $old_thumbnail)){
        unlink($upload_dir . $old_thumbnail);
    }

    // 새 파일 업로드하기
    $thumb_name = time() . "_thumb_" . $_FILES['thumbnail']['name'];
    move_uploaded_file($_FILES['thumbnail']['tmp_name'], $upload_dir . $thumb_name);

    // db 업데이트
    mysqli_query($conn, "
        UPDATE game_images 
        SET image_url = '$thumb_name'
        WHERE game_no = $game_no AND image_type='thumbnail'
    ");
}


// 3) 갤러리 이미지 추가 업로드
if(isset($_FILES['gallery'])){
    foreach($_FILES['gallery']['name'] as $i => $name){

        if($_FILES['gallery']['size'][$i] > 0){

            $newname = time() . "_gallery_" . $name;
            move_uploaded_file($_FILES['gallery']['tmp_name'][$i], $upload_dir . $newname);

            mysqli_query($conn, "
                INSERT INTO game_images (game_no, image_url, image_type)
                VALUES ($game_no, '$newname', 'gallery')
            ");
        }
    }
}


echo "<script>alert('게임 정보가 수정되었습니다.'); location.href='game_view.php?no=$game_no';</script>";
?>