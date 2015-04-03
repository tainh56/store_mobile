<!--MAINBODY-->
<?php if(isset($_GET['act'])) $visited = $_GET['act'];?>
<div class="mainbody left-fl">
	<div class="mainbody-content w1020px marginauto">
    	<div class="left-area w220px left-fl">
        	<div id="body-left">
        	<div class="block menu-list branch-mobile "><h4 class="pd5x10"> Danh mục</h4>
            	<ul class="nav nav-list w190px bs-docs-sidenav ">
                	<li <?php if(isset($_GET['act']) && $visited == "mh") {echo "class='active'";}?>><a >Quản lí mặt hàng</a>
                    	<ul>
                        	<li><a href="themMatHang.php?act=mh">Thêm mặt hàng</a></li>
                        	<li><a href="viewMatHang.php?act=mh">View mặt hàng</a></li>
                            <li><a href="themDDMH.php?act=mh">Thêm đặc điểm MH</a></li>
                            <li><a href="viewDDMH.php?act=mh">View đặc điểm MH</a></li>
                        </ul>
                    </li>
                    <li <?php if(isset($_GET['act']) && $visited == "dhn") {echo "class='active'";}?>><a >Quản lí đơn hàng nhập</a>
                    	<ul>
                        	<li><a href="themDHN.php?act=dhn">Thêm đơn hàng nhập</a></li>
                            <li><a href="viewDHN.php?act=dhn">View đơn hàng nhập</a></li>
                            <li><a href="themHDNCT.php?act=dhn">Thêm đơn hàng nhập chi tiết</a></li>
                            <li><a href="viewHDNCT.php?act=dhn">View đơn hàng nhập chi tiết</a></li>
                            
                           
                        </ul>
                    </li>
                    <li <?php if(isset($_GET['act']) && $visited == "dhx") {echo "class='active'";}?>><a >Quản lí đơn hàng xuất</a>
                    	<ul>
                        	
                            <li><a href="themDHX.php?act=dhx">Thêm đơn hàng xuất</a></li>
                            <li><a href="viewDHX.php?act=dhx">View đơn hàng xuất</a></li>
                        	<li><a href="themHDXCT.php?act=dhx">Thêm đơn hàng xuất chi tiết</a></li>
                            <li><a href="viewHDXCT.php?act=dhx">View đơn hàng xuất chi tiết</a></li>
                           
                        </ul>
                    </li>
                    <li <?php if(isset($_GET['act']) && $visited == "kh") {echo "class='active'";}?>><a >Quản lí khách hàng</a>
                    	<ul>
                        	<li><a href="themKH.php?act=kh">Thêm khách hàng</a></li>
                        	<li><a href="viewKH.php?act=kh">View khách hàng</a></li>
                            
                        </ul>
                    </li>
                     <li <?php if(isset($_GET['act']) && $visited == "nsx") {echo "class='active'";}?>><a >Quản lí nhà cung cấp</a>
                    	<ul>
                        	<li><a href="themNSX.php?act=nsx">Thêm nhà cung cấp</a></li>
                        	<li><a href="viewNSX.php?act=nsx">View nhà cung cấp</a></li>
                            
                        </ul>
                    </li>
                    <li <?php if(isset($_GET['act']) && $visited == "hdtt") {echo "class='active'";}?>><a >Thống kê hóa Đơn thanh toán</a>
                    	<ul>
                        	<li><a href="viewTTNX.php?act=hdtt&hd=nhap">Nhập</a></li>
                        	<li><a href="viewTTNX.php?act=hdtt&hd=xuat">Xuất</a></li>
                            
                        </ul>
                    </li>
                </ul>
            </div>
           </div>
            
        </div>