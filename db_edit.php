<?php
$servername = "localhost";
$database = "bookstore";
$username = "bookstore";
$password = "abc123";

if (isset($_GET['bid']) && $_GET['bid']!='') {

    $bid = $_GET['bid'];
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);
      
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
      $sql = "SELECT * FROM `book` WHERE `book`.`bid`=".$bid;
      $sth = $conn->prepare($sql);
      $sth->execute();
      $ds = $sth->fetchAll(PDO::FETCH_ASSOC);
      $d = $ds[0];

      // print_r($d);
    
      // foreach ($ds as $d) {
      // echo "書名:" . $d['bookname'];
      //  echo "作者:" . $d['author'];
      //  echo "<hr>";
      // }
    
    } catch(PDOException $e) {
    
      echo "無法連線 Connection failed: " . $e->getMessage();
    
    }
    
    $conn = null;

} else {

  header("Location: dblist.php");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>Book list</title>
</head>
<body>
<div class="container">
        <h1 class="display-1">圖書資料修改</h1>
        <?php
           if (isset($msg)) {
               echo '<p class="alert alert-success">'.$msg."</p>";
           }
        ?>
        <form action="" method="post">
            <div class="mb-3">
                <label for="bookname" class="form-label">書名</label>
                <input type="text" class="form-control" id="bookname" name="bookname" value="<?php echo $d['bookname'];?>" required>
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="booktype" id="inlineRadio1" value="1"
                <?php if ($d['booktype']=='1') echo 'checked';?>>
                <label class="form-check-label" for="inlineRadio1">平裝</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="booktype" id="inlineRadio2" value="2"
                <?php if ($d['booktype']=='2') echo 'checked';?>>
                <label class="form-check-label" for="inlineRadio2">精裝</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="booktype" id="inlineRadio3" value="3"
                <?php if ($d['booktype']=='3') echo 'checked';?>>
                <label class="form-check-label" for="inlineRadio3">盒裝</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="booktype" id="inlineRadio4" value="4"
                <?php if ($d['booktype']=='4') echo 'checked';?>>
                <label class="form-check-label" for="inlineRadio4">其他</label>
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">作者</label>
                <input type="text" class="form-control" id="author" name="author" value="<?php echo $d['author'];?>" required>
            </div>

            <div class="mb-3">
                <label for="publisher" class="form-label">出版社</label>
                <input type="text" class="form-control" id="publisher" name="publisher"  value="<?php echo $d['publisher'];?>" required>
            </div>

            <div class="mb-3">
                <label for="pubdate" class="form-label">出版日期</label>
                <input type="date" class="form-control" id="pubdate" name="pubdate" value="<?php echo $d['pubdate']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">定價</label>
                <input type="number" class="form-control" id="price" name="price"  value="<?php echo $d['price'];?>" required>
            </div>

            <div class="mb-3">
                <label for="intro" class="form-label">簡介</label>
                <textarea class="form-control" name="intro" id="intro" cols="80" rows="10">
                <?php echo $d['intro'];?>
                </textarea>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="pubyn" name="pubyn">
                <label class="form-check-label" for="pubyn">是否公佈</label>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="cover">上傳封面</label>
                <input type="file" class="form-control" id="cover" name="cover">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

  </div>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
  
  
</body>
</html>