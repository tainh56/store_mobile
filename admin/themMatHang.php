<?php 
	mysql_connect('localhost','root','');
	mysql_select_db('store_mb');
	?>
<?php include('../includes/header-admin.php');?>
<?php include('../includes/body-left-admin.php');?>
        
	<div class="right-area w775px left-fl pd10">
    <div id="form">
    <h2>Tạo mới mặt hàng</h2>
    <br />
    <br />
                <?php 
					if($_SERVER['REQUEST_METHOD'] == 'POST'){//neu gia tri ton tai thi xu ly form
						$errors = array();
						if(empty($_POST['tenmh'])){
							$errors[] = 'tenmh';
						}else{
							$tenmh = $_POST['tenmh'];
						}
						
						if(empty($_POST['gianhap']) || $_POST['gianhap'] == ''){
							$errors[] = 'gianhap';
						}else{
							$gianhap = $_POST['gianhap'];
						}
						if(empty($_POST['giaxuat']) || $_POST['giaxuat'] == ''){
							$errors[] = 'giaxuat';
						}else{
							$giaxuat = $_POST['giaxuat'];
						}
						
						if(isset($_POST['madd']) && $_POST['madd'] != ''){
							$madd = $_POST['madd'];
						}else{
							$errors[] = 'madd';
						}
						if(isset($_POST['mamh']) && $_POST['mamh'] != ''){
							$mamh = $_POST['mamh'];
						}else{
							$errors[] = 'mamh';
						}
						if(isset($_POST['mansx']) && $_POST['mansx'] != ''){
							$mansx = $_POST['mansx'];
						}else{
							$errors[] = 'mansx';
						}
						if(empty($_POST['soluong']) || $_POST['soluong'] == ''){
							$errors[] = 'soluong';
						}else{
							$soluong = $_POST['soluong'];
						}
						$image = $_FILES['image']['name'];
						$tmp_image = $_FILES['image']['tmp_name'];
						if(empty($errors)){
							
                                
							move_uploaded_file($tmp_image,"images/$image");
							$query_dh = "Insert into
							mathang(ID_MatHang,TenMatHang,ID_NSX,ID_DacDiem,SoLuong,GiaNhap,GiaXuat,NgayThang,image) 
							values('$mamh','$tenmh','$mansx','$madd',$soluong,$gianhap,$giaxuat,now(),'$image')";
							//$query_dhct = "Insert into chitietdonhang(ID_DH,ID_MatHang,SoLuong,Gia) values('$madh','$mamh',$soluong,$gia)";
							$run_dh = mysql_query($query_dh);// or die("Query ($query_dh) \n<br/> Mysql Error: ". mysqli_error());
							
							if(mysql_affected_rows() == 1){
								$message = "<p class='success'>Đơn hàng đã được thêm vào thành công.</p>";
								$madd = '';
								$soluong = '';
								$giaxuat = '';
								$gianhap = '';
								
								$mamh = '';
								
								echo "<script>alert('Post published successfully')</script>";
								echo "<script>window.open('viewMatHang.php','_self')</script>";
							}else{
								$message = "<p class='warning'>Hệ thống lỗi! Không thêm thêm dữ liệu vào database.</p>";
							}
						}else
							$message = "<p class='warning'>Bạn chưa điền đầy đủ thông tin vào các trường.</p>";
						
						echo $message;
					}
				
				?>
                	
                       
               
                
                <form method="post" action="" enctype="multipart/form-data">
    	<table width="600" align="center" border="5">
        	<tr>
            	<td align="center" bgcolor="#FFCBA0" colspan="6"><h1>Thêm mặt hàng mới</h1></td>
            </tr>
            <tr>
            	<td align="right">Mã mặt hàng</td>
                <td>
                	<?php
                                	if(isset($errors) && in_array('mamh',$errors)){
										echo "<p class='warning'>Bạn chưa điền thông tin vào mặt hàng.</p>";
									}
								?>
                            
                            <input type="text" name="mamh" id="mamh" value="<?php if(isset($mamh)) echo $mamh;?>" size="20" maxlength="150" tabindex="1" />
                                    
                 </td>
            </tr>
            <tr>
            	<td align="right">Tên mặt hàng</td>
                <td>
                            	<?php
                                	if(isset($errors) && in_array('tenmh',$errors)){
										echo "<p class='warning'>Bạn chưa điền thông tin vào tên mặt hàng.</p>";
									}
								?>
                            </label>
                            <input type="text" name="tenmh" id="tenmh" 
                            value="<?php if(isset($tenmh)) echo $tenmh;?>" size="20" maxlength="150" tabindex="1" />
                            </td>
            </tr>
            <tr>
            	<td align="right">Mã NCC:</td>
                <td>
                            	<?php
                                	if(isset($errors) && in_array('mansx',$errors)){
										echo "<p class='warning'>Bạn chưa chọn mã mặt hàng.</p>";
									}
								?>
                            </label>
                            <select name="mansx" tabindex="3">
                            	<?php
                                $q_makh = "Select ID_NSX from nhasanxuat";
								$r_makh = mysql_query($q_makh);								
									if(mysql_num_rows($r_makh) != 0){
										while($num = mysql_fetch_array($r_makh)){
											if(isset($mansx) && $mansx == $num['ID_NSX']) 
												echo "<option selected='selected'>".$num['ID_NSX']."</option>";
											else
												echo "<option>".$num['ID_NSX']."</option>";
										}
									}
								
								?></td>
            </tr>
            <tr>
            	<td align="right">Mã đặc điểm</td>
                <td>
                            	
                            <?php
                            	if(isset($errors) && in_array('madd',$errors)){
                                	echo "<p class='warning'>Bạn chưa chọn mã đặc điểm</p>";
                                }
                            ?>
                                
                                <select name="madd" tabindex="1">
                                    <?php
                                    $q_makh = "Select ID_DacDiem from dacdiem";
                                    $r_makh = mysql_query($q_makh);								
                                        if(mysql_num_rows($r_makh) != 0){
                                            while($num = mysql_fetch_array($r_makh)){
                                                if(isset($madd) && $madd == $num['ID_DacDiem']) 
                                                    echo "<option selected='selected'>".$num['ID_DacDiem']."</option>";
                                                else
                                                    echo "<option>".$num['ID_DacDiem']."</option>";
                                            }
                                        }
                                    
                                    ?>
                                    
                                </select>
                            
                </td>
            </tr>
            <tr>
            	<td align="right">Số lượng</td>
                <td>
                            	<?php
                                	if(isset($errors) && in_array('soluong',$errors)){
										echo "<p class='warning'>Bạn chưa điền thông tin vào sô lượng.</p>";
									}
								?>
                            </label>
                            <input type="text" name="soluong" id="soluong" 
                            value="<?php if(isset($soluong)) echo $soluong;?>" size="20" maxlength="150" tabindex="1" />
                </td>
            </tr>
            <tr>
            	<td align="right">Giá nhập</td>
                <td>
                            	<?php
                                	if(isset($errors) && in_array('gianhap',$errors)){
										echo "<p class='warning'>Bạn chưa điền thông tin vào giá nhập.</p>";
									}
								?>
                            </label>
                            <input type="text" name="gianhap" id="gianhap" 
                            value="<?php if(isset($gianhap)) echo $gianhap;?>" size="20" maxlength="150" tabindex="1" />
                </td>
            </tr>
            <tr>
            	<td align="right">Giá xuất</td>
                <td>
                	
                            	<?php
                                	if(isset($errors) && in_array('giaxuat',$errors)){
										echo "<p class='warning'>Bạn chưa điền thông tin vào giá xuất.</p>";
									}
								?>
                            </label>
                            <input type="text" name="giaxuat" id="giaxuat" 
                            value="<?php if(isset($giaxuat)) echo $giaxuat;?>" size="20" maxlength="150" tabindex="1" />
                </td>
            </tr>
             <tr>
            	<td align="right">Upload Image</td>
                <td><input type="file" name="image"></td>
            </tr>
            <tr>
                <td align="center" colspan="6"><input type="submit" name="submit" value="Thêm" ></td>
            </tr>
        </table>
    </form>
    </div>
    </div>
    
    </div>
</div>
<!--END-MAINBODY-->
<?php include('../includes/footer.php');?>
</body>
</html>