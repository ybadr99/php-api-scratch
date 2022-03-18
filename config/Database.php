<?php 

  class Database {
    // DB Params
    private $host = 'localhost';
    private $db_name = 'myblog';
    private $username = 'admin';
    private $password = 'admin123';
    private $conn;

    // DB Connect
    public function connect() {
      $this->conn = null;

      try { 
        $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
      }

      return $this->conn;
    }
  }


//   $conn = new Database();
//   $pdo  = $conn->connect();
  
//   $stmt =$pdo->prepare('select * from `posts` limit 1');
//   $stmt->execute();
//   $res = $stmt->fetchAll();
 
//   var_dump($res);