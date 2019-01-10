<?php 
	include ('../../config.php');

	$tendong=$_POST['tendong'];
	$mahang=$_POST['mahang'];

	$sql = "insert into dongsanpham(tendong, mahang) values ('$tendong', '$mahang')";
	mysqli_query($conn,$sql);
	header('location:../index.php?manage=quanlydongsp');
 ?>