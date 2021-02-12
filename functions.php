<?php

function get_pizza( $connection, $id )
{
$query 	= "select * from pizza where id = {$id}";
$result = mysqli_query($connection,$query);
$data 	= mysqli_fetch_assoc($result);
return $data; 
}

function get_topping($connection,$id)
{
	$query = "select * from topping where id = {$id}";
	$result = mysqli_query($connection,$query);
	$data = mysqli_fetch_assoc($result);
	return $data;
}

function get_user_pass($con, $pass)
{
	$query = "select * from user where password = '{$pass}'";
	$result = mysqli_query($con, $query);
	if( $result )
	{
		$data = mysqli_fetch_assoc($result);
		return $data;
	}
	else 
		return 0;
}


function get_user_id($con, $id)
{
	$query = "select * from user where id = {$id}";
	$result = mysqli_query($con, $query);
	
	if( $result )
	{
		$data = mysqli_fetch_assoc($result);
		return $data;
	}
	else 
		return 0;
}


function is_logged_in()
{
	if( isset($_SESSION["id"]) )
		return 1;
	else 
		return 0;
}


?>