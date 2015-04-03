<?php 
	mysql_connect('localhost','root','');
	mysql_select_db('store_mb');
	session_start();
?>

<?php include('includes/header.php');?>
<?php include('includes/body-left.php');?>
        
<!--Vung ben phai--><!--Vung ben phai--><!--Vung ben phai--><!--Vung ben phai--><!--Vung ben phai-->
<div class="right-area w775px left-fl pd10">
        	
	<!-- Start WOWSlider.com HEAD section -->
	<link rel="stylesheet" type="text/css" href="css/wowhome.css" />
	<script type="text/javascript" src="js/wowslider/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->
</head>
<body style="background-color:#d7d7d7">
	<!-- Start WOWSlider.com BODY section -->
	<div id="wowslider-container1">
        <div class="ws_images">
            <ul>
                <li><img src="images/slider/1.jpg" alt="SAMSUNG GALAXY S4 LTE - A E330" title="SAMSUNG GALAXY S4 LTE - A E330" id="wows1_0"/></li>
                <li><img src="images/slider/2.jpg" alt="Giá hỗ trợ cực sốc chưa từng có" title="Giá hỗ trợ cực sốc chưa từng có" id="wows1_1"/></li>
            </ul>
    	</div>
		<div class="ws_bullets"><div>
        <a href="#" title="c13f72f237d765fc0e69e35ba7eb9dd9">1</a>
        <a href="#" title="a8235d1055e66c22d61373e942096745">2</a>
    </div>
    </div>
	<span class="wsl"><a href="#">Carousel Plugin</a> by WOWSlider.com v4.3</span>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="js/wowslider/wowslider.js"></script>
	<script type="text/javascript" src="js/wowslider/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
            
            <!--MainProduct-->
            <!--div class="group group-Product left-fl wp100">
            	<ul> 
                	<li><a href="#"><img src="images/banner/group-iphone.jpg" /></a></li>
                    <li><a href="#"><img src="images/banner/group-htc.jpg" /></a></li>
                    <li><a href="#"><img src="images/banner/group-samsung.jpg" /></a></li>
                </ul>
            </div-->
        	<!--END=Product-->
            
            <!--MainAccessories-->
            <div class=" group group-Accessories left-fl wp100">
            	<ul class="wp100 clean"> 
                	<li><a href="#"><img class="wp32" src="images/banner/acc-htc.png" /></a></li>
                    <li style="margin:0px 1px;"><a href="#"><img class="wp32" src="images/banner/acc-ip.png" /></a></li>
                    <li><a href="#"><img class="wp32" src="images/banner/acc-samsung.png" /></a></li>
                </ul>
            </div>
        	<!--END=Accessories-->
            
            
            <div class="clear wp100"></div>
            <!--GridProduct-->
            
<!--Nhom san pham-->
    <div class="group product clearfix">
    <!--title-->
    <div class="header2">
        <span class="title">
        <span>
            <a href="/dien-thoai/maxfone-22.aspx">Điện thoại</a>
        </span>
        </span>
    </div>
    <!--end--title-->
    	<?php
            	$query = "Select * from mathang_index limit 12";
				$run = mysql_query($query);
				
				if(mysql_num_rows($run) != 0){
					while($row = mysql_fetch_array($run)){
						$tenmh = $row['TenMatHang'];
						$xuatsu = $row['XuatSu'];
						$baohanh = $row['BaoHanh'];
						$mausac = $row['MauSac'];
						$tinhtrang = $row['TinhTrang'];
						$trangthai = $row['TrangThai'];
						$khuyenmai = $row['KhuyenMai'];
						$image = $row['image'];
						$giaxuat = $row['GiaXuat'];
				
				
			?>
    	 <div class="grid w255px  left-fl mg-top5 gachbottom" >
        
        	
        
            <div class="left-fl imgProduct w110px">
                <a href="#"><span class="imgProduct">
                <img class="resizeP-Home" src="admin/images/<?php echo $image;?>" />
                </span></a>
            </div>
            
            <div class="left-fl desProduct w130px">
                <ul class="desProduct clean">
                    <h6><?php echo $tenmh;?></h6>
                    <li><b>Xuất sứ:</b> <?php echo $xuatsu;?></li>
                    <li><b>Bảo hành:</b> <?php echo $baohanh;?></li>
                    <li><b>Màu sắc:</b> <?php echo $mausac;?></li>
                    <li><b>Tình trạng:</b> <?php echo $tinhtrang;?></li>
                    <li><b>Trạng thái:</b> <?php echo $trangthai;?></li>
                    
                    <li class="gift"> Khuyến mại: <?php echo $khuyenmai;?></li>
                </ul>
            </div>
            <div class="clear mg-left30 ">
                <span class="btn btn-info "><?php echo $giaxuat;?> VNĐ</span>
                <span class="btn btn-inverse "><a href="details.php">Chi tiết</a></span>
            </div>
        </div>
        <?php
        		}
			}
		?>
        
        
        
       
        
    </div>
    <!--END=GridProduct-->
    <div class="clear"></div> 
           
            <!--GridProduct-->
            <!--Nhom san pham-->
            
            <!--END=GridProduct-->
            <div class="clear "></div>
            <!--GridProduct-->
            <!--Nhom san pham-->
            <div class="group product clearfix">
            <!--title-->
            <div class="header2">
                <span class="title">
                <span>
                	<a href="/dien-thoai/maxfone-22.aspx">Phụ kiện điện thoại</a>
                </span>
                </span>
            </div>
            <!--end--title-->
            	<div class="grid left-fl pd5" >
				  <ul class="thumbnails">
                    <li class="w230px">
                      <div class="thumbnail">
                        <a class="resizeA-over" href="#"><img class="resizeA-Home" src="images/product/201107221116256764_g1.jpg" /></a>
                        <div class="caption">
                            <a href="#"><h5>Bao da Ipad Belk Chính hãng</h5></a>
                            <p class="btn btn-primary" href="#">300.000</p>
                            </p>
                        </div>
                        
                      </div>
                    </li>
                    <li class="w230px">
                      <div class="thumbnail">
                        <a class="resizeA-over" href="#"><img class="resizeA-Home" src="images/product/201112311125425625_PPSL-2.png" /></a>
                        <div class="caption">
                            <a href="#"><h5>Bao da Ipad Belk Chính hãng</h5></a>
                            <p class="btn btn-primary" href="#">300.000</p>
                            </p>
                        </div>
                        
                      </div>
                    </li>
                    <li class="w230px">
                      <div class="thumbnail">
                        <a class="resizeA-over" href="#"><img class="resizeA-Home" src="images/product/Image 32.png" /></a>
                        <div class="caption">
                            <a href="#"><h5>Sạc Iphone - Original</h5></a>
                            <p class="btn btn-primary" href="#">300.000</p>
                            </p>
                        </div>
                        
                      </div>
                    </li>
                    <li class="w230px">
                      <div class="thumbnail">
                        <a class="resizeA-over" href="#"><img class="resizeA-Home" src="images/product/201107221116256764_g1.jpg" /></a>
                        <div class="caption">
                            <a href="#"><h5>Bao da Ipad Belk Chính hãng</h5></a>
                            <p class="btn btn-primary" href="#">300.000</p>
                            </p>
                        </div>
                        
                      </div>
                    </li>
                    <li class="w230px">
                      <div class="thumbnail">
                        <a class="resizeA-over" href="#"><img class="resizeA-Home" src="images/product/201112311125424843_PPBS-119.png" /></a>
                        <div class="caption">
                            <a href="#"><h5>Bao da Ipad Belk Chính hãng</h5></a>
                            <p class="btn btn-primary" href="#">300.000</p>
                            </p>
                        </div>
                        
                      </div>
                    </li>
                    <li class="w230px">
                      <div class="thumbnail">
                        <a class="resizeA-over" href="#"><img class="resizeA-Home" src="images/product/201112311125428125_PPSL-16.png" /></a>
                        <div class="caption">
                            <a href="#"><h5>Sạc Iphone - Original</h5></a>
                            <p class="btn btn-primary" href="#">300.000</p>
                            </p>
                        </div>
                        
                      </div>
                    </li>
                  </ul>
                </div>
                
            </div>
            <!--END=GridProduct-->
            
            <!--HelpBanner-->
            <div class="">
            	<a href="#"> <img src="images/icon-logo/help21.png" /></a>
                <a href="#"> <img src="images/icon-logo/help31.png" /></a>
                <a href="#"> <img src="images/icon-logo/help41.png" /></a>
            </div>
            <!--END=HelpBanner-->
            
        </div>
        <!--Vung ben phai-->
    </div>
</div>
<!--END-MAINBODY-->
<?php include('includes/footer.php');?>
</body>
</html>