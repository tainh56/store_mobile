<?php 
	mysql_connect('localhost','root','');
	mysql_select_db('store_mb');
	?>
<?php include('../includes/header-admin.php');?>
<?php include('../includes/body-left-admin.php');?>
        
	<div class="right-area w775px left-fl pd10">
    <div id="bang">
    	<h2>Quản lí đặc điểm mặt hàng</h2><br /><br />
        <table>
        	<thead>
                <tr>
                    <th>Mã Đặc Điểm</th>
                    <th>Tên Đặc Điểm</th>
                    <th>Mô tả chi tiết</th>
                    <th>Xuất sứ</th>
                    <th>Bảo Hành</th>
                    <th>Màu sắc</th>
                    <th>Tình trạng</th>
                    <th>Trạng thái</th>
                    <th>Khuyến mãi</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            	<?php
                	$query = "Select * from dacdiem";
					$query_run = mysql_query($query);
					
					if(mysql_num_rows($query_run) != 0 ){
						while($row = mysql_fetch_array($query_run)){
							echo "<tr>
								<td>{$row['ID_DacDiem']}</td>
								<td>{$row['TenDacDiem']}</td>
								<td>{$row['MoTa']}</td>
								<td>{$row['XuatSu']}</td>
								<td>{$row['BaoHanh']}</td>
								<td>{$row['MauSac']}</td>
								<td>{$row['TinhTrang']}</td>
								<td>{$row['TrangThai']}</td>
								<td>{$row['KhuyenMai']}</td>
								<td><a class='edit' href='editDDMH.php?editid={$row['ID_DacDiem']}'>Edit</a></td>
								<td><a class='delete'href='deleteDDMH.php?del_id=
								{$row['ID_DacDiem']}'>Delete</a></td>
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