<?php
// 관리자 권한 체크
session_start();
if(!isset($_SESSION['mb_role']) || $_SESSION['mb_role'] != 'admin'){
    echo "<script>alert('관리자만 접근 가능합니다.'); location.href='../index.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- 관리자 스타일 -->
<link href="/webzen/admin/css/admin_style.css" rel="stylesheet">

<title>Webzen Admin</title>
</head>
<body>