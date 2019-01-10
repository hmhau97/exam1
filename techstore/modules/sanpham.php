 <?php 
 	if(isset($_GET['page'])){
	 	$trang=$_GET['page'];
	 }else{
			$trang='';
		}
	 if($trang==''||$trang=='1'){
		 $trang1=0;
	 }else{
		 $trang1=($trang*12)-12;
	 }
    include ('modules/config.php');
    $mahang = $_GET['hangsx'];
    $sql = "select * from dongsanpham d join hangsanxuat h on d.mahang=h.mahang where h.mahang='$mahang'";
    $query=mysqli_query($conn, $sql);
    $dong=mysqli_fetch_array($query);
 ?>

<div style="margin-top: 20px; margin-left: 30px; margin-right: 25px;min-height: 700px; padding-bottom: 30px;">
	<div style="width: 100%;  height: 170px;position: relative;">
		<div style="width: 100%;height: 100%; background-image: url(imgs/<?php echo $dong['anh_cover'] ?>); background-position: center; position: absolute;"></div>
		<div style="width: 60%;height: 100%; z-index: 4; position: absolute; background-color: #fff; opacity: 0.8;"></div>
		<div style=" width: 30px; height: 30px; margin-left: 90%;margin-top: 10px; position: absolute; z-index: 4;">
			<img src="imgs/<?php echo $dong['anh_icon'] ?>" alt="" style="width: 30px; height: 30px;">
		</div>
		<div style="width: 60%;height: 100%; z-index: 4; position: absolute; font-size: 16px; padding: 15px 10px;">
			<?php echo $dong['gioithieu'] ?>
		</div>
	</div>

	<div class="filter">
		<ul>
			<li class="menu-filter">
				<p>MÀN HÌNH</p>
				<ul style="width: 123px;">
					<?php
						if(isset($_GET['madong'])){
							$madong= "&madong=".$_GET['madong']."";
						}else{
							$madong='';
						}
					 ?>
					<li><a href="index.php?content=sanpham&hangsx=<?php echo $mahang.$madong ?>&manhinh=13.3">13.3 INCH</a></li>
					<li><a href="index.php?content=sanpham&hangsx=<?php echo $mahang.$madong ?>&manhinh=14">14 INCH</a></li>
					<li><a href="index.php?content=sanpham&hangsx=<?php echo $mahang.$madong ?>&manhinh=15.6">15.6 INCH</a></li>
					<li><a href="index.php?content=sanpham&hangsx=<?php echo $mahang.$madong ?>&manhinh=17.3">17.3 INCH</a></li>
				</ul>
			</li>
			<li class="menu-filter">
				<p style="width: 100px; text-align: center;">Ram</p>
				<ul>
					<?php
						if(isset($_GET['madong'])){
							$madong= "&madong=".$_GET['madong']."";
						}else{
							$madong='';
						}
					 ?>
					<li><a href="index.php?content=sanpham&hangsx=<?php echo $mahang.$madong ?>&ram=4GB">4GB</a></li>
					<li><a href="index.php?content=sanpham&hangsx=<?php echo $mahang.$madong ?>&ram=8GB">8GB</a></li>
					<li><a href="index.php?content=sanpham&hangsx=<?php echo $mahang.$madong ?>&ram=16GB">16GB</a></li>
				</ul>
			</li>
			<li class="menu-filter">
				<p style="width: 100px;text-align: center;">Core</p>
				<ul>
					<?php
						if(isset($_GET['madong'])){
							$madong= "&madong=".$_GET['madong']."";
						}else{
							$madong='';
						}
					 ?>
					<li><a href="index.php?content=sanpham&hangsx=<?php echo $mahang.$madong ?>&core=i3">CORE I3</a></li>
					<li><a href="index.php?content=sanpham&hangsx=<?php echo $mahang.$madong ?>&core=i5">CORE I5</a></li>
					<li><a href="index.php?content=sanpham&hangsx=<?php echo $mahang.$madong ?>&core=i7">CORE I7</a></li>
				</ul>
			</li>
		</ul>
	</div>

	<div class="search-info">
		<ul>
			<li><b>Xem Theo:</b></li>
			<?php 
				if(isset($_GET['manhinh'])){
					$manhinh = '&manhinh='.$_GET['manhinh'];
				}else{
					$manhinh='';
				}
				if(isset($_GET['ram'])){
					$ram = '&ram='.$_GET['ram'];
				}else{
					$ram='';
				}
				if(isset($_GET['core'])){
					$core = '&core='.$_GET['core'];
				}else{
					$core='';
				}
				if(isset($_GET['madong'])){
					$madong= "&madong=".$_GET['madong'];
				}else{
					$madong='';
				}
			 ?>
			<li><a href="index.php?content=sanpham&hangsx=<?php echo $mahang.$madong.$manhinh.$ram.$core ?>&sort=desc">Giá cao nhất</a></li>
			<li><a href="index.php?content=sanpham&hangsx=<?php echo $mahang.$madong.$manhinh.$ram.$core ?>&sort=asc">Giá thấp nhất</a></li>
		</ul>

	</div>

	<hr style="margin-left: 0px; margin-right: 0px;margin-top: 15px;">
	<div>
		<div class="list-product-item">
	        <div id="first">
	            <ul>
	                <li style="margin-left: 0px;"><a href="index.php?content=sanpham&hangsx=<?php echo $mahang ?>" style="font-weight: bold; font-size: 18px;"><?php echo $dong['tenhang'] ?></a></li>
	                <?php 
	                	$sql2 = "select * from dongsanpham d join hangsanxuat h on d.mahang=h.mahang where h.mahang='$mahang'";
					    $query2=mysqli_query($conn, $sql);
	                	while($dong2=mysqli_fetch_array($query2)){
	                 ?>
	                	<li><a href="index.php?content=sanpham&hangsx=<?php echo $mahang ?>&madong=<?php echo $dong2['madong'] ?>"><?php echo $dong2['tendong'] ?></a></li>
					<?php } ?>
	            </ul>
	        </div>
	        <div class="product">
	            <ul>
	            	<?php 
	            		if(isset($_GET['madong'])){
							$madong= "and d.madong='".$_GET['madong']."'";
						}else{
							$madong='';
						}

						if(isset($_GET['core'])){
							$core= "and core='Core ".$_GET['core']."'";
						}else{
							$core='';
						}

						if(isset($_GET['ram'])){
							$ram= "and ram='".$_GET['ram']."'";
						}else{
							$ram='';
						}

						if(isset($_GET['manhinh'])){
							$manhinh= "and manhinh='".$_GET['manhinh']." INCH'";
						}else{
							$manhinh='';
						}	            		

	            		if(isset($_GET['sort'])){
	            			$sort=$_GET['sort'];
	            		}else{
	            			$sort='';
	            		}
	                	if($sort == 'desc'){
	                		$sql3="select * from sanpham s join dongsanpham d on s.madong=d.madong join hangsanxuat h on d.mahang=h.mahang where h.mahang='$mahang' $madong $core $ram $manhinh order by s.gia desc limit $trang1,12";
	                	}elseif ($sort == 'asc') {
	                		$sql3="select * from sanpham s join dongsanpham d on s.madong=d.madong join hangsanxuat h on d.mahang=h.mahang where h.mahang='$mahang' $madong $core $ram $manhinh order by s.gia asc limit $trang1,12";
	                	}else{
	                		$sql3="select * from sanpham s join dongsanpham d on s.madong=d.madong join hangsanxuat h on d.mahang=h.mahang where h.mahang='$mahang' $madong $core $ram $manhinh limit $trang1,12";
	                	}
	            		$query3=mysqli_query($conn, $sql3);
	            		if (!$query3) {
	            			printf("sql: %s",$sql3);
						    printf("Error: %s\n", mysqli_error($conn));
						    exit();
						}
	            		while($dong3=mysqli_fetch_array($query3)){
	            	 ?>
	                <li>
	                    <a href="index.php?content=chitietsanpham&masp=<?php echo $dong3['masp'] ?>">
	                        <div class="template"><img src="imgs/<?php echo $dong3['hinhanh'] ?>"></div>
	                    </a>
	                    <p class="title"><?php echo $dong3['tensp'] ?></p>
	                    <p class="price"><?php echo toString($dong3['gia']) ?></p>
	                    <p class="summary"><?php echo $dong3['tomtat'] ?></p>
	                </li>
	                <?php } ?> 
	            </ul>
	        </div>
	    </div>
	</div>

	 <p style="clear:both; width: 40%; margin-left: 30%; text-align: center; font-size: 18px; margin-top: 10px; margin-bottom: 10px;">     	
	 	<?php
		//dem so trang
			
			$dong_cou=mysqli_query($conn, "select * from sanpham s join dongsanpham d on s.madong=d.madong join hangsanxuat h on d.mahang=h.mahang where h.mahang='$mahang' $madong $core $ram $manhinh");
		
			$cou=mysqli_num_rows($dong_cou);
			
			$a=$cou/12;
			for($b=0;$b<$a;$b++){
				$path = explode("&page", $_SERVER["QUERY_STRING"]);

		?>		
				<a href="index.php?<?php echo $path[0] ?>&page=<?php echo $b+1 ?>" style="color: blue; border: 1px solid #333; padding: 3px;"><?php echo $b+1 ?></a>
		<?php

			}
		?>
	</p>

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

             