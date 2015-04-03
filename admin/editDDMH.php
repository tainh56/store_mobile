<?php 
	mysql_connect('localhost','root','');
	mysql_select_db('store_mb');
	?>
<?php include('../includes/header-admin.php');?>
<?php include('../includes/body-left-admin.php');?>
        
	<div class="right-area w775px left-fl pd10">
    <div id="form">
    <h2>Sửa đặc điểm mặt hàng</h2>
    <br />
    <br />
                <?php 
				if(isset($_GET['editid'])){
						$edit_id = $_GET['editid'];
					
						$get_query = "Select * from dacdiem where ID_DacDiem = '$edit_id'";
						$get_run = mysql_query($get_query);
						if(mysql_num_rows($get_run) != 0){
							while($row = mysql_fetch_array($get_run)){
								$madd = $row['ID_DacDiem'];
								$tendd = $row['TenDacDiem'];
								$mota = $row['MoTa'];
								$xuatsu = $row['XuatSu'];
								$baohanh = $row['BaoHanh'];
								$mausac = $row['MauSac'];
								$tinhtrang = $row['TinhTrang'];
								$trangthai = $row['TrangThai'];
								$makh = $row['KhuyenMai'];
							}
						}
					if($_SERVER['REQUEST_METHOD'] == 'POST'){//neu gia tri ton tai thi xu ly form
						$errors = array();
						
						if(empty($_POST['madd']) || $_POST['madd'] == ''){
							$errors[] = 'madd';
						}else{
							$madd = $_POST['madd'];
						}
						if(empty($_POST['tendd'])){
							$errors[] = 'tendd';
						}else{
							$tendd = $_POST['tendd'];
						}
						
						if(empty($_POST['mota']) || $_POST['mota'] == ''){
							$errors[] = 'mota';
						}else{
							$mota = $_POST['mota'];
						}
						if(empty($_POST['xuatsu']) || $_POST['xuatsu'] == ''){
							$errors[] = 'xuatsu';
						}else{
							$xuatsu = $_POST['xuatsu'];
						}
						
						if(isset($_POST['baohanh']) && $_POST['baohanh'] != ''){
							$baohanh = $_POST['baohanh'];
						}else{
							$errors[] = 'madd';
						}
						if(isset($_POST['mausac']) && $_POST['mausac'] != ''){
							$mausac = $_POST['mausac'];
						}else{
							$errors[] = 'mausac';
						}
						if(isset($_POST['tinhtrang']) && $_POST['tinhtrang'] != ''){
							$tinhtrang = $_POST['tinhtrang'];
						}else{
							$errors[] = 'tinhtrang';
						}
						if(empty($_POST['trangthai']) || $_POST['trangthai'] == ''){
							$errors[] = 'trangthai';
						}else{
							$trangthai = $_POST['trangthai'];
						}
						if(empty($_POST['makh']) || $_POST['makh'] == ''){
							$errors[] = 'makh';
						}else{
							$makh = $_POST['makh'];
						}
						
						if(empty($errors)){
							$update = "Update dacdiem set ID_DacDiem = '$madd',TenDacDiem = '$tendd',
							MoTa = '$mota',XuatSu = '$xuatsu',BaoHanh = '$baohanh',MauSac = '$mausac',
							TinhTrang = '$tinhtrang',
							TrangThai = '$trangthai',KhuyenMai = '$makh' where ID_DacDiem = '$edit_id'";
							
							$run_up = mysql_query($update);// or die("Query ($query_dh) \n<br/> Mysql Error: ". mysqli_error());
							
							if(mysql_affected_rows() == 1){
								$message = "<p class='success'>Đơn hàng đã được thêm vào thành công.</p>";
								$tendd = '';
								$mota = '';
								$xuatsu = '';
								$baohanh = '';
								$mausac  = '';
								$tinhtrang = '';
								$trangthai = '';
								$makh = '';
								$madd = '';
								
								echo "<script>alert('Chỉnh sửa thành công')</script>";
								echo "<script>window.open('viewDDMH.php?act=mh','_self')</script>";
							}else{
								$message = "<p class='warning'>Hệ thống lỗi! Không thêm thêm dữ liệu vào database.</p>";
							}
						}else
							$message = "<p class='warning'>Bạn chưa điền đầy đủ thông tin vào các trường.</p>";
						
						echo $message;
					}
				
				?>
                	
                       
               
                
                <form method="post" action="" enctype="multipart/form-data">
    	<table width="750" align="center" border="5">
        	<tr>
            	<td align="center" bgcolor="#FFCBA0" colspan="6"><h1>Đặc điểm mặt hàng</h1></td>
            </tr>
            <tr>
            	<td align="right">Mã đặc điểm</td>
                <td>
                                <?php
                                	if(isset($errors) && in_array('madd',$errors)){
										echo "<p class='warning'>Bạn chưa điền thông tin vào mã đặc điểm.</p>";
									}
								?>
                            
                            <input type="text" name="madd" id="madd" 
                            value="<?php if(isset($madd)) echo $madd;?>" size="20" maxlength="150" tabindex="1" />
                 </td>
            </tr>
            <tr>
            	<td align="right">Tên đặc điểm</td>
                <td>
                            	<?php
                                	if(isset($errors) && in_array('tendd',$errors)){
										echo "<p class='warning'>Bạn chưa điền thông tin vào tên đặc điểm.</p>";
									}
								?>
                           
                            <input type="text" name="tendd" id="tendd" 
                            value="<?php if(isset($tendd)) echo $tendd;?>" size="20" maxlength="150" tabindex="1" />
                            </td>
            </tr>
            <tr>
            	<td align="right">Mô tả chi tiết</td>
                <td>
                	<?php
                    	if(isset($errors) && in_array('mota',$errors)){
							echo "<p class='warning'>Bạn chưa điền thông tin vào mô tả.</p>";
						}
					?>
                	<textarea name="mota" cols="60" rows="15"><?php if(isset($mota)) echo $mota;?></textarea></td>
            </tr>
            <tr>
            	<td align="right">Xuất sứ</td>
                <td>
                            	<?php
                                	if(isset($errors) && in_array('xuatsu',$errors)){
										echo "<p class='warning'>Bạn chưa điền thông tin vào xuất sứ.</p>";
									}
								?>
                            
                            <input type="text" name="xuatsu" id="xuatsu" 
                            value="<?php if(isset($xuatsu)) echo $xuatsu;?>" size="20" maxlength="150" tabindex="1" />
                </td>
            </tr>
            <tr>
            	<td align="right">Bảo hành</td>
                <td>
                            	<?php
                                	if(isset($errors) && in_array('baohanh',$errors)){
										echo "<p class='warning'>Bạn chưa điền thông tin vào bảo hành.</p>";
									}
								?>
                            
                            <input type="text" name="baohanh" id="baohanh" 
                            value="<?php if(isset($baohanh)) echo $baohanh;?>" size="20" maxlength="150" tabindex="1" />
                </td>
            </tr>
            <tr>
            	<td align="right">Màu sắc</td>
                <td>
                            	<?php
                                	if(isset($errors) && in_array('mausac',$errors)){
										echo "<p class='warning'>Bạn chưa điền thông tin vào màu sắc.</p>";
									}
								?>
                           
                            <input type="text" name="mausac" id="mausac" 
                            value="<?php if(isset($mausac)) echo $mausac;?>" size="20" maxlength="150" tabindex="1" />
                </td>
            </tr>
            <tr>
            	<td align="right">Tình trạng</td>
                <td>
                            	<?php
                                	if(isset($errors) && in_array('tinhtrang',$errors)){
										echo "<p class='warning'>Bạn chưa điền thông tin vào tình trạng.</p>";
									}
								?>
                            
                            <input type="text" name="tinhtrang" id="tinhtrang" 
                            value="<?php if(isset($tinhtrang)) echo $tinhtrang;?>" size="20" maxlength="150" tabindex="1" />
                </td>
            </tr>
            <tr>
            	<td align="right">Trạng thái</td>
                <td>
                            	<?php
                                	if(isset($errors) && in_array('trangthai',$errors)){
										echo "<p class='warning'>Bạn chưa điền thông tin vào trạng thái.</p>";
									}
								?>
                           
                            <input type="text" name="trangthai" id="trangthai" 
                            value="<?php if(isset($trangthai)) echo $trangthai;?>" size="20" maxlength="150" tabindex="1" />
                </td>
            </tr>
            <tr>
            	<td align="right">Khuyến mại</td>
                <td>
                            	<?php
                                	if(isset($errors) && in_array('makh',$errors)){
										echo "<p class='warning'>Bạn chưa điền thông tin vào khuyến mại.</p>";
									}
								?>
                           
                            <input type="text" name="makh" id="makh" 
                            value="<?php if(isset($makh)) echo $makh;?>" size="20" maxlength="150" tabindex="1" />
                </td>
            </tr>
            
            <tr>
                <td align="center" colspan="6"><input type="submit" name="submit" value="Sửa" ></td>
            </tr>
        </table>
    </form>
    <?php }?>
    </div>
    </div>
    
    </div>
</div>
<!--END-MAINBODY-->
<?php include('../includes/footer.php');?>
</body>
</html>