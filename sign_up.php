<?php session_start() ?>
<?php require_once("db_connection.php") ?>
<?php
if( isset($_POST["submit"]) )
{
	$query = "insert into user ( name , password) values ( '{$_POST["name"]}', '{$_POST["pass"]}' )  ";
	$result = mysqli_query($connection,$query);
	if( $result )
	{
		$_SESSION["msg"] = "User added successfully";
		header("Location: menu_1.php");
	}
	else
	{
		echo "signup unsuccessful, try again";
	}
}

?>

<form method="post" >
Name: <input type="text" name="name"  > <br>
Password: <input type="password" name="pass" > <br>
<input type="submit" value="sign up" name="submit">
</form>