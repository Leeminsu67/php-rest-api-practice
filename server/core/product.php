<?php
  class Product{
    // this로 인자들 접근이 다 가능하다
    private $conn;
    private $table = 'products';

    // 컬럼들
    public $id;
    public $name;
    public $price;
    public $stock;
    public $created_at;

    public function __construct($db) {
      $this->conn = $db;
    }

    // 전체 가져오기
    public function get_all(){
      $sql = "SELECT * FROM ". $this->table;
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt;
    }

    // 개별 조회
    public function get_one() {
      // $sql = "SELECT * FROM ". $this->table ." WHERE id=". $this->id;
      $sql = "SELECT * FROM ". $this->table ." WHERE id=:id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":id", $this->id);
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $this->name = $row['name'];
      $this->price = $row['price'];
      $this->stock = $row['stock'];
      $this->created_at = $row['created_at'];
    }

    // 생성
    public function create() {
      $sql = "INSERT INTO ". $this->table ." SET name=:name, price=:price, stock=:stock";
      $stmt = $this->conn->prepare($sql);

      $this->name = htmlspecialchars(strip_tags($this->name));
      $this->price = htmlspecialchars(strip_tags($this->price));
      $this->stock = htmlspecialchars(strip_tags($this->stock));
      $stmt->bindParam(":name", $this->name);
      $stmt->bindParam(":price", $this->price);
      $stmt->bindParam(":stock", $this->stock);

      if($stmt->execute()) {
        return true;
      }
      echo "Error". $stmt->error .".". PHP_EOL;
      return false;
    }

    // 수정
    public function update() {
      $sql = "UPDATE ".$this->table ." SET name=:name, price=:price, stock=:stock WHERE id=:id";
      $stmt = $this->conn->prepare($sql);

      $this->name = htmlspecialchars(strip_tags($this->name));
      $this->price = htmlspecialchars(strip_tags($this->price));
      $this->stock = htmlspecialchars(strip_tags($this->stock));
      $this->id = htmlspecialchars(strip_tags($this->id));

      $stmt->bindParam(":name", $this->name);
      $stmt->bindParam(":price", $this->price);
      $stmt->bindParam(":stock", $this->stock);
      $stmt->bindParam(":id", $this->id);

      if($stmt->execute()) {
        return true;
      }
      echo "Error". $stmt->error .".". PHP_EOL;
      return false;
    }

    // 삭제
    public function delete() {
      $sql = "DELETE FROM ".$this->table." WHERE id=:id";
      $stmt = $this->conn->prepare($sql);

      $this->id = htmlspecialchars(strip_tags($this->id));

      $stmt->bindParam(":id", $this->id);

      if($stmt->execute()) {
        return true;
      }
      echo "Error". $stmt->error .".". PHP_EOL;
      return false;
    }
  }
?>