<div style="margin-top: 20px; margin-left: 30px;padding-bottom: 20px;min-height: 700px;">
	
    <?php 
        if(isset($_GET['madong'])){
            $madong = $_GET['madong'];
            $sql = "select madong, tendong, h.mahang, tenhang from dongsanpham d join hangsanxuat h on d.mahang=h.mahang where madong='$madong'";
            $query=mysqli_query($conn, $sql);
            $dong=mysqli_fetch_array($query);
        }
     ?>

    <div class="dialog-form" id="update-dongsp-diaglog">
        <h3 style="margin-left: 130px;">CẬP NHẬT DÒNG SẢN PHẨM</h3>
        <form action="quanlydongsp/update.php" method="post">
            <table>
                    <tr>
                        <td class=".title">ID:</td>
                        <td><input type="hidden" name="madong" value="<?php echo $dong['madong'] ?>"><label><?php echo $dong['madong'] ?></label></td>
                    </tr>
                    <tr>
                        <td class=".title">Tên Dòng:</td>
                        <td><input type="text" name="tendong" value="<?php echo $dong['tendong'] ?>"></td>
                    </tr>
                    <tr>
                        <td class=".title">Hãng:</td>
                        <td>
                            <select name="mahang" class="selct-tag-dialog">
                                <?php 
                                    $sql2="select * from hangsanxuat";
                                    $result=mysqli_query($conn, $sql2);
                                    while($dong2=mysqli_fetch_array($result)){
                                        if($dong2['mahang']==$dong['mahang']){
                                 ?>
                                        <option value="<?php echo $dong2['mahang'] ?>" selected="selected" ><?php echo $dong2['tenhang'] ?></option>
                                    <?php }else { ?>
                                        <option value="<?php echo $dong2['mahang'] ?>"><?php echo $dong2['tenhang'] ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="" value="SỬA"><input type="button" class="close-button" value="HỦY"></td>
                    </tr>
            </table>
        </form>
    </div>

    <div class="dialog-form" id="insert-dongsp-diaglog">
        <h3 style="margin-left: 130px;">THÊM DÒNG SẢN PHẨM</h3>
        <form action="quanlydongsp/insert.php" method="post">
            <table>
                <tr>
                    <td class=".title">Tên Dòng:</td>
                    <td><input type="text" name="tendong" value="" placeholder=""></td>
                </tr>
                <tr>
                    <td class=".title">Hãng:</td>
                    <td >
                        <select name="mahang" class="selct-tag-dialog">
                            <?php 
                                $sql2="select * from hangsanxuat";
                                $result=mysqli_query($conn, $sql2);
                                while($dong2=mysqli_fetch_array($result)){
                            ?>
                                    <option value="<?php echo $dong2['mahang'] ?>"><?php echo $dong2['tenhang'] ?></option>
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
    
    <div style="margin-top: 20px;">
        <p style="font-weight: bold; font-size: 18px;">QUẢN LÝ DÒNG SẢN PHẨM</p>
        <div style="position: absolute; margin-left: 270px; margin-top: -28px;">
			<a href="index.php?manage=quanlydongsp&action=insert"><img src="../../imgs/plus-item.png" alt=""></a>
		</div>
        <div class="content-1-management">
			<table border="1">
				<thead>
					<td>ID</td>
					<td>DÒNG SẢN PHẨM</td>
					<td>HÃNG SẢN XUẤT</td>
					<td>QUẢN LÝ</td>
				</thead>
				<?php 
                    include ('../config.php');
                    $sql = "select madong, tendong, tenhang from dongsanpham d join hangsanxuat h on d.mahang=h.mahang order by tenhang";
                    $query=mysqli_query($conn, $sql);
                    while($dong=mysqli_fetch_array($query)){
                 ?>
				<tr>
					<td><?php echo $dong['madong'] ?></td>
					<td><?php echo $dong['tendong'] ?></td>
					<td><?php echo $dong['tenhang'] ?></td>
					<td>
						<a href="index.php?manage=quanlydongsp&action=update&madong=<?php echo $dong['madong'] ?>">
							<img src="../../imgs/edit.png" alt=""></a> &nbsp;&nbsp;&nbsp;&nbsp;
						<a href="quanlydongsp/delete.php?madong=<?php echo $dong['madong'] ?>"><img src="../../imgs/delete.png" alt=""></a>
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
    			$('#insert-dongsp-diaglog').fadeIn(300);
    			$('body').append('<div id="over">');
    			$('#over').fadeIn(300);
    		}else if(func = 'update'){
    			$('#update-dongsp-diaglog').fadeIn(300);
    			$('body').append('<div id="over">');
    			$('#over').fadeIn(300);
    		}
    	}
 	});
	
	// khi click đóng hộp thoại
 $('.close-button').click(function() {
       $('#over, #update-dongsp-diaglog, #insert-dongsp-diaglog').fadeOut(300 , function() {
           $('#over').remove();
           window.location='index.php?manage=quanlydongsp'
       });

      return false;
 });
</script>