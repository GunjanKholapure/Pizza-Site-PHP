<?php session_start() ?>
<?php require_once("db_connection.php")  ?>
<?php

$str = "";
$str .= "<link rel='stylesheet' type='text/css' href='style.css' >
		 <script src='img.js'></script>";
		 require_once("header.php");
if(isset($_SESSION["msg"]) )
{
echo $_SESSION["msg"];
$_SESSION["msg"] = "";
}

$str .= "<form method='post' action='toppings.php' >";

$query = 'select * from pizza';
$result = mysqli_query($connection,$query);
if( $result )
{
	$str .= '<div id="cont">';
	while( $data = mysqli_fetch_assoc($result) )
	{

	$str .= '
	<div class="boxo">
	<span style="display:none;">
				<input type="checkbox" name="pizza[]" value="'.$data["id"].'" id="p_'.$data["id"].'">
	</span>
	<table>
	<tr>
	<img id="i_'.$data["id"].'" src="'.$data["imgSrc"].'" width="220" height="200" 
    onclick="CheckboxClicked(\'i_'.$data["id"].'\' ,\'p_'.$data["id"].'\', \'n_'.$data["id"].'\'   )" style="cursor:pointer;">
    </tr>
    <tr>
    <td height:50px>'. $data["name"].' </td> <td>'. $data["price"].' </td>
    </tr>
    </table>
    <span id="n_'.$data["id"].'" style="display:none;">
    <input type="number" name="quant['.$data["id"].']" placeholder="enter quantity here" size="30">
    </span>
    </div>';

	}
}
$str .= '</div>';
$str .= '<input type="submit" name="submit" value="choose toppings" class="button" >';
$str .= "</form>";
echo $str;
?>
<?php // session_destroy(); ?>