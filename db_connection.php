<?php 
define("db_server","localhost");
define("db_user","root");
define("db_pass","gunjan");
define("db_name","pizza_site");

//1 create database connection
$connection = mysqli_connect(db_server,db_user,db_pass,db_name);
// 2 test for database connection
if(mysqli_connect_errno()){
	die("database connection failed: " .
		mysqli_connect_error() .
		" (" . mysqli_connect_errno() . ")"
		);
}
?>



