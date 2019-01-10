<?php
	if(isset($_GET['manage'])){
		$tam=$_GET['manage'];
	}else{
		$tam='';
	}
	if($tam=='quanlyhangsp'){
		include('quanlyhangsp.php');
	}else if($tam=='quanlydongsp'){
		include('quanlydongsp.php');
	}else if($tam == 'quanlysanpham'){
		include ('quanlysanpham.php');
	}else if($tam == 'quanlygiohang'){
		include ('quanlygiohang.php');
	} else{
		include('adminpage.php');
	};
	
?>
