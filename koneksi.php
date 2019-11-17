<?php
	$conn = mysqli_connect("localhost","root","") or die (mysql_error());
	mysqli_select_db($conn, "db_farmer") or die (mysql_error());
?>