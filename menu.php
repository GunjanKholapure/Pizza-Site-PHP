<?php require_once("db_connection.php")  ?>
<?php session_start() ?>
<?php
if(isset($_SESSION["msg"]) )
{
echo $_SESSION["msg"];
$_SESSION["msg"] = "";
}

$str = "";
$str .= "<link rel='stylesheet' type='text/css' href='style.css' >

<form method='post' action='toppings.php' >";

$query = 'select * from pizza';
$result = mysqli_query($connection,$query);
if( $result )
{
	
	while( $data = mysqli_fetch_assoc($result) )
	{
		$str.= "<div class='boxo'>
		<label for='".$data['id']."' >		
		".
		$data['name']." &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
						&nbsp &nbsp &nbsp &nbsp".$data['price'].
		"
		<img src='images/".$data['name']."_unchecked.jpg' height=180px width=220px><br>
		<input type='checkbox' name='pizza[]'    value='".$data['id']."' id='".$data['id']."'  >
		</label>
		<input type='number' name='quant[".$data['id']."]'             placeholder='enter quantity here'     >
		</div>";
	}
}
$str .= "<input type='submit' value='select toppings' name='submit' >";
$str .= "</form>";
echo $str;
?>