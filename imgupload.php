<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp  = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];

      $extname  = explode('.',$_FILES['image']['name']);
      $file_ext = strtolower(end($extname));
      
      // 可接受的檔案格式
      $extensions = array("jpeg","jpg","png");
      
      if (in_array($file_ext, $extensions)=== false) {
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if ($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){

         move_uploaded_file($file_tmp, "images/".$file_name);
         echo "Success";
         
      }else{
         print_r($errors);
      }
   }
?>
<html>
   <head>

   <script type='text/javascript'>
        function preview_image(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('output_image');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

   </head>
   <body>
      
      <form action="" method="POST" enctype="multipart/form-data">
        
        <div>
         <input type="file" name="image" accept="image/*" onchange="preview_image(event)">
        </div>

        <div>
         <img id="output_image" />
        </div>

        <div>
         <input type="submit"/>
        </div>
        
      </form>
      
   </body>
</html>