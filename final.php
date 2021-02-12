<?php require_once("db_connection.php") ?>
<?php require_once("functions.php") ?>
<?php session_start()  ?>

<?php
if(isset($_POST['home']) )
header("Location: menu.php");


if( isset($_POST['confirm']) )
{
	$_SESSION["msg"] = "invoice has been sent to your email";
	header("Location: menu.php");
}

$cnt = 0;$sum=0;
$len = count($_POST["topping"]);
foreach( $_SESSION["p_id"] as $id )
{
	$name  = get_pizza($connection,$id);
	for( $i=0;$i<$_SESSION["quant"][$id];$i++ )
	{
	$total = 0;
	$total += $name["price"];
	echo $name["name"]." ".$name["price"]."<br>";
	if( $cnt < $len )
	{
		foreach( $_POST["topping"][$cnt] as $topping )
		{
			$top = get_topping($connection,$topping);
			echo $top["name"]." ".$top["price"]."<br>";
			$total += $top["price"];
		}
	}
	$cnt++;
		echo "total  = ".$total."<br><br>";
	$sum += $total;

	}
	
}
echo "total = ".$sum."<br>";
echo "
	<form method='post'>
		Confirm Order - 
		<input type='submit' name='confirm' value='confirm' > <br>
		Cancel Order - 
		<input type='submit' name='home' value='cancel' >
	</form> 
	 ";
if( !isset($_SESSION["ind"]) )
	$_SESSION["ind"] = 0;
else
$_SESSION["ind"] = $_SESSION["ind"] + 1;


$ind = $_SESSION["ind"];

$_SESSION["pizza"][$ind] = $_SESSION["p_id"];

$_SESSION["topping"][$ind] = $_POST["topping"];

?>