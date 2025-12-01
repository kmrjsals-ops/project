<?php
include('../db/db_conn.php');  // DB 연결

// 1) POST 값 받기
$user_name      = trim($_POST['user_name']);
$user_id        = trim($_POST['user_id']);
$user_pw        = trim($_POST['user_pw']);
$user_nickname  = trim($_POST['user_nickname']);
$user_phone     = trim($_POST['user_phone']);
$user_email     = trim($_POST['user_email']);

// 2) 비밀번호 암호화
$hash_pw = password_hash($user_pw, PASSWORD_DEFAULT);

// 3) 기본 프로필 이미지 설정
$img_name = "default.png";

// 4) 이미지 업로드 처리 (있을 때만)
if (isset($_FILES['user_img']) && $_FILES['user_img']['name'] != "") {

    $upload_dir = "../uploads/profile/";

    // 폴더 없으면 자동 생성
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // 파일명 변경(중복 방지용 timestamp)
    $img_name = time() . "_" . $_FILES['user_img']['name'];

    // 실제 업로드
    move_uploaded_file($_FILES['user_img']['tmp_name'], $upload_dir . $img_name);
}

// 5) 아이디 중복 체크
$sql_check = "SELECT user_id FROM users WHERE user_id = '$user_id'";
$result_check = mysqli_query($conn, $sql_check);

if (mysqli_num_rows($result_check) > 0) {
    echo "<script>alert('이미 사용 중인 아이디입니다.'); history.back();</script>";
    exit;
}

// 6) 회원 정보 삽입
$sql = "INSERT INTO users 
        (user_name, user_id, user_pw, user_nickname, user_phone, user_email, user_img)
        VALUES 
        ('$user_name', '$user_id', '$hash_pw', '$user_nickname', '$user_phone', '$user_email', '$img_name')";

$result = mysqli_query($conn, $sql);

// 7) 결과 처리
if ($result) {
    echo "<script>
            alert('회원가입이 완료되었습니다! 로그인 해주세요.');
            location.href='login.php';
          </script>";
} else {
    echo "<script>
            alert('오류가 발생했습니다. 다시 시도해주세요.');
            history.back();
          </script>";
}
?>