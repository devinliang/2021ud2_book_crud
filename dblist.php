<?php
$servername = "localhost";
$database = "bookstore";
$username = "bookstore";
$password = "abc123";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);
  
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT * FROM `book` ORDER BY `book`.`pubdate` DESC";
  $sth = $conn->prepare($sql);
  $sth->execute();
  $ds = $sth->fetchAll(PDO::FETCH_ASSOC);


  // print_r($ds);

  // foreach ($ds as $d) {
  // echo "書名:" . $d['bookname'];
  //  echo "作者:" . $d['author'];
  //  echo "<hr>";
  // }

} catch(PDOException $e) {

  echo "無法連線 Connection failed: " . $e->getMessage();

}

$conn = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

  <title>Book list</title>
</head>
<body>
  <div class="container">
  <h1 class="text-center my-3">Book Store</h1>
  <table class="table">
    <tr>
      <th>出版日期</th>
      <th>書名</th>
      <th>作者</th>
      <th>出版社</th>
      <th>定價</th>
      <th>類型</th>
      <th>功能</th>
    </tr>
<?php
    $btype = array('1'=>"平裝", '2'=>'精裝', '3'=>'盒裝', '4'=>'其他');

    foreach ($ds as $d){
      echo "<tr>";
      echo "<td>". $d['pubdate'] ."</td>";
      echo "<td>". $d['bookname'] ."</td>";
      echo "<td>". $d['author'] ."</td>";
      echo "<td>". $d['publisher'] ."</td>";
      echo "<td>". $d['price'] ."</td>";
      echo "<td>". $btype[$d['booktype']] ."</td>";
      echo "<td>";
      echo '<a href="db_delete.php?bid='. $d['bid']. '" onclick="return confirm(\'確定要刪除這筆資料嗎?\');">刪除</a>';
      echo "</td>";
      echo "</tr>";
    }
?>    
  </table>

  </div>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>