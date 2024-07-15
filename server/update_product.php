<?php
  // Method 허용부 원하는 걸 적을 수 있고 여러개를 적을 수 있다.
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Authorization,X-Requested-With');

  // 인스턴스 생성
  $product = new Product($db);

  // json타입 데이터를 받기 위함 php://input
  $data = json_decode(file_get_contents("php://input"));

  $product->name = $data->name;
  $product->price = $data->price;
  $product->stock = $data->stock;
  $product->id = $id;

  if($product->update()) {
    $a = ["message" => "Product update"];
    echo json_encode($a, JSON_UNESCAPED_UNICODE);
  } else {
    $a = ["message" => "Product update false"];
    echo json_encode($a, JSON_UNESCAPED_UNICODE);
  }


