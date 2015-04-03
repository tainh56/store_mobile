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
            <a href="/dien-thoai/maxfone-22.aspx">Login</a>
        </span>
        </span>
    </div>
    <!--end--title-->
    	 <?php 
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Bat dau xu ly form. Tao bien $errors
        $errors = array();
        
        // Validate email
        if(isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $e = mysql_real_escape_string($_POST['email']); 
        } else {
            $errors[] = 'email';
        }
        
        // Validate password
        if(isset($_POST['password']) && preg_match('/^[\w]{4,20}$/', $_POST['password'])) {
            $p = mysql_real_escape_string($_POST['password']);
        } else {
            $errors[] = 'password';
        }
        if(empty($errors)) {
            // Bat dau truy van CSDL de lay thong tin nguoi dung
            $q = "SELECT user_id, user_name, quyen FROM users WHERE (email = '{$e}' AND user_pass = $p) LIMIT 1";
            $r = mysql_query($q);
            if(mysql_num_rows($r) == 1) {
                
                // Neu tim thay thong tin nguoi dung trong CSDL, se chuyen huong nguoi dung ve trang thich hop.
                list($uid, $user_name, $user_level) = mysql_fetch_array($r, MYSQL_NUM);
                $_SESSION['user_id'] = $uid;
                $_SESSION['user_name'] = $user_name;
                $_SESSION['quyen'] = $user_level;
                if($_SESSION['quyen'] == 2){
					header("Location: admin/admin.php");
				}                
                else header("Location: index.php");
            } else {
                $message = "<p class='error'>The email or password do not match those on file. Or you have not activated your account.</p>";
            }
        } else {
            $message = "<p class='erorr'>Please fill in all the required fields.</p>";
        }
    
    } // END MAIN IF
    ?>
    
<div id="content">
	
    <?php if(!empty($message)) echo $message; ?>
    <form id="login" action="" method="post">
        <fieldset>
        	<legend>Login</legend>
            	<div>
                    <label for="email">Email:
                        <?php if(isset($errors) && in_array('email',$errors)) echo "<span class='warning'>Please enter your email.</span>";?>
                    </label>
                    <input type="text" name="email" id="email" value="<?php if(isset($_POST['email'])) {echo htmlentities($_POST['email']);} ?>" size="20" maxlength="80" tabindex="1" />
                </div>
                <div>
                    <label for="pass">Password:
                        <?php if(isset($errors) && in_array('password',$errors)) echo "<span class='warning'>Please enter your password.</span>";?>
                    </label>
             <input type="password" name="password" id="pass" value="" size="20" maxlength="20" tabindex="2" />
                </div>
        </fieldset>
        <div><input type="submit" name="submit" value="Login" /></div>
    </form>
          
            
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