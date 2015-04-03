<?php 
	mysql_connect('localhost','root','');
	mysql_select_db('store_mb');
?>
<?php include('../includes/header-admin.php');?>
<?php
	  	
	if(isset($_GET['del_id'])){
		$del_id = $_GET['del_id'];
		
	}else{
		header('Location: admin.php');
	}
?>
<?php include('../includes/body-left-admin.php');?>

        
        
   
	<div class="right-area w775px left-fl pd10">
    <div id="form">
    <?php
	  	
	if(isset($_GET['del_id'])){
		$del_id = $_GET['del_id'];
		
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if(isset($_POST['delete']) && $_POST['delete'] == 'yes'){
				$del_query = "Delete from donhang where ID_DH='$del_id'";
				$del_run = mysql_query($del_query) or die("Query ($del_query) \n<br/> Mysql Error: ". mysql_error());;
				if(mysql_affected_rows() == 1){
					$message = "<p class='success'>Đã xóa thành công</p>";
					echo "<script>window.open('viewDHX.php?act=dhx','_self')</script>";
				}
				else{
					$message = "<p class='warning'>Lỗi hệ thống. Xóa dữ liệu không hoàn thành.</p>";
				}
			}else{
				$message = "<p class='warning'>Bạn không nên xóa.</p>";
			}
		}
	}
?>
    <h2>Xóa ĐH xuất: <?php if(isset($del_name)) echo htmlentities($del_name,ENT_COMPAT,'UTF-8');?></h2>
    <?php if(!empty($message)) echo $message;?>
    <br />
    <br />
    <form action="" method="post">
    	<fieldset>
        	<legend>Xóa đơn hàng xuất</legend>
            	<label for="delete">Bạn có chắc chắn?</label>
                <div id="yes" align="center">          	
                    <input type="radio" name="delete" value="yes" checked="checked" /> Yes
                    <input type="radio" name="delete" value="no" /> No 
                </div>
                
                <br />
                <div align="center">
                	<input type="submit" name="submit" value="Delete" onclick="return confirm('Bạn có chắc chắn?');">
                </div>
        </fieldset>
    
    </form>
    </div>
    </div>
    
    </div>
</div>
<!--END-MAINBODY-->
<?php include('../includes/footer.php');?>
</body>
</html>