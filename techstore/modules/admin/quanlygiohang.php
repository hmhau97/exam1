<div style="margin-top: 20px; margin-left: 30px;padding-bottom: 20px; min-height: 700px;">
    <?php 
        if(isset($_GET['magiohang'])){
            $magiohang = $_GET['magiohang'];
            $sql = "select * from giohang where magiohang='$magiohang'";
            $query=mysqli_query($conn, $sql);
            $dong=mysqli_fetch_array($query);
        }
     ?>

    <div style="margin-top: 20px;">
        <p style="font-weight: bold; font-size: 18px;">QUẢN LÝ GIỎ HÀNG</p>
        <div class="content-1-management">
            <table border="1" style="border: 2px solid #24A0C9;">
                <thead>
                    <td></td>
                    <td>ID</td>
                    <td>Họ Tên</td>
                    <td>Địa Chỉ</td>
                    <td>Số Điện thoại</td>
                    <td>Email</td>
                    <td>Mã User</td>
                    <td>Chú Thích</td>
                    <td>Ngày Đặt</td>
                    <td>Tình Trạng</td>
                    <td>QUẢN LÝ</td>
                </thead>
                <?php 
                    include ('../config.php');
                    $sql = 'select magiohang, hoten, diachi, sdt, email, id, chuthich, ngaydat, tinhtrang from giohang';
                    $query=mysqli_query($conn, $sql);
                    while($dong=mysqli_fetch_array($query)){
                 ?>
                <tr>
                    <td><div id="display<?php echo $dong['magiohang'] ?>"><img src="../../imgs/hide.png"></div></td>
                    <td><?php echo $dong['magiohang'] ?></td>
                    <td><?php echo $dong['hoten'] ?></td>
                    <td style="width: 150px;"><?php echo $dong['diachi'] ?></td>
                    <td><?php echo $dong['sdt'] ?></td>
                    <td><?php echo $dong['email'] ?></td>
                    <td><?php echo $dong['id'] ?></td>
                    <td><?php echo $dong['chuthich'] ?></td>
                    <td><?php echo $dong['ngaydat'] ?></td>
                    <td><?php echo $dong['tinhtrang'] ?></td>
                    <td>
                        <a href="quanlygiohang/checked.php?magiohang=<?php echo $dong['magiohang'] ?>"><img src="../../imgs/checked.png"  style="width: 24px; height: 24px;"></a>
                        <a href="quanlygiohang/delete.php?magiohang=<?php echo $dong['magiohang'] ?>"><img src="../../imgs/delete.png" style="width: 24px; height: 24px;"></a>
                    </td>
                    <tr id="table<?php echo $dong['magiohang'] ?>" style="display: none;">
                        <td colspan="11">
                            <table border="1" style="border: none;">
                                <tr>
                                    <td><b>Mã SP</b></td>
                                    <td><b>Tên Sản Phẩm</b></td>
                                    <td><b>Hình Ảnh</b></td>
                                    <td><b>Số Lượng</b></td>
                                </tr>
                                <?php 
                                    $magiohang = $dong['magiohang'];
                                    $sql2 = "select c.masp, s.tensp, s.hinhanh, c.soluong from sanpham s join chitietdonhang c on s.masp=c.masp join giohang g on c.magiohang=g.magiohang where g.magiohang='$magiohang'";
                                    $query2=mysqli_query($conn, $sql2);
                                    while($dong2=mysqli_fetch_array($query2)){
                                 ?>
                                <tr>
                                    <td><?php echo $dong2['masp'] ?></td>
                                    <td><?php echo $dong2['tensp'] ?></td>
                                    <td><img src="../../imgs/<?php echo $dong2['hinhanh'] ?>" style="width: 40px; height: 40px;" ></td>
                                    <td><?php echo $dong2['soluong'] ?></td>
                                </tr>
                                <?php } ?>
                            </table>
                        </td>
                    </tr>
                    <script>
                        $("#display<?php echo $dong['magiohang'] ?>").click(function (){
                            if($("#table<?php echo $dong['magiohang'] ?>").css("display")=='table-row'){
                                 $("#table<?php echo $dong['magiohang'] ?>").css("display","none");
                                 $("#display<?php echo $dong['magiohang'] ?> img").attr('src','../../imgs/hide.png');
                            }else if($("#table<?php echo $dong['magiohang'] ?>").css("display")=='none'){
                                $("#table<?php echo $dong['magiohang'] ?>").css("display",'table-row');
                                $("#display<?php echo $dong['magiohang'] ?> img").attr('src','../../imgs/show.png');
                            };
                        });
                    </script>
                </tr>
                <?php } ?>
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
    	if(mAnd>-1){
    		var func =  rest.substr(7, mAnd - 7);
    		if(func == 'insert'){
    			$('#insert-giohang-diaglog').fadeIn(300);
    			$('body').append('<div id="over">');
    			$('#over').fadeIn(300);
    		}else if(func = 'update'){
    			$('#update-giohang-diaglog').fadeIn(300);
    			$('body').append('<div id="over">');
    			$('#over').fadeIn(300);
    		}
    	}
 	});
	
	// khi click đóng hộp thoại
 $('.close-button').click(function() {
       $('#over, #update-giohang-diaglog, #insert-giohang-diaglog').fadeOut(300 , function() {
           $('#over').remove();
           window.location='index.php?manage=quanlygiohang'
       });

      return false;
 });
</script>