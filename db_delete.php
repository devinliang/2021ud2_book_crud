<?php
$servername = "localhost";
$database = "bookstore";
$username = "bookstore";
$password = "abc123";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);
  
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if (isset($_GET['bid'])) {
      $bid = $_GET['bid'];
      $sql = "DELETE FROM `book` WHERE `book`.`bid` = ".$bid;
      $sth = $conn->prepare($sql);
      $sth->execute();
      
      // echo "$bid 資料刪除成功!";
      header("Location: dblist.php");

  } else {
      echo "必要要有主鍵才能刪除!";
  }


} catch(PDOException $e) {

  echo "無法連線 Connection failed: " . $e->getMessage();

}

$conn = null;
?>