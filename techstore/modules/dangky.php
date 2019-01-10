<?php 
	if(isset($_SESSION['register'])){
		if($_SESSION['register'] == 'ok'){
			$_SESSION['register']='';
?>
		<script>swal("Thông Báo", "Đăng Ký Thành Công!", "success");</script>
<?php
		}else if($_SESSION['register'] == 'failed'){
			$_SESSION['register']='';
?>
		<script>swal("Thông Báo", "Nhập Lại Mật Khẩu Không Đúng!", "warning");</script>
<?php
		}else if($_SESSION['register']=='existence'){
			$_SESSION['register']='';
?>
		<script>swal("Thông Báo", "Tài Khoản Đã Tồn Tại!", "warning");</script>
<?php
		}
	}
 ?>

<div style="margin-top: 20px; margin-left: 30px; overflow: hidden; padding-bottom: 20px;">
	<form action="modules/xuly.php" method="post">
		<div class="info-customer-cart" style="margin-left: 50px;">
			<h3 style="margin-bottom: 15px; color: #CC1D5D; padding: 10px 0px 0px 14px;">THÔNG TIN TÀI KHOẢN</h3>
			<div style="overflow: hidden;">
				<table cellspacing="4" style="float: left;">
					<tr><td><b>Tên tài khoản*:</b></td></tr>
					<tr><td class="tr-cart"><input type="text" name="username"></td></tr>
					<tr><td><b>Mật khẩu*:</b></td></tr>
					<tr><td class="tr-cart"><input type="password" name="password"></td></tr>
					<tr><td><b>Nhập lại mật khẩu*:</b></td></tr>
					<tr><td class="tr-cart"><input type="password" name="re_password"></td></tr>
					<tr><td><b>Địa chỉ Email*</b></td></tr>
					<tr><td class="tr-cart"><input type="email" name="email"></td></tr>
				</table>
			</div>
		</div>
		<div style="float: right; margin-right: 75px;">
			<div class="info-customer-cart">
				<h3 style="margin-bottom: 15px; color: #CC1D5D; padding: 10px 0px 0px 14px;">THÔNG TIN NGƯỜI DÙNG</h3>
				<div action="" style="overflow: hidden;">
					<table cellspacing="4" style="float: left;">
						<tr><td><b>Họ và Tên*:</b></td></tr>
						<tr><td class="tr-cart"><input type="text" name="hoten"></td></tr>
						<tr><td><b>Địa Chỉ*:</b></td></tr>
						<tr><td class="tr-cart"><input type="text" name="diachi"></td></tr>
						<tr><td><b>Số điện thoại*</b>:</td></tr>
						<tr><td class="tr-cart"><input type="text" name="sdt"></td></tr>
					</table>
				</div>
			</div>
		</div>
		<div class="register" style="padding-top: 20px;">
			<input type="submit" name="dangky" value="ĐĂNG KÝ TÀI KHOẢN">
		</div>
	</form>
</div>
