<?php
  include_once("./connect.php");
  $dataArr = array();
  $resultObj['code'] = 400;
  $resultObj['data'] = null;

  $query = "SELECT * FROM test_user";

  // echo $query;

  $result = mysqli_query($conn, $query);
  // var_dump($result-> num_rows);

  if($result->num_rows > 0){
    while($row = mysqli_fetch_assoc($result)){
      // echo $row['id']. $row['name'];
      array_push($dataArr, $row);
    }
    $resultObj['code'] = 200;
  }else{
    echo '데이터가 없습니다.';
  }


  mysqli_close( $conn );

  $resultObj['data'] = $dataArr;

  echo json_encode($resultObj, JSON_UNESCAPED_UNICODE);
?>