<?php 
	include ('../../config.php');
	session_start();
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$hoten=$_POST['hoten'];
	$diachi=$_POST['diachi'];
	$sdt=$_POST['sdt'];
	$email=$_POST['email'];
	$chuthich=$_POST['chuthich'];
	$ngaydat = date('d/m/Y - H:i:s');
	// $soluong_arr = array();
	// if(isset($_POST['soluong_arr'])){
	// 	$soluong_arr=unserialize($_POST['soluong_arr']);
	// }
		
	
	// if(isset($_POST['masp_arr'])){
	// 	$masp_arr=unserialize($_POST['masp_arr']);
	// }else{
	// 	return;
	// }

	if(isset($_POST['id'])){
		$id=$_POST['id'];
	}else{
		$id='';
	}

	$sql="insert INTO giohang(hoten, diachi, sdt, email, id, tinhtrang, ngaydat, chuthich) VALUES ('$hoten','$diachi','$sdt','$email', '$id','Chờ xử lý','$ngaydat','$chuthich')";
	//mysqli_query($conn,$sql);
	$conn->query($sql);

	$magiohang=$conn->insert_id;
	foreach($_SESSION as $name => $value){
		if($value>0){
			if(substr($name,0,5)=='cart_'){
				$masp=substr($name,5);
				$sql="insert INTO chitietdonhang(magiohang, masp, soluong) VALUES ('$magiohang', '$masp', '$value')";
				mysqli_query($conn,$sql);
				$_SESSION['cart_'.$masp]=0;
			}
		}
	}
	$_SESSION['ordered']='ok';
	header('location:../../../index.php?content=giohang');
 ?>