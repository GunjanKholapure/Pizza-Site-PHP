<?php session_start() ?>
<?php
if( isset($_POST["submit"]) )
{
	if( $_POST["name"] == "gunjan" && $_POST["pass"] == "gunjan" )
	{
		$_SESSION["name"] = $_POST["name"];
		header("location:menu.php");
	}
	else 
	{
		$str = "login failed";
	}
}
else 
$str = "";
?>

<?php echo $str; ?>
<html>

<form method = "POST">
Username: <input type="text" name="name" maxlength="30"  ><br>
Password: <input type="password" name="pass" maxlength="30"> <br>
<input type="submit" name="submit" value="login">
</form>

</html>

