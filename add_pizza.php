<?php require_once("db_connection.php") ?>
<?php
$msg = "";
if( isset($_POST["submit"]) ) 
{
	$target_dir = "images/";

	$filename = $_FILES["photo"]["name"]; 
    $filename1 = $_FILES["photo1"]["name"];
	
    $target_file = $target_dir.basename($filename);
	$target_file1 = $target_dir.basename($filename1);

    $fileSize = $_FILES["photo"]["size"];
	$fileSize1 = $_FILES["photo1"]["size"];

    $file_ext = substr($filename, strripos($filename, '.'));
	$file_ext1 = substr($filename1, strripos($filename1,'.'));

    $allowed_file_types = array('.jpg','.jpeg','.png');

	if (in_array($file_ext,$allowed_file_types) && $fileSize < 200000 &&
        in_array($file_ext1,$allowed_file_types) && $fileSize1 < 200000
        )
    {
        echo $target_file." ".file_exists($target_file)."<br>";
        if ( true ||  file_exists($target_file) )
        {
            echo "yes";
            $msg = "You have already uploaded this file.";
        }
        else
        {
            move_uploaded_file($_FILES["photo"]["tmp_name"], "images/" . $filename);
            move_uploaded_file($_FILES["photo1"]["tmp_name"], "images/" . $filename1);
            $msg = "File uploaded successfully.";
        }
    }
    elseif (empty($filename))
    {
        // file selection error
        $msg = "Please select a file to upload.";
    }
    elseif ($filesize > 200000 || $filesize1 > 200000  )
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

    $query = "insert into pizza(name,price,imgSrc,checkedImgSrc) values
          ('{$_POST["name"]}', {$_POST["price"]},   '$target_file' , '$target_file1'  )";
        if(mysqli_query($connection,$query))
        {
            $msg = "Pizza added successfully.";
        }
        else {
            echo "ERROR: Could not able to execute $query. " . mysqli_error($connection);
        }
}



echo $msg;
echo "<form method='post' enctype='multipart/form-data' >
<pre>
Enter name: <input type='text' name='name'>
Enter Prize: <input type='number' min='1' max='2000' name='price' >
Upload unchecked Image: <input type='file' name='photo'  >
Upload checked Image: <input type='file' name='photo1'  >
<input type='submit' name='submit' value='add pizza' >
</form>";

?>