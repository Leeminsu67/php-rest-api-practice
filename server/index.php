<?php
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  // 들어온 값을 판단
  // $_SERVER['REDIRECT_URL'];
  $part = explode('/', $_SERVER['REDIRECT_URL']);

  // GET POST PUT DELETE

  if($part[2] == 'products') {
    include './core/config.php';
    include './core/product.php';

    if($_SERVER['REQUEST_METHOD'] == 'GET') {

      if(isset($part[3]) && is_numeric($part[3])){
        $id = $part[3];
        include 'read_one.php';
      } else {
        include 'read_all.php';
      }
    } else if($_SERVER['REQUEST_METHOD'] == 'POST') {
      include 'create_product.php';
    } else if($_SERVER['REQUEST_METHOD'] == 'PUT') {
      $id = $part[3];
      include 'update_product.php';
    } else if($_SERVER['REQUEST_METHOD'] == 'DELETE') {

      if(isset($part[3]) && is_numeric($part[3])){
        $id = $part[3];
        include 'delete_product.php';
      } else {
        $a = ["message" => "Not found"];
        echo json_encode($a, JSON_UNESCAPED_UNICODE);
      }
    } else {
      $a = ["message" => "Not found"];
      echo json_encode($a, JSON_UNESCAPED_UNICODE);
    }
  } else {
    $a = ["message" => "Not found"];
    echo json_encode($a, JSON_UNESCAPED_UNICODE);
  }


