<?php
	if(isset($_POST['dangnhap'])){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$sql="select * from users where username='$username' and password='$password' limit 1";
		$query=mysqli_query($conn, $sql);
		$nums=mysqli_num_rows($query);
		if($nums>0){
			$data=mysqli_fetch_array($query);
			$_SESSION['dangnhap']=$data['hoten'];
			$_SESSION['role']=$data['role'];
			$_SESSION['user']=$data['id'];
			if($data['role'] == 'admin'){
				header('location:modules/admin/index.php');
			}else{
				header('location:index.php');
			}
		}else{
			header('location:index.php?content=dangnhap');
		}
	}
?>

<div style="margin-top: 20px; margin-left: 30px; padding-bottom: 20px; min-height: 700px;">
	<form action="" method="post">
		<div class="info-customer-cart" style="margin-left: 300px;">
			<h2 style="margin-bottom: 15px; padding: 10px; color: #CC1D5D;">ĐĂNG NHẬP</h2>
			<div style="overflow: hidden;">
				<table cellspacing="4" style="float: left;">
					<tr><td><b>Tên tài khoản:</b></td></tr>
					<tr><td class="tr-cart"><input type="text" name="username"></td></tr>
					<tr><td><b>Mật khẩu:</b></td></tr>
					<tr><td class="tr-cart"><input type="password" name="password"></td></tr>
				</table>
				<div class="register" style="padding-bottom: 20px; margin-left: -10px; border-width: 0px;">
					<input type="submit" name="dangnhap" value="ĐĂNG NHẬP">
				</div>
			</div>
		</div>
	</form>
</div>