<?php session_start() ?>
<?php require_once("db_connection.php")  ?>
<?php require_once("functions.php") ?>
<?php

if( isset($_POST["pizza"]) )
$_SESSION["p_id"] = $_POST["pizza"]; 
else 
{
	$_SESSION["msg"] = "please select a pizza";
	header("Location: menu_1.php");
}
$_SESSION["quant"] = $_POST["quant"];
?>
<form action="final.php" method="post" >
	
<?php 
$cnt = 0;

if( isset($_POST["pizza"]) )
{

foreach( $_POST["pizza"] as $id ) 
{
while( $_POST["quant"][$id]-- )
{
$name = get_pizza($connection,$id);
echo $name["name"]."<br>";
echo "Cheese: <input type=\"checkbox\" name=\"topping[$cnt][]\" value=\"1\"  >  price - 20<br>";
echo "Mayo: <input type=\"checkbox\" name=\"topping[$cnt][]\" value=\"2\" > price - 30  <br>";
echo "Paneer: <input type=\"checkbox\" name=\"topping[$cnt][]\" value=\"3\"> price - 40<br><br>";
$cnt++;
}
}
echo "<input type=\"submit\" name=\"sub\" value=\"add to cart\"> <br><br> ";

}
?>
</form>