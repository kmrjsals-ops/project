<?php
include('../../db/db_conn.php');

// ===============================
// 1. 입력 값 받기
// ===============================
$title = mysqli_real_escape_string($conn, $_POST['game_title']);
$platform = $_POST['game_platform'];
$status = $_POST['game_status'];
$summary = mysqli_real_escape_string($conn, $_POST['game_summary']);
$detail = mysqli_real_escape_string($conn, $_POST['game_detail']);
$url = mysqli_real_escape_string($conn, $_POST['game_url']);

// ===============================
// 2. games 테이블 INSERT
// ===============================
$sql = "
INSERT INTO games 
(game_title, game_platform, game_status, game_summary, game_detail, game_url, created_datetime) 
VALUES 
('$title', '$platform', '$status', '$summary', '$detail', '$url', NOW())
";

$result = mysqli_query($conn, $sql);

// INSERT 실패 체크
if(!$result){
    echo "GAME INSERT ERROR: " . mysqli_error($conn);
    exit;
}

// 생성된 game_no 가져오기
$game_no = mysqli_insert_id($conn);

if($game_no == 0){
    echo "ERROR: game_no = 0 (게임 등록 실패)";
    exit;
}


// ===============================
// 이미지 업로드 기본 경로
// ===============================
$upload_dir = "../../uploads/games/";
if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);


// ===============================
// 3. 썸네일 업로드
// ===============================
if(isset($_FILES['thumbnail']) && $_FILES['thumbnail']['size'] > 0){

    $thumb_name = time() . "_thumb_" . $_FILES['thumbnail']['name'];
    move_uploaded_file($_FILES['thumbnail']['tmp_name'], $upload_dir . $thumb_name);

    // DB INSERT (테이블명 수정!)
    $thumb_sql = "
        INSERT INTO game_images (game_no, image_url, image_type)
        VALUES ($game_no, '$thumb_name', 'thumbnail')
    ";

    if(!mysqli_query($conn, $thumb_sql)){
        echo "썸네일 INSERT ERROR: " . mysqli_error($conn);
        exit;
    }
}


// ===============================
// 4. 갤러리 이미지 업로드
// ===============================
if(isset($_FILES['gallery'])){
    foreach($_FILES['gallery']['name'] as $i => $name){

        if($_FILES['gallery']['size'][$i] > 0){

            $newname = time() . "_gallery_" . $name;
            move_uploaded_file($_FILES['gallery']['tmp_name'][$i], $upload_dir . $newname);

            // DB INSERT (테이블명 수정!)
            $gallery_sql = "
                INSERT INTO game_images (game_no, image_url, image_type)
                VALUES ($game_no, '$newname', 'gallery')
            ";

            if(!mysqli_query($conn, $gallery_sql)){
                echo "갤러리 INSERT ERROR: " . mysqli_error($conn);
                exit;
            }
        }
    }
}


// ===============================
// 완료
// ===============================
echo "<script>alert('게임이 등록되었습니다.'); location.href='game_list.php';</script>";

?>