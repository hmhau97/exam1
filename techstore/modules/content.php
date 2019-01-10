
<?php
	if(isset($_GET['content'])){
		$tam=$_GET['content'];
	}else{
		$tam='';
	}
	if($tam=='chitietsanpham'){
		include('chitietsanpham.php');
	}else if($tam=='dangky'){
		include('dangky.php');
	}else if(isset($_POST['search'])){
		include('search.php');
	}else if($tam=='dangnhap'){
		include('dangnhap.php');
	}else if($tam=='giohang'){
		include('cart.php');
	}else if($tam=='sanpham'){
		include('sanpham.php');
	}else if($tam=='tim'){
		include('dstim.php');
	} else{
		include('trangchu.php');
	};
	
?>
