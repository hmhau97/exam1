<?php 
	session_start();
	include ('config.php');
	if(isset($_POST['dangky'])){
		$username = $_POST['username'];	
		$password = $_POST['password'];
		$re_password = $_POST['re_password'];
		if($password!=$re_password){
			$_SESSION['register']='failed';
			header('location:../index.php?content=dangky'); 
			return;
		} 

		$sql = "select * from users";
		$query = mysqli_query($conn, $sql);
		while($dong=mysqli_fetch_array($query)){
			if($dong['username']==$username){
				$_SESSION['register']='existence';
				header('location:../index.php?content=dangky'); 
				return;
			}
		}

		$email = $_POST['email'];

		$hoten = $_POST['hoten'];
		$diachi = $_POST['diachi'];
		$sdt = $_POST['sdt'];

		$sql = "insert INTO `users`( `hoten`, diachi, `sdt`, `email`, `role`, `username`, `password`) VALUES ('$hoten', '$diachi', '$sdt','$email','customer','$username','$password')";
		mysqli_query($conn, $sql);
		$_SESSION['register']='ok';
		header('location:../index.php?content=dangky');
		return;
	}

	if(isset($_POST['search'])){
		$search = $_POST['search'];
		echo $search;
		if($search!=''){
			header('location:../index.php?content=tim&key='.$search);
		}else{
			header('location:../index.php?content=tim');
		}
		return;
	}

	if(isset($_POST['buy'])){
		$masp=$_POST['masp'];
		$_SESSION['cart_'.$masp]+=1;
		$action=$_POST['buy'];
		if($action == 'MUA NGAY'){
			header('location:../index.php?content=giohang');
			return;
		}else if($action=='THÊM VÀO GIỎ HÀNG'){
			$_SESSION['action_add']='ok';
			header('location:../index.php?content=giohang');
			header('location:../index.php?content=chitietsanpham&masp='.$masp); 
			return;
		}
	}
?>
