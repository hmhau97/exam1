<?php 
	include ('../../config.php');

	$tendong=$_POST['tendong'];
	$mahang=$_POST['mahang'];
	$madong=$_POST['madong'];

	$sql = "update dongsanpham set tendong='$tendong', mahang='$mahang' where madong='$madong'";
	mysqli_query($conn,$sql);
	header('location:../index.php?manage=quanlydongsp');
 ?>