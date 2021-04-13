<?php
include_once('config.php');

if (isset($_POST["submit"])) {

    $bookname  = $_POST['bookname'];
    $booktype  = $_POST['booktype'];
    $author    = $_POST['author'];
    $publisher = $_POST['publisher'];
    $pubdate   = $_POST['pubdate'];
    $price     = $_POST['price'];
    $intro     = $_POST['intro'];

try {
  $conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);
  
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "INSERT INTO `book` (`bid`, `bookname`, `booktype`, `author`, `publisher`, `pubdate`, `price`, `intro`) VALUES (NULL, '$bookname', '$booktype', '$author', '$publisher', '$pubdate', '$price', '$intro');";
  $sth = $conn->prepare($sql);
  $sth->execute();

  $msg = "資料成功新增";

} catch(PDOException $e) {

  $msg = "無法新增資料 Connection failed: " . $e->getMessage();

}

$conn = null;
}
?>
<?php include('header.html'); ?>

    <div class="container" id="main">
        <h1 class="display-1">圖書資料新增</h1>
        <?php
           if (isset($msg)) {
               echo '<p class="alert alert-success">'.$msg."</p>";
           }
        ?>
        <form action="" method="post">
            <div class="mb-3">
                <label for="bookname" class="form-label">書名</label>
                <input type="text" class="form-control" id="bookname" name="bookname" placeholder="請輸入書名" required>
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="booktype" id="inlineRadio1" value="1">
                <label class="form-check-label" for="inlineRadio1">平裝</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="booktype" id="inlineRadio2" value="2">
                <label class="form-check-label" for="inlineRadio2">精裝</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="booktype" id="inlineRadio3" value="3">
                <label class="form-check-label" for="inlineRadio3">盒裝</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="booktype" id="inlineRadio4" value="4">
                <label class="form-check-label" for="inlineRadio4">其他</label>
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">作者</label>
                <input type="text" class="form-control" id="author" name="author" placeholder="請輸入作者" required>
            </div>

            <div class="mb-3">
                <label for="publisher" class="form-label">出版社</label>
                <input type="text" class="form-control" id="publisher" name="publisher" placeholder="請輸入書名" required>
            </div>

            <div class="mb-3">
                <label for="pubdate" class="form-label">出版日期</label>
                <input type="date" class="form-control" id="pubdate" name="pubdate" value="<?php echo date('Y-m-d'); ?>" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">定價</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="請輸入作者" required>
            </div>

            <div class="mb-3">
                <label for="intro" class="form-label">簡介</label>
                <textarea class="form-control ckeditor" name="intro" id="intro" cols="80" rows="10"></textarea>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="pubyn" name="pubyn">
                <label class="form-check-label" for="pubyn">是否公佈</label>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="cover">上傳封面</label>
                <input type="file" class="form-control" id="cover" name="cover">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">確認新增</button>
        </form>
    </div>

<?php include('footer.html'); ?>