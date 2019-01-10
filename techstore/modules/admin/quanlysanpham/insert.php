<?php 
	 include ('../../config.php');
	$sql = 'select * from sanpham';
	$query=mysqli_query($conn, $sql);
	$nums=(int)mysqli_num_rows($query);
	
	$tensp=$_POST['tensp'];
	$gia=$_POST['gia'];
	$tomtat=$_POST['tomtat'];
	$mota=$_POST['mota'];
	$core=$_POST['core'];
	$ram=$_POST['ram'];
	$manhinh=$_POST['manhinh'];
	$baohanh=$_POST['baohanh'];
	$tinhtrang=$_POST['tinhtrang'];
	$chuyendung=$_POST['chuyendung'];
	$madong=$_POST['madong'];

	$hinhanh=$_FILES['hinhanh']['name'];
	$hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
	$temp_hinhanh = explode(".", $hinhanh);
	$path = $temp_hinhanh[0] . ($nums+1) . '.' . $temp_hinhanh[1];
	move_uploaded_file($hinhanh_tmp,'../../../imgs/'.$path);

	 $sql = "insert into sanpham(tensp, gia, mota, core, ram, manhinh, tomtat, baohanh, tinhtrang, hinhanh, chuyendung, madong) VALUES ('$tensp', '$gia', '$mota', '$core', '$ram', '$manhinh', '$tomtat', '$baohanh', '$tinhtrang', '$path', '$chuyendung', '$madong')";
	mysqli_query($conn,$sql);
	header('location:../index.php?manage=quanlysanpham');
 ?>