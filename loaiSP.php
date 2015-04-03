<?php 
	session_start();
	mysql_connect('localhost','root','');
	mysql_select_db('store_mb');
?>

<?php include('includes/header.php');?>
<?php include('includes/body-left.php');?>
        
<!--Vung ben phai--><!--Vung ben phai--><!--Vung ben phai--><!--Vung ben phai--><!--Vung ben phai-->
<div class="right-area w775px left-fl pd10">
        	
	
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
            <a href="/dien-thoai/maxfone-22.aspx">
			<?php if(isset($_GET['sp']) && $_GET['sp'] == "apple"){
				echo "Apple";
			}else if(isset($_GET['sp']) && $_GET['sp'] == "nokia"){
				echo "Nokia";
			}else if(isset($_GET['sp']) && $_GET['sp'] == "samsung"){
				echo "SamSung";
			}else if(isset($_GET['sp']) && $_GET['sp'] == "lg"){
				echo "LG";
			}else if(isset($_GET['sp']) && $_GET['sp'] == "sony"){
				echo "Sony";
			}else if(isset($_GET['sp']) && $_GET['sp'] == "htc"){
				echo "HTC";
			}else if(isset($_GET['sp']) && $_GET['sp'] == "sky"){
				echo "Sky Pantech";
			}else if(isset($_GET['sp']) && $_GET['sp'] == "oppo"){
				echo "Oppo";
			}else{
				echo "Điện Thoại";
			}?></a>
        </span>
        </span>
    </div>
    <!--end--title-->
    	<?php
			if(isset($_GET['sp']) && $_GET['sp'] == "apple"){
            	$query = "call hienthi_mathang('NCC_APPLE')";
				$run = mysql_query($query);
			}else if(isset($_GET['sp']) && $_GET['sp'] == "nokia"){
				$query = "Select TenMatHang,XuatSu,BaoHanh,MauSac,TinhTrang,TrangThai,KhuyenMai,image,GiaXuat 
				from mathang m join dacdiem d where m.ID_DacDiem = d.ID_DacDiem and m.ID_NSX = 'NCC_NOKIA'";
				$run = mysql_query($query);
			}else if(isset($_GET['sp']) && $_GET['sp'] == "samsung"){
				$query = "Select TenMatHang,XuatSu,BaoHanh,MauSac,TinhTrang,TrangThai,KhuyenMai,image,GiaXuat 
				from mathang m join dacdiem d where m.ID_DacDiem = d.ID_DacDiem and m.ID_NSX = 'NCC_SAMSUNG'";
				$run = mysql_query($query);
			}else if(isset($_GET['sp']) && $_GET['sp'] == "lg"){
				$query = "Select TenMatHang,XuatSu,BaoHanh,MauSac,TinhTrang,TrangThai,KhuyenMai,image,GiaXuat 
				from mathang m join dacdiem d where m.ID_DacDiem = d.ID_DacDiem and m.ID_NSX = 'NCC_LG'";
				$run = mysql_query($query);
			}else if(isset($_GET['sp']) && $_GET['sp'] == "sony"){
				$query = "Select TenMatHang,XuatSu,BaoHanh,MauSac,TinhTrang,TrangThai,KhuyenMai,image,GiaXuat 
				from mathang m join dacdiem d where m.ID_DacDiem = d.ID_DacDiem and m.ID_NSX = 'NCC_SONY'";
				$run = mysql_query($query);
			}else if(isset($_GET['sp']) && $_GET['sp'] == "htc"){
				$query = "Select TenMatHang,XuatSu,BaoHanh,MauSac,TinhTrang,TrangThai,KhuyenMai,image,GiaXuat 
				from mathang m join dacdiem d where m.ID_DacDiem = d.ID_DacDiem and m.ID_NSX = 'NCC_HTC'";
				$run = mysql_query($query);
			}else if(isset($_GET['sp']) && $_GET['sp'] == "sky"){
				$query = "Select TenMatHang,XuatSu,BaoHanh,MauSac,TinhTrang,TrangThai,KhuyenMai,image,GiaXuat 
				from mathang m join dacdiem d where m.ID_DacDiem = d.ID_DacDiem and m.ID_NSX = 'NCC_SKY'";
				$run = mysql_query($query);
			}else if(isset($_GET['sp']) && $_GET['sp'] == "oppo"){
				$query = "Select TenMatHang,XuatSu,BaoHanh,MauSac,TinhTrang,TrangThai,KhuyenMai,image,GiaXuat 
				from mathang m join dacdiem d where m.ID_DacDiem = d.ID_DacDiem and m.ID_NSX = 'NCC_OPPO'";
				$run = mysql_query($query);
			}else{
				$query = "Select TenMatHang,XuatSu,BaoHanh,MauSac,TinhTrang,TrangThai,KhuyenMai,image,GiaXuat 
				from mathang m join dacdiem d where m.ID_DacDiem = d.ID_DacDiem";
				$run = mysql_query($query);
			}
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
                <span class="btn btn-inverse "><a href="#">Chi tiết</a></span>
            </div>
        </div>
        <?php
        		}
			}
			else{
				echo "Không có sản phẩm nào";
			}
			
		?>
        
        
        
       
        
    </div>
    <!--END=GridProduct-->
    <div class="clear"></div> 
           
            
            
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