<div class="topbar">
	<div class="container">
		<div class="container-left">
			<div id="time"></div>
		</div>
		<div class="container-right">
			<ul>
				<li>
					<?php 
						session_start();
						if(!isset($_SESSION['dangnhap'])){
					 ?>
					<a href="">THÀNH VIÊN</a>
					<ul class="sub-container">
						<li><a href="index.php?content=dangnhap">Đăng Nhập</a></li>
						<li><a href="index.php?content=dangky">Đăng Ký</a></li>
						<li><a href="">Quên mật khẩu</a></li>
					</ul>
					<?php }else{ ?>
					<a href=""><?php echo $_SESSION['dangnhap'] ?></a>
					<ul class="sub-container">
						<?php if($_SESSION['role'] == 'admin'){ ?>
						<li><a href="modules/admin/index.php">Trang quản trị</a></li>
						<?php } ?>
						<li><a href="#">Quản lý tài khoản</a></li>
						<li><a href="modules/dangxuat.php">Đăng Xuất</a></li>
					</ul>
					<?php } ?>
				</li>
				<li><a href="index.php?content=giohang">GIỎ HÀNG</a></li>
				<li><a href=""><img src="imgs/fb.png" alt=""></a></li>
				<li><a href=""><img src="imgs/google.png" alt=""></a></li>
				<li><a href=""><img src="imgs/twitter.png" alt=""></a></li>
			</ul>
		</div>
	</div>
</div>
<div class="header">
	<div class="container">
		<div class="container-left">
			<a href="index.php"><img src="imgs/logo.png" height="60px" width="auto" alt=""></a></div>
		<div class="container-right">
			<div>
				<b>Hotline</b>: <span style="color: red; font-weight: bold;">0904123123</span>
			</div>
			<div>
				<form action="modules/xuly.php" method="post">
					<input type="search" name="search" style="width: 300px; padding: 4px; margin-top: 4px;" placeholder="Bạn muốn tìm sản phẩm nào?">
				</form>
			</div>
		</div>
	</div>
</div>

<div class="menu">
	<ul>
		<li id="home-page"><a href="index.php">TRANG CHỦ</a></li>
		<li id="menu-sp">
			<a href="">SẢN PHẨM</a>
			<ul class="sub-container">
				<?php 
					include ('modules/config.php');
                    $sql = 'select * from hangsanxuat order by tenhang';
                    $query=mysqli_query($conn, $sql);
                    while($dong=mysqli_fetch_array($query)){
				 ?>
					<li><a href="index.php?content=sanpham&hangsx=<?php echo $dong['mahang'] ?>"><?php echo $dong['tenhang'] ?></a></li>
				<?php } ?>
			</ul>
		</li>
		<li><a href="">CHÍNH SÁCH CHUNG</a></li>
		<li><a href="">LIÊN HỆ</a></li>
		<li><a href="">THANH TOÁN</a></li>
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
	var x = document.getElementById('time');
	x.innerText = weekday[d.getDay()] + ', ngày ' + d.getDate() +'/' + (d.getMonth()+1) + '/' + d.getFullYear();
</script>