<?php

  // 인스턴스 생성
  $product = new Product($db);

  $product->id = $id;
  $product->get_one();

  $product_arr = [
    'id' => $product->id,
    'name' => $product->name,
    'price' => $product->price,
    'stock' => $product->stock,
    'created_at' => $product->created_at
  ];

  echo json_encode($product_arr);