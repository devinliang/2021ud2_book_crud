<?php
include_once('config.php');

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

<!-- html hearder part -->
<?php include('header.html'); ?>

  <div class="container" id="main">
  
  <table class="table">
    <tr>
      <th>出版日期</th>
      <th>書名</th>
      <th>作者</th>
      <th>出版社</th>
      <th>定價</th>
      <th>類型</th>
      <th><a href="db_add.php">新增</a></th>
    </tr>
    <?php
        $btype = array('1'=>"平裝", '2'=>'精裝', '3'=>'盒裝', '4'=>'其他');

        foreach ($ds as $d){
          echo "<tr>";
          echo "<td>". $d['pubdate'] ."</td>";
          echo '<td>'; 
          $bookcover = 'images/cover/p'.$d['bid'].'.jpg';
          if (file_exists($bookcover)) {
            echo '<img src="'.$bookcover.'" alt="" height="30">';
          }
          echo '<a href="db_show.php?bid=' . $d['bid'] . '">';
          echo $d['bookname'] ."</a></td>";
          echo "<td>". $d['author'] ."</td>";
          echo "<td>". $d['publisher'] ."</td>";
          echo "<td>". $d['price'] ."</td>";
          echo "<td>". $btype[$d['booktype']] ."</td>";
          echo "<td>";
          echo '<a href="db_edit.php?bid='. $d['bid']. '">修改</a> ';
          echo '<a href="db_delete.php?bid='. $d['bid']. '" onclick="return confirm(\'確定要刪除這筆資料嗎?\');">刪除</a>';
          echo "</td>";
          echo "</tr>";
        }
    ?>    
  </table>

  </div>

 <?php include('footer.html'); ?>