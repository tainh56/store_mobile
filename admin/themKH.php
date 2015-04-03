<?php include('../includes/mysql_connect.php')?>
<?php include('../includes/header-admin.php');?>
<?php include('../includes/body-left-admin.php');?>
        
	<div class="right-area w775px left-fl pd10">
    <div id="form">
    <h2>Tạo mới khách hàng</h2>
    <br />
    <br />
                <?php 
					if($_SERVER['REQUEST_METHOD'] == 'POST'){//neu gia tri ton tai thi xu ly form
						$errors = array();
						if(empty($_POST['makh'])){
							$errors[] = 'makh';
						}else{
							$makh = $_POST['makh'];
						}
						
						if(empty($_POST['tenkh'])){
							$errors[] = 'tenkh';
						}else{
							$tenkh = $_POST['tenkh'];
						}
						
						if(empty($_POST['diachi'])){
							$errors[] = 'diachi';
						}else{
							$diachi = $_POST['diachi'];
						}
						
						if(empty($_POST['sodt'])){
							$errors[] = 'sodt';
						}else{
							$sodt = $_POST['sodt'];
						}
						
						if(empty($_POST['email'])){
							$errors[] = 'email';
						}else{
							$email = $_POST['email'];
						}
						
						if(empty($errors)){
							$query = "Insert into khachhang(ID_KhachHang,TenKhachHang,DiaChi,DienThoai,Email) values('$makh','$tenkh','$diachi','$sodt','$email');";
							$run = mysqli_query($dbc,$query);// or die("Query ($query) \n<br/> Mysql Error: ". mysqli_error($dbc));
							//$message = "Lỗi hệ thống!Mã khách hàng đã tồn tại.";
						
							if(mysqli_affected_rows($dbc) == 1){
								$message = "<p class='success'>Khách Hàng đã được thêm vào thành công.</p>";
							}else{
								$message = "<p class='warning'>Hệ thống lỗi! Mã KH bị trùng. Không thêm thêm dữ liệu vào database.</p>";
							}
						}else
							$message = "<p class='warning'>Bạn chưa điền đầy đủ thông tin vào các trường.</p>";
						
						echo $message;
					}
				
				?>
                <form id="add_cat" action="" method="post">
                	<fieldset>
                    	<legend>Thêm khách hàng</legend>
                        <div align="center">
                        	<label for="category">Mã khách hàng: <span class="required">*</span>
                            	<?php
                                	if(isset($errors) && in_array('makh',$errors)){
										echo "<p class='warning'>Bạn chưa điền thông tin vào mã khách hàng.</p>";
									}
								?>
                            </label>
                            <input type="text" name="makh" id="makh" value="" size="20" maxlength="150" tabindex="1" />
                        </div>
                         <div align="center">
                        	<label for="category">Tên khách hàng: <span class="required">*</span>
                            	<?php
                                	if(isset($errors) && in_array('tenkh',$errors)){
										echo "<p class='warning'>Bạn chưa điền thông tin vào tên khách hàng.</p>";
									}
								?>
                            </label>
                            <input type="text" name="tenkh" id="tenkh" value="" size="20" maxlength="150" tabindex="1" />
                        </div>
                        <div align="center">
                        	<label for="category">Địa chỉ: <span class="required">*</span>
                            	<?php
                                	if(isset($errors) && in_array('diachi',$errors)){
										echo "<p class='warning'>Bạn chưa điền thông tin vào địa chỉ.</p>";
									}
								?>
                            </label>
                            <input type="text" name="diachi" id="diachi" value="" size="20" maxlength="150" tabindex="1" />
                        </div>
                         <div align="center">
                        	<label for="category">Số ĐT: <span class="required">*</span>
                            	<?php
                                	if(isset($errors) && in_array('sodt',$errors)){
										echo "<p class='warning'>Bạn chưa điền thông tin vào Số ĐT.</p>";
									}
								?>
                            </label>
                            <input type="text" name="sodt" id="sodt" value="" size="20" maxlength="150" tabindex="1" />
                        </div>
                         <div align="center">
                        	<label for="category">Email: <span class="required">*</span>
                            	<?php
                                	if(isset($errors) && in_array('email',$errors)){
										echo "<p class='warning'>Bạn chưa điền thông tin vào email.</p>";
									}
								?>
                            </label>
                            <input type="text" name="email" id="email" value="" size="20" maxlength="150" tabindex="1" />
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