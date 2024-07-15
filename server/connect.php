<?php
  $host = 'localhost'; // MySQL 호스트
  $username = 'root'; // MySQL 사용자명
  $password = 'dlwndtksla'; // MySQL 비밀번호
  $database = 'php_test'; // 사용할 데이터베이스명

  $conn = mysqli_connect($host, $username, $password, $database);

  if (!$conn) {
      die('MySQL 연결 실패: ' . mysqli_connect_error());
  }
?>  