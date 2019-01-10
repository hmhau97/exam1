<?php 
	include ('../../config.php');
	$mahang=$_GET['mahang'];
	$sql = "delete from hangsanxuat where mahang='$mahang'";
	mysqli_query($conn, $sql);
	header('location:../index.php?manage=quanlyhangsp');
 ?>