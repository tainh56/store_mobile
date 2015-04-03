<?php 
	mysql_connect('localhost','root','');
	mysql_select_db('store_mb');
	?>
<?php include('../includes/header-admin.php');?>
<?php include('../includes/body-left-admin.php');?>
        
	<div class="right-area w775px left-fl pd10">
    <div id="bang">
    	<h2>Quản lí đơn hàng nhập</h2><br /><br />
        <table>
        	<thead>
                <tr>
                    <th>Mã Đơn Hàng</th>
                    <th>Loại Đơn Hàng</th>
                    
                    <th>Người lập</th>
                    <th>Ngày lập</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            	<?php
                	$query = "Select * from donhang  where ID_DH like 'DHN%'";
					$query_run = mysql_query($query);
					
					if(mysql_num_rows($query_run) != 0 ){
						while($row = mysql_fetch_array($query_run)){
							echo "<tr>
								<td>{$row['ID_DH']}</td>
								<td>{$row['ID_LOAIDH']}</td>
								
								<td>{$row['NguoiLap']}</td>
								<td>{$row['NgayLap']}</td>
								<td><a class='edit' href='editDHN.php?editid={$row['ID_DH']}&act=dhn'>Edit</a></td>
								<td><a class='delete'href='deleteDHN.php?del_id=
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