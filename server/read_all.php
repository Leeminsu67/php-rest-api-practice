<?php

  // 인스턴스 생성
  $product = new Product($db);

  $stmt = $product->get_all();

  // print_r($stmt);

  $num = $stmt->rowCount();

  // $rs =$stmt->fetchAll();
  // foreach($rs AS $row) {

  // }

  if($num > 0) {
    $product_arr = [];
    $product_arr['data'] = [];

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      // array_push($product_arr['data'], $row);

      // extract를 쓰면 밑에 형식으로 변환이 된다.
      // $id = $row->id;
      extract($row);
      // $row->id  -> $id
      // $row->name  -> $name
      // $row->price  -> $price
      // $row->price  -> $price
      // $row->stock  -> $stock
      // $row->created_at  -> $created_at

      $product_item = [
        'id' => $id,
        'name' => $name,
        'price' => $price,
        'stock' => $stock,
        'created_at' => $created_at
      ];
      array_push($product_arr['data'], $product_item);
    } 
    // json 데이터로 반환
    echo json_encode($product_arr, JSON_UNESCAPED_UNICODE);
  } else {
    echo json_encode(['message' => 'products not found.']);
  }
