<div class="topbar">
	<div class="container">
		<div class="container-left">

		</div>
		<div class="container-right">
			<ul>
				<li>
					<?php 

						if(isset($_SESSION['dangnhap'])){
					 ?>
					
						<a href=""><?php echo $_SESSION['dangnhap'] ?></a>
						<ul class="sub-container">
							<li><a href="index.php?page=dangnhap">Quản lý tài khoản</a></li>
							<li><a href="../dangxuat.php">Đăng Xuất</a></li>
						</ul>
					<?php } ?>
				</li>
				<li><a href=""><img src="../../imgs/fb.png" alt=""></a></li>
				<li><a href=""><img src="../../imgs/google.png" alt=""></a></li>
				<li><a href=""><img src="../../imgs/twitter.png" alt=""></a></li>
			</ul>
		</div>
	</div>
</div>
<div class="header">
	<div class="container">
		<div class="container-left">
			<a href="../../index.php"><img src="../../imgs/logo.png" height="60px" width="auto" alt=""></a></div>
		<div class="container-right">
			<div>
				<b>Hotline</b>: <span style="color: red; font-weight: bold;">0904123123</span>
			</div>
			
		</div>
	</div>
</div>

<div class="menu">
	<ul>
		<li id="home-page"><a href="index.php">TRANG CHỦ</a></li>
		<li><a href="index.php?manage=quanlyhangsp">QUẢN LÝ HÃNG</a></li>
		<li><a href="index.php?manage=quanlydongsp">QUẢN LÝ DÒNG SẢN PHẨM</a></li>
		<li><a href="index.php?manage=quanlysanpham">QUẢN LÝ SẢN PHẨM</a></li>
		<li><a href="index.php?manage=quanlygiohang">QUẢN LÝ GIỎ HÀNG</a></li>
		<li><a href="">QUẢN LÝ NGƯỜI DÙNG</a></li>
	</ul>
	<hr>
</div>


<script type="text/javascript">
	var weekday = new Array(7);
	weekday[0] =  "Chủ Nhật";
	weekday[1] = "Thứ Hai";
	weekday[2] = "Thứ Ba";
	weekday[3] = "Thứ Tư";
	weekday[4] = "Thứ Năm";
	weekday[5] = "Thứ Sáu";
	weekday[6] = "Thứ Bảy";
	var d = new Date();
	var x = document.getElementsByClassName('container-left');
	x[0].innerText = weekday[d.getDay()] + ', ngày ' + d.getDate() +'/' + (d.getMonth()+1) + '/' + d.getFullYear();
</script>