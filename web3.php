<!DOCTYPE html>

<html>
  <head>
      <title> Samuel Belarmino </title>
  </head>
  <body>
    <h1> Upload 3 files </h1>
    <form enctype="multipart/form-data" method="post" action="web3.php">
      <label> File 1: </label><br>
      <input type="file" name="file1" /><br>
      <label> Describe the image in 3 words </label><br>
      <input type="text" name="f1w1" />
      <input type="text" name="f1w2" />
      <input type="text" name="f1w3" /><br>

      <br><label> File 2: </label><br>
      <input type="file" name="file2" /><br>
      <label> Describe the image in 3 words </label><br>
      <input type="text" name="f2w1" />
      <input type="text" name="f2w2" />
      <input type="text" name="f2w3" /><br>

      <br><label> File 3: </label><br>
      <input type="file" name="file3" /><br>
      <label> Describe the image in 3 words </label><br>
      <input type="text" name="f3w1" />
      <input type="text" name="f3w2" />
      <input type="text" name="f3w3" />
      <br>
      <br>
      <input type="submit" />
    </form>

<?php
  $iterator = 1;
  $j = 1;
  foreach($_FILES as $the_file => $fileArray){
    echo "Preparing to upload: ".$the_file."<br>";
    echo "File number: ".$iterator."<br>";

    $file_name = $fileArray["name"];
    $file_temp_loc = $fileArray["tmp_name"];
    $destination = "./uploads/".$file_name;
    $main_dir = "./uploads/";

    $extension = pathinfo($destination, PATHINFO_EXTENSION);
    $without_extension_name = basename($fileArray["name"], ".".$extension);
    $txt_name = $without_extension_name.".txt";

    $valid_extension = array("jpg", "png", "gif");

    if(in_array($extension, $valid_extension)){
      if(move_uploaded_file($file_temp_loc,$destination)){
        echo $file_name." was uploaded successfully!<br>";
        if($j == 1){
          for($i=1; $i <= 3; $i++){
            $text = $_POST["f".$j."w".$i];
            file_put_contents($main_dir.$txt_name, $text.",", FILE_APPEND);
          }
        }

        if($j == 2){
          for($i = 1; $i <= 3; $i++){
            $text = $_POST["f".$j."w".$i];
            file_put_contents($main_dir.$txt_name, $text.",", FILE_APPEND);
          }
        }

        if($j == 3){
          for($i = 1; $i <= 3; $i++){
            $text = $_POST["f".$j."w".$i];
            file_put_contents($main_dir.$txt_name, $text.",", FILE_APPEND);
          }
        }
      } else {
        echo "Upload failed, try again.<br>";
      }
    } else {
      echo "Invalid file type<br>";
    }
    $j++;
    $iterator++;
  }
?>

</body>
</html>
