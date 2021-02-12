<?php require_once("db_connection.php") ?>
<?php

echo "<script src='img.js'></script>"
$msg = "";
if( isset($_POST["submit"]) ) 
{
	$target_dir = "imgaes/";
	$filename = $_FILES["photo"]["name"]; 
	$target_file = $target_dir.basename($filename);
	$fileSize = $_FILES["photo"]["size"];
	$file_ext = substr($filename, strripos($filename, '.'));
	$allowed_file_types = array('.jpg','.jpeg','.png');

	if (in_array($file_ext,$allowed_file_types) && ($fileSize < 2000000))
    {
        if (file_exists("images/" . $filename))
            $msg = "You have already uploaded this file.";
        else
        {
            move_uploaded_file($_FILES["photo"]["tmp_name"], "images/" . $filename);
            $msg = "File uploaded successfully.";
        }
    }
    elseif (empty($file_basename))
    {
        // file selection error
        $msg = "Please select a file to upload.";
    }
    elseif ($filesize > 200000)
    {
        // file size error
        $msg = "The file you are trying to upload is too large.";
    }
    else
    {
        // file type error
        $msg = "Only these file typs are allowed for upload: " . implode(', ',$allowed_file_types);
        unlink($_FILES["pimage"]["tmp_name"]);
    }

    $query = "insert into pizza(name,price,imgSrc) values
          ('{$_POST["name"]}', {$_POST["price"]},   '$target_file'  )";
        if(mysqli_query($connection,$query))
        {
            $msg = "Pizza added successfully.";
        }
        else {
            echo "ERROR: Could not able to execute $query. " . mysqli_error($connection);
        }
}

if( isset($_GET["id"]) )
{
    
}
echo $msg;
echo "<form method='get' enctype='multipart/form-data' >
<pre>
Enetr Id: <input type='number' min='1' max='999' name='id'  >
<input type='submit' name='submit' value='get details' >
</form>";

$query = "select * from pizza where id = "

Edit name: <input type='text' name='name' id='name'>
Edit Prize: <input type='number' min='1' max='2000' name='price' id='price'>
Upload Image: <input type='file' name='photo'  >

?>