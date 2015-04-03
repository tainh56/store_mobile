<?php 
	mysql_connect('localhost','root','');
	mysql_select_db('store_mb');
	?>
<?php include('../includes/header-admin.php');?>
<?php include('../includes/body-left-admin.php');?>
        
	<div class="right-area w775px left-fl pd10">
    <div id="bang">
    	<h2>Quản lí mặt hàng</h2><br /><br />
        <table>
        	<thead>
                <tr>
                    <th>Mã Mặt Hàng</th>
                    <th>Tên mặt hàng</th>
                    <th>Mã NCC</th>
                    <th>Mã Đặc Điểm</th>
                    <th>Số Lượng</th>
                    <th>Đơn giá nhập</th>
                    <th>Đơn giá xuất</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            	<?php
                	$query = "Select * from mathang";
					$query_run = mysql_query($query);
					
					if(mysql_num_rows($query_run) != 0 ){
						while($row = mysql_fetch_array($query_run)){
							echo "<tr>
								<td>{$row['ID_MatHang']}</td>
								<td>{$row['TenMatHang']}</td>
								<td>{$row['ID_NSX']}</td>
								<td>{$row['ID_DacDiem']}</td>
								<td>{$row['SoLuong']}</td>
								<td>{$row['GiaNhap']}</td>
								<td>{$row['GiaXuat']}</td>
								<td><img src='images/{$row['image']}' width='80' height='80' /></td>
								<td><a class='edit' href='editMatHang.php?editid={$row['ID_MatHang']}&act=mh'>Edit</a></td>
								<td><a class='delete'href='deleteMatHang.php?del_id={$row['ID_MatHang']}act=mh'>Delete</a></td>
								</tr>";
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