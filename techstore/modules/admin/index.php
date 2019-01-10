<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tech Store</title>
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
	<link rel="stylesheet" type="text/css" href="../../css/font-awesome.min.css">
	<script src="../../js/jquery-3.2.1.min.js"></script>
</head>
<body>
	<?php
		session_start();
		if(!isset($_SESSION['role'])){
			header('location:../../index.php?content=dangnhap');
		}else{
			if($_SESSION['role']!='admin'){
				header('location:../../index.php');
			}
		}
	?>

	<div class="wrapper">
		<?php 
			include('../config.php');
			include('header.php');
			include('content.php');
			include('footer.php');
		 ?>
	</div>
</body>
</html>