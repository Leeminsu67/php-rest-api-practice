<?php
  $dbserver = 'localhost';
  $dbuser = 'root';
  $dbpassword = 'dlwndtksla';
  $dbname = 'php_test';
  
  try{
    $dsn = "mysql:host={$dbserver};dbname={$dbname}";
    $db = new PDO($dsn, $dbuser, $dbpassword);
    // db 만약에 prepared를 지원하지 않으면 db의 본연의 기능을 쓰겠다.
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    // 자주 사용하게 되는 쿼리는 버퍼에 남아있는것을 쓰겠다 다음번 호출할 땐 버퍼에 있는걸 그대로 쓰겠다.
    $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
    // 에러가 발생했을 때 에러를 반환해주겠다.
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "DB 연결 성공!";
    
  } catch(PDOException $e){
    echo $e->getMessage();
  }
