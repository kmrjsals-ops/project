<?php
session_start();
session_unset(); //모든 세션 변수 초기화 시킨다
session_destroy(); //세션을 완전히 삭제한다

echo "<script>alert('로그아웃 되었습니다.');location.href='../index.php';</script>";
exit;
?>