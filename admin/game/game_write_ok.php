<?php
include('../../db/db_conn.php');

// ===============================
// 1. 입력 값 받기 (보안 처리)
// ===============================
$title    = mysqli_real_escape_string($conn, $_POST['game_title']);
$platform = $_POST['game_platform'];
$status   = $_POST['game_status'];
$summary  = mysqli_real_escape_string($conn, $_POST['game_summary']);
$detail   = mysqli_real_escape_string($conn, $_POST['game_detail']);
$url      = mysqli_real_escape_string($conn, $_POST['game_url']);


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

if (!$result) {
    echo "GAME INSERT ERROR: " . mysqli_error($conn);
    exit;
}

// 신규 game_no 가져오기
$game_no = mysqli_insert_id($conn);
if ($game_no == 0) {
    echo "ERROR: 게임 등록 실패 (game_no = 0)";
    exit;
}


// ===============================
// 3. 업로드 폴더 생성
// ===============================
$upload_dir = "../../uploads/games/";

if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}


// ===============================
// 업로드 헬퍼 함수 (중복 제거)
// ===============================
function uploadImage($file_tmp, $filename, $upload_dir) {

    // 원본 파일명 보호를 위해 basename 적용
    $safe_name = uniqid() . "_" . basename($filename);

    $target_path = $upload_dir . $safe_name;

    if (!move_uploaded_file($file_tmp, $target_path)) {
        return false; // 업로드 실패
    }

    return $safe_name;
}


// ===============================
// 4. 썸네일 업로드
// ===============================
if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['size'] > 0) {

    $thumb = uploadImage($_FILES['thumbnail']['tmp_name'], $_FILES['thumbnail']['name'], $upload_dir);

    if ($thumb === false) {
        echo "썸네일 업로드 실패!";
        exit;
    }

    $thumb_sql = "
        INSERT INTO game_images (game_no, image_url, image_type)
        VALUES ($game_no, '$thumb', 'thumbnail')
    ";

    if (!mysqli_query($conn, $thumb_sql)) {
        echo "썸네일 INSERT ERROR: " . mysqli_error($conn);
        exit;
    }
}


// ===============================
// 5. 갤러리 이미지 업로드 (여러개)
// ===============================
if (isset($_FILES['gallery'])) {

    foreach ($_FILES['gallery']['name'] as $i => $name) {

        if ($_FILES['gallery']['size'][$i] <= 0) continue;

        $gallery_file = uploadImage($_FILES['gallery']['tmp_name'][$i], $name, $upload_dir);

        if ($gallery_file === false) {
            echo "갤러리 이미지 업로드 실패!";
            exit;
        }

        $gallery_sql = "
            INSERT INTO game_images (game_no, image_url, image_type)
            VALUES ($game_no, '$gallery_file', 'gallery')
        ";

        if (!mysqli_query($conn, $gallery_sql)) {
            echo "갤러리 INSERT ERROR: " . mysqli_error($conn);
            exit;
        }
    }
}


// ===============================
// 완료
// ===============================
echo "<script>alert('게임이 등록되었습니다.'); location.href='game_list.php';</script>";
exit;

?>
