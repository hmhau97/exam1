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

	if(isset($_GET['page'])){
	 	$trang=$_GET['page'];
	 }else{
			$trang='';
		}
	 if($trang==''||$trang=='1'){
		 $trang1=0;
	 }else{
		 $trang1=($trang*10)-10; // ($trang-1)*10
	 }
 ?>
<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>
<div style="margin-top: 20px; margin-left: 30px;padding-bottom: 20px; min-height: 700px;">
	
	<div class="dialog-form" id="insert-sanpham-diaglog">
        <h3 style="margin-left: 250px;">THÊM SẢN PHẨM</h3>
    	<form action="quanlysanpham/insert.php" method="post" enctype="multipart/form-data">
    		<table>
				<tr>
					<td class=".title">Tên SP:</td>
					<td><input type="text" name="tensp" value=""></td>
				</tr>
				<tr>
					<td class=".title">Giá:</td>
					<td><input type="text" name="gia" value=""></td>
				</tr>
				<tr>
					<td class=".title">Tóm Tắt:</td>
					<td><textarea name="tomtat"></textarea></td>
				</tr>
				<tr>
					<td class=".title">Mô tả:</td>
					<td><textarea name="mota" id="" cols="30" rows="10"></textarea></td>
				</tr>
				<tr>
					<td class=".title">Core:</td>
					<td>
						<select name="core" class="selct-tag-dialog">
							<option value="Core i3">Core i3</option>
							<option value="Core i5">Core i5</option>
							<option value="Core i7">Core i7</option>
						</select>
					</td>
				</tr>
				<tr>
					<td class=".title">Ram:</td>
					<td>
						<select name="ram" class="selct-tag-dialog">
							<option value="4GB">4GB</option>
							<option value="8GB">8GB</option>
							<option value="16GB">16GB</option>
						</select>
					</td>
				</tr>
				<tr>
					<td class=".title">Màn Hình:</td>
					<td>
						<select name="manhinh" class="selct-tag-dialog">
							<option value="14 INCH">13.3 INCH</option>
							<option value="14 INCH">14 INCH</option>
							<option value="15.6 INCH">15.6 INCH</option>
							<option value="17.3 INCH">17.3 INCH</option>
						</select>
					</td>
				</tr>
				<tr>
					<td class=".title">Bảo Hành:</td>
					<td><input type="text" name="baohanh" value="" placeholder=""></td>
				</tr>
				<tr>
					<td class=".title">Tình Trạng:</td>
					<td>
						<select name="tinhtrang" class="selct-tag-dialog">
							<option value="Còn Hàng">Còn Hàng</option>
							<option value="Hết Hàng">Hết Hàng</option>
							<option value="Mới Ra Mắt">Mới Ra Mắt</option>
						</select>
					</td>
				</tr>
				<tr>
					<td class=".title">Ảnh:</td>
					<td><input type="file" name="hinhanh"></td>
				</tr>
				<tr>
					<td class=".title">Chuyên dụng:</td>
					<td>
						<select name="chuyendung" class="selct-tag-dialog">
							<option value="Văn phòng, học tập cơ bản">Văn phòng, học tập cơ bản</option>
							<option value="Doanh nhân">Doanh nhân</option>
							<option value="Gaming">Gaming</option>
						</select>
					</td>
				</tr>
				<tr>
					<td class=".title">Dòng SP:</td>
					<td>
						<select name="madong" class="selct-tag-dialog">
							<?php 
								
								$sql3 = "select madong, tendong, tenhang from dongsanpham d join hangsanxuat h on d.mahang=h.mahang order by tenhang";
								$result2=mysqli_query($conn, $sql3);
								while($dong3=mysqli_fetch_array($result2)){
							?>
								<option value="<?php echo $dong3['madong'] ?>"><?php echo $dong3['tenhang'] ?> <?php echo $dong3['tendong'] ?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="" value="THÊM"><input type="button" class="close-button" value="HỦY"></td>
				</tr>
    		</table>
    	</form>
    </div>

    <?php 
        if(isset($_GET['masp'])){
            $masp = $_GET['masp'];
            $sql = "select * from sanpham where masp='$masp'";
            $query=mysqli_query($conn, $sql);
            $dong=mysqli_fetch_array($query);
        }
     ?>

    <div class="dialog-form" id="update-sanpham-diaglog" style=" overflow: scroll; max-height: 500px;">
        <h3 style="margin-left: 250px;">CẬP NHẬT SẢN PHẨM</h3>
    	<form action="quanlysanpham/update.php" method="post" enctype="multipart/form-data">
    		<table>
    			<tr>
    				<td class=".title">ID:</td>
					<td><input type="hidden" name="masp" value="<?php echo $dong['masp'] ?>"><label><?php echo $dong['masp'] ?></label></td>
    			</tr>
				<tr>
					<td class=".title">Tên SP:</td>
					<td><input type="text" name="tensp" value="<?php echo $dong['tensp'] ?>" placeholder=""></td>
				</tr>
				<tr>
					<td class=".title">Giá:</td>
					<td><input type="text" name="gia" value="<?php echo $dong['gia'] ?>" placeholder=""></td>
				</tr>
				<tr>
					<td class=".title">Tóm Tắt:</td>
					<td><textarea name="tomtat"><?php echo $dong['tomtat'] ?></textarea></td>
				</tr>
				<tr>
					<td class=".title">Mô tả:</td>
					<td><textarea name="mota" id="" cols="30" rows="10"><?php echo $dong['mota'] ?></textarea></td>
				</tr>
				<tr>
					<td class=".title">Core:</td>
					<td>
						<select name="core" class="selct-tag-dialog">
							<?php 
								if($dong['core']=='Core i3'){
							 ?>
									<option selected="selected" value="Core i3">Core i3</option>
								<?php }else{ ?>
									<option value="Core i3">Core i3</option>
								<?php }; 
								if($dong['core']=='Core i5'){
								?>
									<option selected="selected" value="Core i5">Core i5</option>
								<?php } else { ?>
									<option value="Core i5">Core i5</option>
								<?php };
								if($dong['core']=='Core i7'){
								?>
									<option selected="selected" value="Core i7">Core i7</option>
								<?php } else { ?>
									<option value="Core i7">Core i7</option>
								<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td class=".title">Ram:</td>
					<td>
						<select name="ram" class="selct-tag-dialog">
							<?php 
								if($dong['ram']=='4GB'){
							 ?>
									<option selected="selected" value="4GB">4GB</option>
								<?php }else{ ?>
									<option value="4GB">4GB</option>
								<?php }; 
								if($dong['ram']=='8GB'){
								?>
									<option selected="selected" value="8GB">8GB</option>
								<?php } else { ?>
									<option value="8GB">8GB</option>
								<?php };
								if($dong['ram']=='16GB'){
								?>
									<option selected="selected" value="16GB">16GB</option>
								<?php } else { ?>
									<option value="16GB">16GB</option>
								<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td class=".title">Màn Hình:</td>
					<td>
						<select name="manhinh" class="selct-tag-dialog">
								<?php 
								if($dong['manhinh']=='13.3 INCH'){
							 	?>
									<option selected="selected" value="13.3 INCH">13.3 INCH</option>
								<?php }else{ ?>
									<option value="13.3 INCH">13.3 INCH</option>
								<?php }; 
								if($dong['manhinh']=='14 INCH'){
							 	?>
									<option selected="selected" value="14 INCH">14 INCH</option>
								<?php }else{ ?>
									<option value="14 INCH">14 INCH</option>
								<?php }; 
								if($dong['manhinh']=='15.6 INCH'){
								?>
									<option selected="selected" value="15.6 INCH">15.6 INCH</option>
								<?php } else { ?>
									<option value="15.6 INCH">15.6 INCH</option>
								<?php };
								if($dong['manhinh']=='17.3 INCH'){
								?>
									<option selected="selected" value="17.3 INCH">17.3 INCH</option>
								<?php } else { ?>
									<option value="17.3 INCH">17.3 INCH</option>
								<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td class=".title">Bảo Hành:</td>
					<td><input type="text" name="baohanh" value="<?php echo $dong['baohanh'] ?>" placeholder=""></td>
				</tr>
				<tr>
					<td class=".title">Tình Trạng:</td>
					<td>
						<select name="tinhtrang" class="selct-tag-dialog">
							<?php 
								if($dong['tinhtrang']=='Còn Hàng'){
							 ?>
									<option selected="selected" value="Còn Hàng">Còn Hàng</option>
								<?php }else{ ?>
									<option value="Còn Hàng">Còn Hàng</option>
								<?php }; 
								if($dong['tinhtrang']=='Hết Hàng'){
								?>
									<option selected="selected" value="Hết Hàng">Hết Hàng</option>
								<?php } else { ?>
									<option value="Hết Hàng">Hết Hàng</option>
								<?php };
								if($dong['tinhtrang']=='Mới Ra Mắt'){
								?>
									<option selected="selected" value="Mới Ra Mắt">Mới Ra Mắt</option>
								<?php } else { ?>
									<option value="Mới Ra Mắt">Mới Ra Mắt</option>
								<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td class=".title">Ảnh:</td>
					<td><input type="file" name="hinhanh"><img src="../../imgs/<?php echo $dong['hinhanh'] ?>" style="width: 30px; height: 30px; "></td>
				</tr>
				<tr>
					<td class=".title">Chuyên dụng:</td>
					<td>
						<select name="chuyendung" class="selct-tag-dialog">
							<?php 
								if($dong['chuyendung']=='Văn phòng, học tập cơ bản'){
							 ?>
									<option selected="selected" value="Văn phòng, học tập cơ bản">Văn phòng, học tập cơ bản</option>
								<?php }else{ ?>
									<option value="Văn phòng, học tập cơ bản">Văn phòng, học tập cơ bản</option>
								<?php }; 
								if($dong['chuyendung']=='Doanh nhân'){
								?>
									<option selected="selected" value="Doanh nhân">Doanh nhân</option>
								<?php } else { ?>
									<option value="Doanh nhân">Doanh nhân</option>
								<?php };
								if($dong['chuyendung']=='Gaming'){
								 ?>
								 	<option selected="selected" value="Gaming">Gaming</option>
								 <?php } else { ?>
								 	<option value="Gaming">Gaming</option>
								 <?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td class=".title">Dòng SP:</td>
					<td>
						<select name="madong" class="selct-tag-dialog">
							<?php 
								$sql2="select madong, tendong, tenhang from dongsanpham d join hangsanxuat h on d.mahang=h.mahang order by tenhang";
	    						$result2=mysqli_query($conn, $sql2);
	    						while($dong2=mysqli_fetch_array($result2)){
	    							if($dong2['madong']==$dong['madong']){
							 ?>
								<option selected="selected" value="<?php echo $dong2['madong'] ?>"><?php echo $dong2['tenhang'] ?> <?php echo $dong2['tendong'] ?></option>
							<?php }else { ?>
								<option value="<?php echo $dong2['madong'] ?>"><?php echo $dong2['tenhang'] ?> <?php echo $dong2['tendong'] ?></option>
							<?php }} ?>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="" value="SỬA"><input type="button" class="close-button" value="HỦY"></td>
				</tr>
    		</table>
    	</form>
    </div>

	<div style="margin-top: 20px;">
        <p style="font-weight: bold; font-size: 18px;">QUẢN LÝ SẢN PHẨM</p>
        <div style="position: absolute; margin-left: 270px; margin-top: -28px;">
			<a href="index.php?manage=quanlysanpham&action=insert"><img src="../../imgs/plus-item.png" alt=""></a>
		</div>
        <div class="content-1-management">
			<table border="1">
				<thead>
					<td>ID</td>
					<td>Tên Sản Phẩm</td>
					<td>Giá</td>
					<td>Core</td>
					<td>Ram</td>
					<td>Manhinh</td>
					<td>Bảo hành</td>
					<td>Tình trạng</td>
					<td>Chuyên dụng</td>
					<td>Ảnh</td>
					<td>Hãng</td>
					<td>Dòng Sản Phẩm</td>
					<td>Quản Lý</td>
				</thead>
				<?php 
                    include ('../config.php');
                    $sql = "select * from sanpham limit $trang1,10";
                    $query=mysqli_query($conn, $sql);
                    while($dong=mysqli_fetch_array($query)){
                 ?>
				<tr>
					<td><?php echo $dong['masp'] ?></td>
					<td style="width: 150px;"><?php echo $dong['tensp'] ?></td>
					<td><?php echo toString($dong['gia']) ?></td>
					<td><?php echo $dong['core'] ?></td>
					<td><?php echo $dong['ram'] ?></td>
					<td><?php echo $dong['manhinh'] ?></td>
					<td><?php echo $dong['baohanh'] ?></td>
					<td><?php echo $dong['tinhtrang'] ?></td>
					<td><?php echo $dong['chuyendung'] ?></td>
					<td>
    					<img src="../../imgs/<?php echo $dong['hinhanh'] ?>" style="width: 40px; height: 40px; margin: 0px 5px;">
					</td>
					<?php 
						$madong_sp=$dong['madong'];
						$sql = "select madong, tendong, d.mahang, tenhang from dongsanpham d join hangsanxuat h on d.mahang=h.mahang where madong=$madong_sp";
						$result=mysqli_query($conn, $sql);
						$dong2=mysqli_fetch_array($result);
					?>
					<td style="width: 65px;"><?php echo $dong2['tenhang'] ?></td>
					<td style="width: 90px;"><input type="hidden" name="madong" value="<?php echo $dong['madong'] ?>"><?php echo $dong2['tendong'] ?></td>
					<td>
						<a href="index.php?manage=quanlysanpham&action=update&masp=<?php echo $dong['masp'] ?>">
							<img src="../../imgs/edit.png" alt=""></a> &nbsp;&nbsp;&nbsp;&nbsp;
						<a href="quanlysanpham/delete.php?masp=<?php echo $dong['masp'] ?>"><img src="../../imgs/delete.png" alt=""></a>
					</td>
				</tr>
				<?php 
                    }
                 ?>
			</table>
        </div>
    </div>

    <p style="clear:both; width: 40%; margin-left: 30%; text-align: center; font-size: 18px; margin-top: 10px; margin-bottom: 10px;">     	
	 	<?php
		//dem so trang
			
			$dong_cou=mysqli_query($conn, "select * from sanpham");
		
			$cou=mysqli_num_rows($dong_cou);
			
			$a=$cou/10;
			for($b=0;$b<$a;$b++){
				$path = explode("&page", $_SERVER["QUERY_STRING"]);

		?>		
				<a href="index.php?<?php echo $path[0] ?>&page=<?php echo $b+1 ?>" style="color: blue; border: 1px solid #333; padding: 3px;"><?php echo $b+1 ?></a>
		<?php

			}
		?>
	</p>
</div>

<script src="../../js/jquery-3.2.1.min.js"></script>
<script>
	    $(window).on('load', function() {
	    	
	        var search = $(location).attr('search');
	        var mDo = parseInt(search.indexOf('action'));
	        if(mDo<0) return;
	        var rest = search.substr(mDo, search.length)
	        var mAnd = parseInt(rest.indexOf('&'));
	        if(mAnd<0) mAnd = rest.length;
	    	if(mAnd>-1){
	    		var func =  rest.substr(7, mAnd - 7);
	    		if(func == 'insert'){
	    			$('#insert-sanpham-diaglog').fadeIn(300);
	    			$('body').append('<div id="over">');
	    			$('#over').fadeIn(300);
	    		}else if(func = 'update'){
	    			$('#update-sanpham-diaglog').fadeIn(300);
	    			$('body').append('<div id="over">');
	    			$('#over').fadeIn(300);
	    		}
	    	}
	 	});
 	
 	// khi click đóng hộp thoại
	 $('.close-button').click(function() {
	       $('#over, #update-sanpham-diaglog, #insert-sanpham-diaglog').fadeOut(300 , function() {
	           $('#over').remove();
	           window.location='index.php?manage=quanlysanpham'
	       });

	      return false;
	 });
</script>
