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
    <h2>Chỉnh sửa Nhà cung cấp</h2>
    <br />
    <br />
                <?php 
				
					if(isset($_GET['editid'])){
						$edit_id = $_GET['editid'];
					
						$get_query = "Select * from nhasanxuat where ID_NSX = '$edit_id'";
						$get_run = mysql_query($get_query);
						if(mysql_num_rows($get_run) != 0){
							while($row = mysql_fetch_array($get_run)){
								$mansx = $row['ID_NSX'];
								$tennsx = $row['TenNSX'];
								$diachi = $row['DiaChi'];
								$sodt = $row['DienThoai'];
								$email = $row['Email'];
							}
						}
								
					if($_SERVER['REQUEST_METHOD'] == 'POST'){//neu gia tri ton tai thi xu ly form
						$errors = array();
						if(empty($_POST['mansx'])){
							$errors[] = 'mansx';
							$mansx = '';
						}else{
							$mansx = $_POST['mansx'];
						}
						
						if(empty($_POST['tennsx'])){
							$errors[] = 'tennsx';
							$tennsx = '';
						}else{
							$tennsx = $_POST['tennsx'];
						}
						
						if(empty($_POST['diachi'])){
							$errors[] = 'diachi';
							$diachi = '';
						}else{
							$diachi = $_POST['diachi'];
						}
						
						if(empty($_POST['sodt'])){
							$errors[] = 'sodt';
							$sodt = '';
						}else{
							$sodt = $_POST['sodt'];
						}
						
						if(empty($_POST['email'])){
							$errors[] = 'email';
							$email = '';
						}else{
							$email = $_POST['email'];
						}
						
						if(empty($errors)){
							$query = "Update nhasanxuat set ID_NSX='$mansx',
							TenNSX='$tennsx',DiaChi='$diachi',DienThoai='$sodt',
							Email='$email' where ID_NSX='$edit_id'";
							$run = mysql_query($query) or die("Query ($query) \n<br/> Mysql Error: ". mysql_error());
						
							if(mysql_affected_rows() == 1){
								$message = "<p class='success'>Sản phẩm đã được sửa thành công.</p>";
								$mansx = '';
								$tennsx = '';
								$diachi = '';
								$sodt = '';
								$email = '';
								echo "<script>alert('Chỉnh sửa thành công')</script>";
								echo "<script>window.open('viewNSX.php?act=nsx','_self')</script>";
							}else{
								$message = "<p class='warning'>Hệ thống lỗi! Không thêm thêm dữ liệu vào database.</p>";
							}
						}else
							$message = "<p class='warning'>Bạn chưa điền đầy đủ thông tin vào các trường.</p>";
						
						echo $message;
					}
				
				?>
                <?php
					
				?>
                <form id="add_cat" action="" method="post">
                	<fieldset>
                    	<legend>Sửa NCC</legend>
                        <div align="center">
                        	<label for="category">Mã NCC: <span class="required">*</span>
                            	<?php
                                	if(isset($errors) && in_array('mansx',$errors)){
										echo "<p class='warning'>Bạn chưa điền thông tin vào mã khách hàng.</p>";
									}
								?>
                            </label>
                            <input type="text" name="mansx" id="mansx" value="<?php if(isset($mansx))echo $mansx;?>" size="20" maxlength="150" tabindex="1" />
                        </div>
                         <div align="center">
                        	<label for="category">Tên NCC: <span class="required">*</span>
                            	<?php
                                	if(isset($errors) && in_array('tennsx',$errors)){
										echo "<p class='warning'>Bạn chưa điền thông tin vào tên khách hàng.</p>";
									}
								?>
                            </label>
                            <input type="text" name="tennsx" id="tennsx" value="<?php if(isset($tennsx)) echo $tennsx;?>" size="20" maxlength="150" tabindex="1" />
                        </div>
                        <div align="center">
                        	<label for="category">Địa chỉ: <span class="required">*</span>
                            	<?php
                                	if(isset($errors) && in_array('diachi',$errors)){
										echo "<p class='warning'>Bạn chưa điền thông tin vào địa chỉ.</p>";
									}
								?>
                            </label>
                            <input type="text" name="diachi" id="diachi" value="<?php if(isset($diachi)) echo $diachi;?>" size="20" maxlength="150" tabindex="1" />
                        </div>
                         <div align="center">
                        	<label for="category">Số ĐT: <span class="required">*</span>
                            	<?php
                                	if(isset($errors) && in_array('sodt',$errors)){
										echo "<p class='warning'>Bạn chưa điền thông tin vào Số ĐT.</p>";
									}
								?>
                            </label>
                            <input type="text" name="sodt" id="sodt" value="<?php if(isset($sodt)) echo $sodt;?>" size="20" maxlength="150" tabindex="1" />
                        </div>
                         <div align="center">
                        	<label for="category">Email: <span class="required">*</span>
                            	<?php
                                	if(isset($errors) && in_array('email',$errors)){
										echo "<p class='warning'>Bạn chưa điền thông tin vào email.</p>";
									}
								?>
                            </label>
                            <input type="text" name="email" id="email" value="<?php if(isset($email)) echo $email;?>" size="20" maxlength="150" tabindex="1" />
                        </div>
                    </fieldset>
                    <p align="center"><input type="submit" name="submit" value="Sửa" /></p>
                
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