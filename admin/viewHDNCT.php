<?php 
	mysql_connect('localhost','root','');
	mysql_select_db('store_mb');
	?>
<?php include('../includes/header-admin.php');?>
<?php include('../includes/body-left-admin.php');?>
        
	<div class="right-area w775px left-fl pd10">
    <div id="bang">
    	<h2>Quản lí đơn hàng nhập chi tiết</h2><br /><br />
        <table>
        	<thead>
                <tr>
                    <th>Mã Đơn Hàng</th>
                    <th>Mã mặt hàng</th>
                    <th>Mã NCC</th>
                    
                    <th>Số Lượng</th>
                    <th>Đơn giá nhập</th>
                    <th>Thuế</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            	<?php
                	$query = "Select * from hoadonnhap";
					$query_run = mysql_query($query);
					
					if(mysql_num_rows($query_run) != 0 ){
						while($row = mysql_fetch_array($query_run)){
							echo "<tr>
								<td>{$row['ID_DH']}</td>
								<td>{$row['ID_MatHang']}</td>
								<td>{$row['ID_NSX']}</td>
								
								<td>{$row['SoLuong']}</td>
								<td>{$row['GiaNhap']}</td>
								<td>{$row['Thue']}</td>
								<td><a class='edit' href='editHDNCT.php?editid={$row['ID_DH']}&act=dhn'>Edit</a></td>
								<td><a class='delete'href='deleteHDNCT.php?del_id=
								{$row['ID_DH']}&act=dhn'>Delete</a></td>
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