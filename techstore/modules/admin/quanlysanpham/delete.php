<?php 
	include ('../../config.php');
	$masp=$_GET['masp'];
	$sql = "delete from sanpham where masp='$masp'";
	mysqli_query($conn, $sql);
	header('location:../index.php?manage=quanlysanpham');
 ?>