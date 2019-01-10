<?php 
	include ('../../config.php');
	$magiohang=$_GET['magiohang'];
	$sql = "delete from chitietdonhang where magiohang='$magiohang'";
	mysqli_query($conn, $sql);

	$sql = "delete from giohang where magiohang='$magiohang'";
	mysqli_query($conn, $sql);
	header('location:../index.php?manage=quanlygiohang');
 ?>