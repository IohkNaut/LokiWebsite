<?php
	if(isset($_SESSION['login_ad'])) {
		$username = $_SESSION['login_ad'];
		$sql = "select * from admin where username = '$username'";
		$run = mysql_query($sql);
		$admin = mysql_fetch_array($run);	}
	if(isset($_GET['ac'])&&$_GET['ac']=='logout') {
		unset($_SESSION['login_ad']);
		echo '<script> location.replace("index.php"); </script>';
	}
?>
<header>
	<div class="container-fluid">
    	<div class="row">
        	<div class="top ">
            	<div class="logo col-md-2 col-sm-2 col-xs-4"><a href="index.php"><img src="../images/logo.png" alt="LOGO"/></a></div>                   
                <form class="navbar-form navbar-left col-md-4 col-sm-4 col-xs-4" method="post" role="form" style="float: left;margin-top: 22px; margin-left: 50px;" action="index.php?view=search" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="txt_keyword" class="form-control" placeholder="Nhập sản phẩm cần tìm" required="required" style="width:250px;">
                        <button type="submit" name="btn_search" class="btn btn-default">Tìm kiếm</button>
                    </div>
                    
                </form>

                <div class="col-md-2 col-sm-2 col-xs-4" style="float: right;margin-top: 26px; color:#191919;"><!--gio hang-->
                    <a href="index.php?ac=logout">
                        <div style="color:#333;"><img src="../images/Exit_24px.png" alt="Cart"/> Đăng xuất</div>                           
                    </a>
                </div>
                
                <div class="col-md-2 col-sm-2 col-xs-4" style="float: right;margin-top: 5px;"><!--dang nhap-->
                    <div style="padding-left:30px; font-weight:bold;">Hi, <?php echo $admin['admin_name'];?></div>
                    <a href="">
                        <div style="color:#333; padding-top:4px;"><img src="../images/User_26px.png" alt="Login"/>  Đổi mật khẩu</div                           
                    ></a>	
                </div>
                
                <div class="clearfix"></div>
            </div>
    	</div><!--.row-->            
	</div><!--.container-->
</header>