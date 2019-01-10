<?php 
	if(isset($_SESSION['user'])){
		$id = $_SESSION['user'];
	}else{
		$id='';
	}

	if(isset($_SESSION['ordered']) && $_SESSION['ordered']=='ok'){
		$_SESSION['ordered']='';
		?> 
			<script>swal("Thông Báo","Đặt Hàng Thành Công!","success")</script>
		<?php
	}
 ?>
<div style="margin-top: 20px; margin-left: 30px;padding-bottom: 20px; overflow: hidden;">
	<div class="info-cart">
		<div style="padding: 10px;">
			<h3>THÔNG TIN ĐƠN HÀNG</h3>
		</div>
		<div class="item-cart">
			<table>
				 <?php 
					
					if(isset($_GET['them'])){	
						$_SESSION['cart_'.$_GET['them']]+=1;
						header('Location: '.$_SERVER['PHP_SELF'].'?content=giohang');
						die;
					?>
						
					<?php }
					//tru  san pham
					if(isset($_GET['tru'])){
						$_SESSION['cart_'.$_GET['tru']]--;
						header('Location: '.$_SERVER['PHP_SELF'].'?content=giohang');
						die;
					?>
						
					<?php }
					//xoa  san pham
					if(isset($_GET['xoa'])){
						$_SESSION['cart_'.$_GET['xoa']]=0;
						header('Location: '.$_SERVER['PHP_SELF'].'?content=giohang');
						die;
					?>
						
					<?php }
					
					$tongtien=0;
					$thanhtien=0; 
					foreach($_SESSION as $name => $value){
						if($value>0){
							if(substr($name,0,5)=='cart_'){
								$masp=substr($name,5);
								$sql="select * from sanpham where masp='$masp'";
								$result = $conn->query($sql);	//$query=mysqli_query($conn, $sql);
								while($dong=$result->fetch_assoc()){		//while($dong=mysqli_fetch_array($query)){
									$tongtien=$dong['gia']*$value;
				 ?>
				<tr>
					<td>
						<h4><?php echo $dong['tensp'] ?></h4>
						<div style="padding: 10px 0px; width: 300px;">
							<p>Số lượng: <span class="quantity"><?php echo $value ?></span> x <span class="quantity"><?php echo toString($dong['gia']) ?></span></p>
						</div>
						<div>
							<a href="index.php?content=giohang&them=<?php echo $masp ?>" class="plus-item">+</a>
							<a href="index.php?content=giohang&tru=<?php echo $masp ?>" class="minus-item">-</a>
							<a href="index.php?content=giohang&xoa=<?php echo $masp ?>" class="delete-item">Xóa</a>
						</div>
					</td>
					<td style="padding-left: 40px;">
						<img src="imgs/<?php echo $dong['hinhanh'] ?>" style="width: 75px; height: 75px;" alt="">
					</td>
				</tr>
				<?php 
									$thanhtien+=$tongtien;
								}; 
							}; 
						};
					} 
				?>
			</table>
		</div>
		<div style="padding: 15px 0px 15px 10px;">
			<?php 
				if($thanhtien==0){
			?>
					<p style="font-weight: bold; font-size: 18px;">Giỏ hàng trống!</p>
				<?php } else {  
				?>
					<p style="font-weight: bold; font-size: 18px;">Tổng tiền: <span class="quantity"><?php echo toString($thanhtien) ?></span></p>
				<?php } ?>
		</div>
	</div>

	<form action="modules/admin/quanlygiohang/insert.php" method="post" style="float: left;">
		<div class="info-customer-cart" >
			<h3 style="margin-bottom: 15px; color: #CC1D5D; padding: 10px 0px 0px 14px;">THÔNG TIN NGƯỜI NHẬN HÀNG</h3>
			<div style="overflow: hidden;">
				<table cellspacing="4">
					<?php 
						$sql="select * from users where id='$id'";
						$query=mysqli_query($conn, $sql);
                    	$dong=mysqli_fetch_array($query);
					 ?>
					<tr><td>Họ & tên</td></tr>
					<tr><td class="tr-cart"><input type="text" name="hoten" value="<?php echo $dong['hoten'] ?>" ></td></tr>
					<tr><td>Địa Chỉ</td></tr>
					<tr><td class="tr-cart"><input type="text" name="diachi" value="<?php echo $dong['diachi'] ?>"></td></tr>
					<tr><td>Số điện thoại</td></tr>
					<tr><td class="tr-cart"><input type="text" name="sdt" value="<?php echo $dong['sdt'] ?>"></td></tr>
					<tr><td>Email</td></tr>
					<tr><td class="tr-cart"><input type="email" name="email" value="<?php echo $dong['email'] ?>"></td></tr>
					<tr><td>Ghi chú</td></tr>
					<tr><td class="tr-cart"><textarea name="chuthich"></textarea></td></tr>
					 <tr><td><input type="hidden" name="id" value="<?php echo $id ?>"></td></tr>
					<tr>
						<td><input type="submit" value="ĐẶT HÀNG" style="width: 30%; margin-left: 30%; cursor: pointer; background-color: #E31037; color: #fff;"></td>
					</tr>
				</table>
			</div>
		</div>
	</form>
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