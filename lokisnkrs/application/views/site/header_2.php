<?php
	if(isset($_SESSION['login_mem'])) {
		$username = $_SESSION['login_mem'];
		$sql = "select * from member where member_id = $username";
		$run = mysql_query($sql);
		$mem = mysql_fetch_array($run);	}
	if(isset($_SESSION['count']))
		$count_pd = $_SESSION['count'];
	else
		$count_pd = 0;
	if(isset($_GET['ac'])&&$_GET['ac']=='logout') {
		unset($_SESSION['login_mem']);
		echo '<script> location.replace("index.php"); </script>';
	}
?>
<header>
	<div class="container">
    	<div class="row">
        	<div class="top ">
            	<div class="logo col-md-2 col-sm-2 col-xs-4"><a href="index.php"><img src="images/logo.png" alt="LOGO"/></a></div>                   
                <form class="navbar-form navbar-left col-md-3 col-sm-3 col-xs-3" method="post" role="search" style="float: left;margin-top: 22px; margin-left: 50px;" action="index.php?view=search">
                    <div class="row">
                        <input type="text" name="txt_keyword" class="form-control" placeholder="Nhập sản phẩm cần tìm">
                        <button type="submit" class="btn btn-default" name="btn_search">Tìm kiếm</button>
                	</div>
                    
                </form>
                
                <div class="col-md-2 col-sm-2 col-xs-2" style="float: right;margin-top: 26px; color:#191919;"><!--gio hang-->
                    <a href="index.php?ac=logout" style="float:right;">
                        <div style="color:#333;"><img src="images/Exit_24px.png" alt="Cart"/> Đăng xuất</div>                           
                    </a>
                </div>
                
                <div class="col-md-2 col-sm-2 col-xs-2" style="float: right;margin-top: 26px; color:#191919;"><!--gio hang-->
                    <a href="cart.php" style="float:right;">
                        <div style="color:#333;"><img src="images/ShoppingCart_gr.png" alt="Cart"/> Giỏ hàng 
                        <span class="badge"><?php echo $count_pd;?></span></div>                           
                    </a>
                </div>
                
                <div class="col-md-2 col-sm-3 col-xs-4" style="float: right;margin-top: 5px;"><!--dang nhap-->
                    <div style="font-weight:bold; float:right;" >Hi, <?php echo $mem['member_name'];?></div>
                    <a href="signin.php?view=info" style="float:right;">
                        <div style="color:#333; padding-top:4px;"><img src="images/User_26px.png" alt="Login"/>  Tài khoản của bạn</div>                           
                    </a>	
                </div>
                
                <div class="clearfix"></div>
            </div>
    	</div><!--.row-->            
	</div><!--.container-->
</header>