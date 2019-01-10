<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tech Store</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/jquery.slides.min.js"></script>
	<script src="js/sweetalert.min.js"></script>
</head>
<body>
	<div class="wrapper">
		<?php 
			include('modules/config.php');
			include('modules/header.php');
			//include('modules/trangchu.php');
			//include('modules/sanpham.php');
			//include('modules/chitietsanpham.php')
			//include('modules/cart.php')
			//include('modules/dangky.php');
			//include('modules/dangnhap.php');
			include('modules/content.php');
			include('modules/footer.php');
		 ?>
	</div>
</body>
</html>