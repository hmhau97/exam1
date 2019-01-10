<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>

    <?php 
        if(isset($_GET['mahang'])){
            $mahang = $_GET['mahang'];
            $sql = "select * from hangsanxuat where mahang='$mahang'";
            $query=mysqli_query($conn, $sql);
            $dong=mysqli_fetch_array($query);
        }
     ?>

    <div class="dialog-form" id="update-hangsp-diaglog">
        <h3>CẬP NHẬT HÃNG SẢN SUẤT</h3>
        <form action="quanlyhangsx/update.php" method="post" enctype="multipart/form-data">
            <table>
                    <tr>
                        <td class=".title">ID:</td>
                        <td><input type="hidden" name="mahang" value="<?php echo $dong['mahang'] ?>"><label><?php echo $dong['mahang'] ?></label></td>
                    </tr>
                    <tr>
                        <td class=".title">Tên Hãng:</td>
                        <td><input type="text" name="tenhang" value="<?php echo $dong['tenhang'] ?>" placeholder=""></td>
                    </tr>
                    <tr>
                        <td class=".title">Giới Thiệu:</td>
                        <td><textarea name="gioithieu" cols="30" rows="10"><?php echo $dong['gioithieu'] ?></textarea></td>
                    </tr>
                    <tr>
                        <td class=".title">icon:</td>
                        <td><input type="file" name="anh_icon"> <img src="../../imgs/<?php echo $dong['anh_icon'] ?>" style="width: 30px; height: 30px; "></td>
                    </tr>
                    <tr>
                        <td class=".title">Ảnh Cover:</td>
                        <td><input type="file" name="anh_cover"> <img src="../../imgs/<?php echo $dong['anh_cover'] ?>" style="width: 60px; height: 40px; "></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="submit" value="SỬA"><input type="button" class="close-button" value="HỦY"></td>
                    </tr>
            </table>
        </form>
    </div>

    <div class="dialog-form" id="insert-hangsp-diaglog">
        <h3>THÊM MỚI HÃNG SẢN SUẤT</h3>
        <form action="quanlyhangsx/insert.php" method="post" enctype="multipart/form-data">
            <table>
                    <tr>
                        <td class=".title">Tên Hãng:</td>
                        <td><input type="text" name="tenhang" value="" placeholder=""></td>
                    </tr>
                    <tr>
                        <td class=".title">Giới Thiệu:</td>
                        <td><textarea name="gioithieu" cols="30" rows="10"></textarea></td>
                    </tr>
                    <tr>
                        <td class=".title">icon:</td>
                        <td><input type="file" name="icon"></td>
                    </tr>
                    <tr>
                        <td class=".title">Ảnh Cover:</td>
                        <td><input type="file" name="cover"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="" value="THÊM"><input type="button" class="close-button" value="HỦY"></td>
                    </tr>
            </table>
        </form>
    </div>

<div style="margin-top: 20px; margin-left: 30px;padding-bottom: 20px; min-height: 700px;">
	<div style="margin-top: 20px;">
        <p style="font-weight: bold; font-size: 18px;">QUẢN LÝ HÃNG SẢN PHẨM</p>
        <div style="position: absolute; margin-left: 270px; margin-top: -28px;">
			<a href="index.php?manage=quanlyhangsp&action=insert"><img src="../../imgs/plus-item.png" alt=""></a>
		</div>
        <div class="content-1-management">
			<table border="1">
				<thead>
					<td>ID</td>
					<td>TÊN HÃNG</td>
					<td>icon</td>
					<td>ẢNH COVER</td>
					<td>QUẢN LÝ</td>
				</thead>
                <?php 
                    include ('../config.php');
                    $sql = 'select * from hangsanxuat';
                    $query=mysqli_query($conn, $sql);
                    while($dong=mysqli_fetch_array($query)){
                 ?>
				<tr>
					<td><?php echo $dong['mahang'] ?></td>
					<td><?php echo $dong['tenhang'] ?></td>
					<td><img src="../../imgs/<?php echo $dong['anh_icon'] ?>" alt=""  style="width: 50px; height: 50px; " ></td>
					<td><img src="../../imgs/<?php echo $dong['anh_cover'] ?>" style="width: 80px; height: 50px; "></td>
					<td>
						<a href="index.php?manage=quanlyhangsp&action=update&mahang=<?php echo $dong['mahang'] ?>"><img src="../../imgs/edit.png" alt=""></a> &nbsp;&nbsp;&nbsp;&nbsp;
						<a href="quanlyhangsx/delete.php?mahang=<?php echo $dong['mahang'] ?>"><img src="../../imgs/delete.png" alt=""></a>
					</td>
				</tr>
                <?php 
                    }
                 ?>
			</table>
        </div>
    </div>

    
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
    			$('#insert-hangsp-diaglog').fadeIn(300);
    			$('body').append('<div id="over">');
    			$('#over').fadeIn(300);
    		}else if(func = 'update'){
    			$('#update-hangsp-diaglog').fadeIn(300);
    			$('body').append('<div id="over">');
    			$('#over').fadeIn(300);
    		}
    	}
 	});
	
	// khi click đóng hộp thoại
 $('.close-button').click(function() {
       $('#over, #update-hangsp-diaglog, #insert-hangsp-diaglog').fadeOut(300 , function() {
           $('#over').remove();
           window.location='index.php?manage=quanlyhangsp'
       });

      return false;
 });

</script>