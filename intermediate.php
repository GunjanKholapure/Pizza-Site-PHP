<?php session_start() ?>
<?php require_once("db_connection.php") ?>
<?php require_once("functions.php")  ?>
<?php

if( isset( $_POST["sub"] ) )
{
	$user = get_user_pass($connection,$_POST["pass"]);
	if($user)
	{
		if( $user["name"] == $_POST["name"] )
		{
			$_SESSION["id"] = $user["id"];
			$_SESSION["msg"] = "Successfuly logged in";
		}
		else 
			$_SESSION["msg"] = "Invalid username/password combination";
	}
	else
		$_SESSION["msg"] = "Invalid password";
			header("Location: menu_1.php");
	
}

?>