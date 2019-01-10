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
<div style="margin-top: 20px; margin-left: 30px;">
    <div id="slides">
        <a href=""><img src="imgs/slide1.png" stt="0"/></a>
        <a href=""><img src="imgs/slide2.png" stt="1"/></a>
        <a href=""><img src="imgs/slide3.png" stt="2"/></a>
        <a href=""><img src="imgs/slide4.png" stt="3"/></a>
    </div>
    <hr style="margin-left: 0px; margin-top: 15px;">
    <div style="margin-top: 15px;">
        <p style="font-weight: bold; font-size: 18px;">SẢN PHẨM MỚI RA</p>
        <div class="product">
            <ul>
                <?php 
                    include ('modules/config.php');
                    $sql = 'select * from sanpham ORDER BY RAND()';
                    $count=0;
                    $query=mysqli_query($conn, $sql);
                    while($dong=mysqli_fetch_array($query)){
                        if($dong['tinhtrang']=='Mới Ra Mắt' && $count<4){
                 ?>
                <li>
                    <a href="index.php?content=chitietsanpham&masp=<?php echo $dong['masp'] ?>">
                        <div class="template"><img src="imgs/<?php echo $dong['hinhanh'] ?>"></div>
                    </a>
                    <p class="title"><a href="index.php?content=chitietsanpham&masp=<?php echo $dong['masp'] ?>"><?php echo $dong['tensp'] ?></a></p>
                    <p class="price"><?php echo toString($dong['gia']) ?></p>
                    <p class="summary"><?php echo $dong['tomtat'] ?></p>
                </li>
                <?php $count+=1;}} ?>
            </ul>
        </div>
    </div>
    <hr style="margin-left: 0px; margin-top: 15px;">
    <div class="list-product-item">
        <div id="first">
            <ul>
                <li style="margin-left: 0px;"><a href="" style="font-weight: bold; font-size: 18px;">SẢN PHẨM</a></li>
                <?php 
                    include ('modules/config.php');
                    $sql = 'select * from hangsanxuat order by tenhang';
                    $query=mysqli_query($conn, $sql);
                    while($dong=mysqli_fetch_array($query)){
                 ?>
                    <li><a href="index.php?content=sanpham&hangsx=<?php echo $dong['mahang'] ?>"><?php echo $dong['tenhang'] ?></a></li>
                <?php } ?>
            </ul>
        </div>
        <div class="product">
            <ul>
                <?php 
                    $sql = 'select * from sanpham ORDER BY RAND() limit 8';
                    $query=mysqli_query($conn, $sql);
                    while($dong=mysqli_fetch_array($query)){
                 ?>
                <li>
                    <a href="index.php?content=chitietsanpham&masp=<?php echo $dong['masp'] ?>">
                        <div class="template"><img src="imgs/<?php echo $dong['hinhanh'] ?>"></div>
                    </a>
                    <p class="title"><a href="index.php?content=chitietsanpham&masp=<?php echo $dong['masp'] ?>"><?php echo $dong['tensp'] ?></a></p>
                    <p class="price"><?php echo toString($dong['gia']) ?></p>
                    <p class="summary"><?php echo $dong['tomtat'] ?></p>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <hr style="margin-left: 0px; margin-top: 15px;">
    <div class="list-product-item">
        <div id="first">
            <ul>
                <li style="margin-left: 0px;"><a href="index.php?content=tim&chuyendung=Doanh nhân" style="font-weight: bold; font-size: 18px;">DOANH NHÂN</a></li>
            </ul>
        </div>
        <div class="product">
            <ul>
                <?php 
                    include ('modules/config.php');
                    $sql = 'select * from sanpham ORDER BY RAND()';
                    $count=0;
                    $query=mysqli_query($conn, $sql);
                    while($dong=mysqli_fetch_array($query)){
                        if($dong['chuyendung']=='Doanh nhân' && $count<4){
                 ?>
                <li>
                    <a href="index.php?content=chitietsanpham&masp=<?php echo $dong['masp'] ?>">
                        <div class="template"><img src="imgs/<?php echo $dong['hinhanh'] ?>"></div>
                    </a>
                    <p class="title"><a href="index.php?content=chitietsanpham&masp=<?php echo $dong['masp'] ?>"><?php echo $dong['tensp'] ?></a></p>
                    <p class="price"><?php echo toString($dong['gia']) ?></p>
                    <p class="summary"><?php echo $dong['tomtat'] ?></p>
                </li>
                <?php $count+=1;}} ?>
            </ul>
        </div>
    </div>
    <hr style="margin-left: 0px; margin-top: 15px;">
    <div class="list-product-item">
        <div id="first">
            <ul>
                <li style="margin-left: 0px;"><a href="index.php?content=tim&chuyendung=GAMING" style="font-weight: bold; font-size: 18px;">LAPTOP GAMING</a></li>
            </ul>
        </div>
        <div class="product">
            <ul>
                <?php 
                    include ('modules/config.php');
                    $sql = 'select * from sanpham ORDER BY RAND()';
                    $count=0;
                    $query=mysqli_query($conn, $sql);
                    while($dong=mysqli_fetch_array($query)){
                        if($dong['chuyendung']=='Gaming' && $count<4){
                 ?>
                <li>
                    <a href="index.php?content=chitietsanpham&masp=<?php echo $dong['masp'] ?>">
                        <div class="template"><img src="imgs/<?php echo $dong['hinhanh'] ?>"></div>
                    </a>
                    <p class="title"><a href="index.php?content=chitietsanpham&masp=<?php echo $dong['masp'] ?>"><?php echo $dong['tensp'] ?></a></p>
                    <p class="price"><?php echo toString($dong['gia']) ?></p>
                    <p class="summary"><?php echo $dong['tomtat'] ?></p>
                </li>
                <?php $count+=1;}} ?>
            </ul>
        </div>
    </div>
</div>
<script>
    $(function() {
      $('#slides').slidesjs({
        width: 1600,
        height: 762,
        play: {
          active: true,
          auto: true,
          interval: 4000,
          swap: true
        }
      });
    });
</script>