<?php
	$tenmaychu='localhost';
	$tentaikhoan='root';
	$pass='';
	$csdl='techstore';
	//$conn=mysqli_connect($tenmaychu,$tentaikhoan,$pass,$csdl) or die('Không kết nối được');
	$conn = new mysqli($tenmaychu, $tentaikhoan, $pass, $csdl);
?>