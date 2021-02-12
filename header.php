<?php require_once("functions.php") ?>
<?php require_once("db_connection.php") ?>
<div id="head">

	<div id="left">
	<h1>Pizza Circle</h1>
	</div>

	<div id="right">
	<?php 
	if( is_logged_in() )
	{
		$user = get_user_id($connection,$_SESSION["id"]);
		echo $user["name"]."<br><br>";
		echo "<a href='logout.php'>logout</a>";
	}
	else 
	{

		echo '<form action="intermediate.php" method="post" >	
		Username: <input type = "text" name="name"><br>
		Password: <input type = "password" name="pass"><br><br>
		<button type="submit" name="sub" class="">log in</button><br><br>
		</form>
		<a href="sign_up.php">Sign up</a>';
	}
	
	?>
	
	</div>

</div>