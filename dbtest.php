<?php
$servername = "localhost";
$database = "bookstore";
$username = "bookstore";
$password = "abc123";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);
  
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  echo "連線成功 Connected successfully!";

} catch(PDOException $e) {

  echo "無法連線 Connection failed: " . $e->getMessage();

}

$conn = null;
?>