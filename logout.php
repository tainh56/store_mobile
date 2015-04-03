<?php 
	ob_start();
	mysql_connect('localhost','root','');
	mysql_select_db('store_mb');
	session_start();
?>

<?php include('includes/header.php');?>
<?php include('includes/body-left.php');?>
        
<!--Vung ben phai--><!--Vung ben phai--><!--Vung ben phai--><!--Vung ben phai--><!--Vung ben phai-->
<div class="right-area w775px left-fl pd10">
        	
	
            
<!--Nhom san pham-->
    <div class="group product clearfix">
    <!--title-->
    <div class="header2">
        <span class="title">
        <span>
            <a href="/dien-thoai/maxfone-22.aspx">Logout</a>
        </span>
        </span>
    </div>
    <!--end--title-->
    	<?php
        	// Neu co thong tin nguoi dung, va da dang nhap, se logout nguoi dung.
            $_SESSION = array(); // Xoa het array cua SESSIOM
            session_destroy(); // Destroy session da tao
            //setcookie(session_name(),'', time()-36000); // Xoa cookie cua trinh duyet
			header("Location: index.php");
		?>
        </div>
        <!--Vung ben phai-->
    </div>
</div>
<!--END-MAINBODY-->
<?php include('includes/footer.php');?>
</body>
</html>
<?php
	ob_flush();
?>