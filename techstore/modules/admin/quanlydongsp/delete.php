<?php 
	include ('../../config.php');
	$madong=$_GET['madong'];
	$sql = "delete from dongsanpham where madong='$madong'";
	mysqli_query($conn, $sql);
	header('location:../index.php?manage=quanlydongsp');
 ?>