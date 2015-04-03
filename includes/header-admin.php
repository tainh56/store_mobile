<?php session_start();
	if(!isset($_SESSION['quyen'])){
		header("Location: ../login.php");
	}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Well Come To WebSite Mobile</title>
<link rel="stylesheet" media="screen" href="css/bootraps/bootstrap.css" />
<link rel="stylesheet" media="screen" href="css/bootraps/bootstrap-responsive.css" />
<link rel="stylesheet" media="screen" href="css/main.css" />
<link rel="stylesheet" media="screen" href="css/style.css" />
<script src="js/bootraps/bootstrap.js"></script>
<script src="js/bootraps/bootstrap.min.js"></script>
</head>

<body>
<!--HEADRER-->
<div class="header">
	<div class="topheader">
    	<div class="topheader-inner w1020px marginauto">	
        	<ul class="pull-right">
            	<li class="topnav-active"><a href="#">About Us</a></li>
               
                
                
                <li><?php if(isset($_SESSION['user_name']))
						echo "<a href='../logout.php'>Logout";
						else echo "<a href='login.php'>Đăng nhập";
					?></a></li>
                
            </ul>
            
        </div>
    </div><!--End topheader-->
    
    <div class="branch">
    	<div class="w1020px marginauto">
			<div class="pull-left">
            <img src="images/icon-logo/logo-260x90.png" />
            </div>
            <div class="pull-right">
            <img src="images/icon-logo/banner-top.png" />
            </div>
        </div>
    </div><!--End branch-->
    
    <div class="navbar">
    	<div class="navbar-inner">
        	<div class="w1020px marginauto">
            	<ul class="nav ">
                    <li class="active">
                    <a href="admin.php">Trang quản lí</a></li>
                    <li class="divider-vertical"></li>       
               
                </ul>
                <ul class="nav pull-right">
                	<li class="divider-vertical"></li>
                    <li><?php if(isset($_SESSION['user_name']))
						echo "Chào ". $_SESSION['user_name'];
					?>
                    </li>
                </ul>
            </div>
        </div>
    </div><!--End navbar-->

</div>
<!--END-HEADRER-->
