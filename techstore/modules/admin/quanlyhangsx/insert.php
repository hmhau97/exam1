<?php 
	 include ('../../config.php');
	$sql = 'select * from hangsanxuat';
	$query=mysqli_query($conn, $sql);
	$nums=(int)mysqli_num_rows($query);
	
	$tenhang=$_POST['tenhang'];
	$gioithieu=$_POST['gioithieu'];

	$icon=$_FILES['icon']['name'];
	$icon_tmp=$_FILES['icon']['tmp_name'];
	$temp_icon = explode(".", $icon);
	$path = $temp_icon[0] . ($nums+1) . '.' . $temp_icon[1];
	move_uploaded_file($icon_tmp,'../../../imgs/'.$path);
	
	$cover=$_FILES['cover']['name'];
	$cover_tmp=$_FILES['cover']['tmp_name'];
	$temp_cover = explode(".", $cover);
	$path2 = $temp_cover[0] . ($nums+1) . '.' . $temp_cover[1];
	move_uploaded_file($cover_tmp,'../../../imgs/'.$path2);

	$sql = "insert into hangsanxuat(tenhang, gioithieu, anh_icon, anh_cover) values ('$tenhang', '$gioithieu', '$path', '$path2')";
	mysqli_query($conn,$sql);
	header('location:../index.php?manage=quanlyhangsp');
 ?>