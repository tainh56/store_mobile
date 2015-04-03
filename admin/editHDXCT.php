<?php 
	mysql_connect('localhost','root','');
	mysql_select_db('store_mb');
	?>
<?php include('../includes/header-admin.php');?>
<?php
	  	
	if(isset($_GET['editid'])){
		$edit_id = $_GET['editid'];
	}else{
		header('Location: admin.php');
	}
?>
<?php include('../includes/body-left-admin.php');?>
        
	<div class="right-area w775px left-fl pd10">
    <div id="form">
    <h2>Sửa đơn hàng</h2>
    <br />
    <br />
                <?php 
					if(isset($_GET['editid'])){
						$edit_id = $_GET['editid'];
					
						$get_query = "Select * from hoadonban where ID_DH = '$edit_id'";
						$get_run = mysql_query($get_query);
						if(mysql_num_rows($get_run) != 0){
							while($row = mysql_fetch_array($get_run)){
								$madh = $row['ID_DH'];
								$mamh = $row['ID_MatHang'];
								$thue = $row['Thue'];
								$soluong = $row['SoLuong'];
								$makh = $row['ID_KhachHang'];
								$gia = $row['GiaBan'];
							}
						}
						if($_SERVER['REQUEST_METHOD'] == 'POST'){//neu gia tri ton tai thi xu ly form
							$errors = array();
							if(empty($_POST['madh'])){
								$errors[] = 'madh';
							}else{
								$madh = $_POST['madh'];
							}
							
							if(empty($_POST['gia']) || $_POST['gia'] == ''){
								$errors[] = 'gia';
							}else{
								$gia = $_POST['gia'];
							}
							if(empty($_POST['thue']) || $_POST['thue'] == ''){
								$errors[] = 'thue';
							}else{
								$thue = $_POST['thue'];
							}
							if(isset($_POST['makh']) || $_POST['makh'] != ''){
								$makh = $_POST['makh'];
							}else{
								$errors[] = 'makh';
							}
							if(isset($_POST['mamh']) && $_POST['mamh'] != ''){
								$mamh = $_POST['mamh'];
							}else{
								$errors[] = 'mamh';
							}
							if(empty($_POST['soluong']) || $_POST['soluong'] == ''){
								$errors[] = 'soluong';
							}else{
								$soluong = $_POST['soluong'];
							}
							if(empty($errors)){
								
									
									
								$query_dh = "Update hoadonban 
								set ID_DH = '$madh',ID_MatHang = '$mamh',ID_KhachHang = '$makh',
								SoLuong = $soluong,GiaBan = $gia,Thue = $thue
								where ID_DH = '$edit_id'";
								
								//$query_dhct = "Insert into chitietdonhang(ID_DH,ID_MatHang,SoLuong,Gia) values('$madh','$mamh',$soluong,$gia)";
								$run_dh = mysql_query($query_dh);// or die("Query ($query_dh) \n<br/> Mysql Error: ". mysqli_error());
								//$run1 = mysql_affected_rows();
								
								//$run_dhct = mysql_query($query_dhct) or die("Query ($query) \n<br/> Mysql Error: ". mysqli_error());
								//$run2 = mysql_affected_rows();
								if(mysql_affected_rows() == 1){
									$message = "<p class='success'>Đơn hàng đã được thêm vào thành công.</p>";
									$madh = '';
									$soluong = '';
									$gia = '';
									$thue = '';
									$mamh = '';
									$makh = '';
									echo "<script>alert('Chỉnh sửa thành công')</script>";
								echo "<script>window.open('viewHDXCT.php?act=dhx','_self')</script>";
								}else{
									$message = "<p class='warning'>Hệ thống lỗi! Không thêm thêm dữ liệu vào database.</p>";
								}
							}else
								$message = "<p class='warning'>Bạn chưa điền đầy đủ thông tin vào các trường.</p>";
							
							echo $message;
						}
					
					?>
						
						   
					<form id="add_cat" action="" method="post">
						<fieldset>
							<legend>Sửa đơn hàng xuất chi tiết</legend>
								<div align="center">
									<label for="madh">Mã đơn hàng: <span class="required">*</span>
										<?php
											if(isset($errors) && in_array('madh',$errors)){
												echo "<p class='warning'>Bạn chưa chọn đơn hàng</p>";
											}
										?>
									</label>
									<select name="madh" tabindex="1">
										<?php
										$q_makh = "Select ID_DH from donhang where ID_DH like 'DHX%'";
										$r_makh = mysql_query($q_makh);								
											if(mysql_num_rows($r_makh) != 0){
												while($num = mysql_fetch_array($r_makh)){
													if(isset($madh) && $madh == $num['ID_DH']) 
														echo "<option selected='selected'>".$num['ID_DH']."</option>";
													else
														echo "<option>".$num['ID_DH']."</option>";
												}
											}
										
										?>
										
									</select>
								</div>
							<div align="center">
                        	<label for="mamh">Mã mặt hàng: <span class="required">*</span>
                            	<?php
                                	if(isset($errors) && in_array('mamh',$errors)){
										echo "<p class='warning'>Bạn chưa chọn mã mặt hàng.</p>";
									}
								?>
                            </label>
                            <select name="mamh" tabindex="3">
                            	<?php
                                $q_makh = "Select ID_MatHang from hoadonnhap";
								$r_makh = mysql_query($q_makh);								
									if(mysql_num_rows($r_makh) != 0){
										while($num = mysql_fetch_array($r_makh)){
											if(isset($mamh) && $mamh == $num['ID_MatHang']) 
												echo "<option selected='selected'>".$num['ID_MatHang']."</option>";
											else
												echo "<option>".$num['ID_MatHang']."</option>";
										}
									}
								
								?>
                            	
                            </select>
                            
                        </div>
							
						   <div align="center">
								<label for="makh">Mã Khách Hàng: <span class="required">*</span>
									<?php
										if(isset($errors) && in_array('makh',$errors)){
											echo "<p class='warning'>Bạn chưa chọn mã KH.</p>";
										}
									?>
								</label>
								<select name="makh" tabindex="3">
									<?php
									$q_makh = "Select ID_KhachHang from khachhang";
									$r_makh = mysql_query($q_makh);								
										if(mysql_num_rows($r_makh) != 0){
											while($num = mysql_fetch_array($r_makh)){
												if(isset($makh) && $makh == $num['ID_KhachHang']) 
													echo "<option selected='selected'>".$num['ID_KhachHang']."</option>";
												else
													echo "<option>".$num['ID_KhachHang']."</option>";
											}
										}
									
									?>
									
								</select>
								
							</div>
							<div align="center">
								<label for="soluong">Số lượng: <span class="required">*</span>
									<?php
										if(isset($errors) && in_array('soluong',$errors)){
											echo "<p class='warning'>Bạn chưa điền thông tin vào sô lượng.</p>";
										}
									?>
								</label>
								<input type="text" name="soluong" id="soluong" 
								value="<?php if(isset($soluong)) echo $soluong;?>" size="20" maxlength="150" tabindex="1" />
							</div>
							
							
							<div align="center">
								<label for="gia">Giá Nhập: <span class="required">*</span>
									<?php
										if(isset($errors) && in_array('gia',$errors)){
											echo "<p class='warning'>Bạn chưa điền thông tin vào giá.</p>";
										}
									?>
								</label>
								<input type="text" name="gia" id="gia" 
								value="<?php if(isset($gia)) echo $gia;?>" size="20" maxlength="150" tabindex="1" />
							</div>
							<div align="center">
								<label for="thue">Thuế: <span class="required">*</span>
									<?php
										if(isset($errors) && in_array('thue',$errors)){
											echo "<p class='warning'>Bạn chưa điền thông tin vào thuế.</p>";
										}
									?>
								</label>
								<input type="text" name="thue" id="thue" value="<?php if(isset($thue)) echo $thue;?>" size="20" maxlength="150" tabindex="1" />
							</div>
						</fieldset>
						<p align="center"><input type="submit" name="submit" value="Sửa đơn hàng" /></p>
					
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