<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php 
  $mysql_host='localhost'; //호스트명
  $mysql_user='root'; //사용자명
  $mysql_password='1916'; //패스워드
  $mysql_db='kdt'; //데이터베이스명

  //데이터베이스 연결을 위한 변수 생성
  $conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);

  //만악에 db연결 오류시 에러 출력하고 스크립트 종료한다.
  if(!$conn){
    die('연결실패 : ' . mysqli_connect_error());
  }

  //php 8.x이상에서는 변수선언시 값을 넣어주지 않을 시 무조건 에러가 뜨는데 이것을 안보이게 숨기는 함수.

?>