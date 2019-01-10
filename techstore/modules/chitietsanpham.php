 <?php 
    include ('modules/config.php');
    $masp = $_GET['masp'];
    $sql = "select * from sanpham s join dongsanpham d on s.madong=d.madong join hangsanxuat h on d.mahang=h.mahang where s.masp = '$masp'";
    $query=mysqli_query($conn, $sql);
    $dong=mysqli_fetch_array($query);
    if(isset($_SESSION['action_add']) && $_SESSION['action_add']!=''){
    	$_SESSION['action_add']='';
 ?>
 	<script>swal("Thông Báo", "Đã thêm sản phẩm vào giỏ hàng!", "success");</script>
 	<?php } ?>

<div style="margin-top: 20px; margin-left: 30px; padding-bottom: 50px; min-height: 650px;">
	<div class="product-detail">
		<div style="display: inline-table; float: left; border: 1px solid #BBC2C4;">
			<img src="imgs/<?php echo $dong['hinhanh'] ?>" alt="">
		</div>
		<div id="info">
			<h3><?php echo $dong['tensp'] ?></h3>
			<div id="price"><?php echo toString($dong['gia']) ?></div>
			<hr style="margin-left: 0px; height: 0.5px; width: 100%; color: #BBC2C4">
			<div style="margin-top: 10px;">
				<h4>THÔNG TIN SẢN PHẨM</h4>
				<p style="padding: 7px;">Tình Trạng: <?php echo $dong['tinhtrang'] ?></p>
				<p style="padding: 7px;">Bảo hành: <?php echo $dong['baohanh'] ?></p>
				<p style="padding: 7px;">Chuyên dụng: <?php echo $dong['chuyendung'] ?></p>
			</div>
			<div style="margin-top: 10px;line-height: 30px;">
				<h4>MÔ TẢ SẢN PHẨM</h4>
				<p style="margin-top: 10px; padding-left: 10px;">
					<?php echo $dong['mota'] ?>
				</p>
			</div>
			<hr style="margin-left: 0px; height: 0.5px; width: 100%; color: #BBC2C4">
			<div>
				<form action="modules/xuly.php" method="post" style="display: inline-table;">
					<input type="hidden" name="masp" value="<?php echo $masp ?>">
					<input type="submit" name="buy" value="MUA NGAY">
				</form>
				<form action="modules/xuly.php" method="post" style="display: inline-table;">
					<input type="hidden" name="masp" value="<?php echo $masp ?>">
					<input type="submit" name="buy" value="THÊM VÀO GIỎ HÀNG">
				</form>
			</div>
		</div>
	</div>
</div>
<?php 
	function toString($price)
	{
		$out = str_split(strrev((string)$price), 3);
		$st='';
		for($i=0;$i<count($out);$i++){
			if($i!=count($out)-1){
				$st = '.'.strrev($out[$i]).$st;
			}else{
				$st = strrev($out[$i]).$st.' đ';
			}
		}
		return $st;
	}
 ?>