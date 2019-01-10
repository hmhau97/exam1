<?php 
	include ('../../config.php');
	$magiohang=$_GET['magiohang'];
	$sql = "update giohang set tinhtrang='Đã xử lý' where magiohang='$magiohang'";
	mysqli_query($conn, $sql);
	header('location:../index.php?manage=quanlygiohang');
 ?>