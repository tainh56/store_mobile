<?php 
	mysql_connect('localhost','root','');
	mysql_select_db('store_mb');
	?>
<?php include('../includes/header-admin.php');?>
<?php include('../includes/body-left-admin.php');?>
        
	<div class="right-area w775px left-fl pd10">
    <div id="form">
    <h2>Thêm đơn hàng xuất</h2>
    <br />
    <br />
                <?php 
					if($_SERVER['REQUEST_METHOD'] == 'POST'){//neu gia tri ton tai thi xu ly form
						$errors = array();
						if(empty($_POST['madh'])){
							$errors[] = 'madh';
						}else{
							$madh = $_POST['madh'];
						}
						
						
						if(empty($_POST['nguoilap'])){
							$errors[] = 'nguoilap';
						}else{
							$nguoilap = $_POST['nguoilap'];
						}
						if(isset($_POST['maldh'])){
							$maldh = $_POST['maldh'];
						}else{
							$errors[] = 'maldh';
						}
						
						if(empty($errors)){
							
                                
								
							$query_dh = "Insert into donhang(ID_DH,ID_LoaiDH,NguoiLap,NgayLap) values('$madh','$maldh','$nguoilap',now())";
							//$query_dhct = "Insert into chitietdonhang(ID_DH,ID_MatHang,SoLuong,Gia) values('$madh','$mamh',$soluong,$gia)";
							$run_dh = mysql_query($query_dh) or die("Query ($query_dh) \n<br/> Mysql Error: ". mysqli_error());
							//$run1 = mysql_affected_rows();
							
							//$run_dhct = mysql_query($query_dhct) or die("Query ($query) \n<br/> Mysql Error: ". mysqli_error());
							//$run2 = mysql_affected_rows();
							if(mysql_affected_rows() == 1){
								$message = "<p class='success'>Đơn hàng đã được thêm vào thành công.</p>";
								$madh = '';
								
								$nguoilap = '';
								$maldh = '';
								$mansx = '';
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
                    	<legend>Thêm đơn hàng xuất</legend>
                        <div align="center">
                        	<label for="madh">Mã đơn hàng: <span class="required">*</span>
                            	<?php
                                	if(isset($errors) && in_array('madh',$errors)){
										echo "<p class='warning'>Bạn chưa điền thông tin vào tên sản phẩm.</p>";
									}
								?>
                            </label>
                            <input type="text" name="madh" id="madh" value="<?php if(isset($madh)) echo $madh;?>" size="20" maxlength="150" tabindex="1" />
                        </div>
                        <div align="center">
                        	<label for="maldh">Mã Loại đơn hàng: <span class="required">*</span>
                            	<?php
                                	if(isset($errors) && in_array('maldh',$errors)){
										echo "<p class='warning'>Bạn chưa chọn hãng sản phẩm.</p>";
									}
								?>
                            </label>
                            <select name="maldh" tabindex="2">
                           		<?php
                                $q_makh = "Select ID_LoaiDH from loaidh";
								$r_makh = mysql_query($q_makh);								
									if(mysql_num_rows($r_makh) != 0){
										while($num = mysql_fetch_array($r_makh)){
											if(isset($maldh) && $maldh == $num['ID_LoaiDH']) 
												echo "<option selected='selected'>".$num['ID_LoaiDH']."</option>";
											else
												echo "<option>".$num['ID_LoaiDH']."</option>";
										}
									}
								
								?>
                            	
                            </select>
                            
                        </div>
                      
                        
                        
                       
                        <div align="center">
                        	<label for="nguoilap">Người lập: <span class="required">*</span>
                            	<?php
                                	if(isset($errors) && in_array('nguoilap',$errors)){
										echo "<p class='warning'>Bạn chưa điền thông tin vào người lập.</p>";
									}
								?>
                            </label>
                            <input type="text" name="nguoilap" id="nguoilap" value="<?php if(isset($nguoilap)) echo $nguoilap;?>" size="20" maxlength="150" tabindex="1" />
                        </div>
                    </fieldset>
                    <p align="center"><input type="submit" name="submit" value="Thêm" /></p>
                
                </form>
    </div>
    </div>
    
    </div>
</div>
<!--END-MAINBODY-->
<?php include('../includes/footer.php');?>
</body>
</html>