<?php 
	mysql_connect('localhost','root','');
	mysql_select_db('store_mb');
	?>
<?php include('../includes/header-admin.php');?>
<?php include('../includes/body-left-admin.php');?>
        
	<div class="right-area w775px left-fl pd10">
    <div id="bang">
    	<h2>Quản lí khách hàng</h2><br /><br />
        <table>
        	<thead>
                <tr>
                    <th>Mã Khách Hàng</th>
                    <th>Tên Khách Hàng</th>
                    <th>Địa chỉ</th>
                    <th>Số ĐT</th>
                    <th>Email</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            	<?php
                	$query = "Select * from khachhang";
					$query_run = mysql_query($query);
					
					if(mysql_num_rows($query_run) != 0 ){
						while($row = mysql_fetch_array($query_run)){
							echo "<tr>
								<td>{$row['ID_KhachHang']}</td>
								<td>{$row['TenKhachHang']}</td>
								<td>{$row['DiaChi']}</td>
								<td>{$row['DienThoai']}</td>
								<td>{$row['Email']}</td>
								<td><a class='edit' href='editKH.php?editid={$row['ID_KhachHang']}&act=kh'>Edit</a></td>
								<td><a class='delete'href='deleteKH.php?del_id=
								{$row['ID_KhachHang']}&del_name={$row['TenKhachHang']}&act=kh'>Delete</a></td>
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