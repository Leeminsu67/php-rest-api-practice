<?php
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Authorization,X-Requested-With');

  // 인스턴스 생성
  $product = new Product($db);

  $product->id = $id;

  if($product->delete()) {
    $a = ["message" => "Product delete"];
    echo json_encode($a, JSON_UNESCAPED_UNICODE);
  } else {
    $a = ["message" => "Product delete false"];
    echo json_encode($a, JSON_UNESCAPED_UNICODE);
  }
