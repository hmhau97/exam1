<?php 
	 include ('../../config.php');
	
	$magiohang=$_POST['magiohang'];
	$hoten=$_POST['hoten'];
	$diachi=$_POST['diachi'];
	$sdt=$_POST['sdt'];
	$email=$_POST['email'];
	$masp=$_POST['masp'];
	$soluong=$_POST['soluong'];
	$id=$_POST['id'];
	$tinhtrang=$_POST['tinhtrang'];

	$sql = "update giohang SET hoten='$hoten', diachi='$diachi', sdt='$sdt', email='$email', masp='$masp', soluong='$soluong',id='$id',tinhtrang='$tinhtrang' WHERE magiohang='$magiohang'";

	mysqli_query($conn,$sql);
	header('location:../index.php?manage=quanlygiohang');
 ?>