<?php require_once("db_connection.php") ?>
<?php
$query = "select * from pizza";
$result = mysqli_query($connection,$query);
echo "<table>
<tr> <th>ID</th> <th>Name</th> <th>Price</th> <th>Image</th> <th>Edit</th> <th>Delete</th> </tr>";
while($data = mysqli_fetch_assoc($result) )
{
echo "<tr> <td>{$data["id"]}</td> <td>'{$data["name"]}'</td> <td>'{$data["price"]}'</td> 
	  <td><img src='{$data["imgSrc"]}'></td>		
	  <td> <a href='pizza_edit.php?id={$data["id"]}'> Edit</a> </td>	
	  <td> <a href='pizza_delete.php?id={$data["id"]}'> Delete</a> </td>	
	  </tr>";
}


?>