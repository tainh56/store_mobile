<?php 
	mysql_connect('localhost','root','');
	mysql_select_db('store_mb');
	?>
<?php include('../includes/header-admin.php');?>
<?php include('../includes/body-left-admin.php');?>
        
	<div class="right-area w775px left-fl pd10">
    <div id="bang">
    	<?php 
			if( isset($_GET['act']) && isset($_GET['act']) && $_GET['act'] == 'hdtt' && $_GET['hd']== 'nhap'){
		?>
    	<h2>Thanh toán hóa đơn nhập</h2><br /><br />
        <table>
        	<thead>
                <tr>
                    <th>Mã Đơn Hàng</th>
                    <th>Tên mặt hàng</th>
                    <th>Tên NCC</th>
                    <th>Số Lượng</th>
                    <th>Đơn giá nhập</th>
                    <th>Tổng tiền</th>
                    <th>Thuế</th>
                    <th>Ngày lập</th>
                </tr>
            </thead>
            <tbody>
            	<?php
                	$query = "Select * from vInHDN";
					$query_run = mysql_query($query);
					
					if(mysql_num_rows($query_run) != 0 ){
						while($row = mysql_fetch_array($query_run)){
							echo "<tr>
								<td>{$row['ID_DH']}</td>
								<td>{$row['TenMatHang']}</td>
								<td>{$row['TenNSX']}</td>
								<td>{$row['SoLuong']}</td>
								<td>{$row['GiaNhap']}</td>
								<td>{$row['TongTien']}</td>
								<td>{$row['Thue']}</td>
								<td>{$row['NgayLap']}</td>
								
								</tr>";
						}
					}else{
						echo "Không có thông tin nào";
					}
				?>
                
            </tbody>
        
        </table>
        <?php
			}else if( isset($_GET['act']) && isset($_GET['act']) && $_GET['act'] == 'hdtt' && $_GET['hd']== 'xuat'){
				
		?>
        <h2>Thanh toán hóa đơn xuất</h2><br /><br />
        <table>
        	<thead>
                <tr>
                    <th>Mã Đơn Hàng</th>
                    <th>Tên mặt hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Số Lượng</th>
                    <th>Đơn giá nhập</th>
                    <th>Tổng tiền</th>
                    <th>Thuế</th>
                    <th>Ngày lập</th>
                </tr>
            </thead>
            <tbody>
            	<?php
                	$query_x = "Select * from vInHDX";
					$query_run_x = mysql_query($query_x);
					
					if(mysql_num_rows($query_run_x) != 0 ){
						while($row = mysql_fetch_array($query_run_x)){
							echo "<tr>
								<td>{$row['ID_DH']}</td>
								<td>{$row['TenMatHang']}</td>
								<td>{$row['TenKhachHang']}</td>
								<td>{$row['SoLuong']}</td>
								<td>{$row['GiaBan']}</td>
								<td>{$row['TongTien']}</td>
								<td>{$row['Thue']}</td>
								<td>{$row['NgayLap']}</td>
								
								</tr>";
						}
					}else{
						echo "Không có thông tin nào";
					}
			}
				?>
                
            </tbody>
        
        </table>
        </div>
    </div>
    
    </div>
</div>
<!--END-MAINBODY-->
<?php include('../includes/footer.php');?>
</body>
</html>