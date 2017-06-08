<div class="container">
    <div class="top ">
        <div class="row">
            <div class="logo col-md-2 col-sm-3 col-xs-4"><a href="index.php"><img src="<?php base_url();?>upload/logo.png" alt="LOGO"/></a></div>                   
            <form class="navbar-form col-md-4 col-sm-6 col-xs-4" method="post" enctype="multipart/form-data" style="margin-top: 22px; margin-left: 50px;" action="index.php?view=search">
                <div class="row">
                    <input type="text" name="txt_keyword" class="form-control" placeholder="Nhập sản phẩm cần tìm">
                    <button type="submit" class="btn btn-default" name="btn_search">Tìm kiếm</button>
                </div>
                
            </form>
            
            <div class="col-md-3 col-sm-6 col-xs-6" style="margin-top: 26px; margin-left:50px;"><!--dang nhap-->
                <a href="signin.php">
                    <div style="color:#333;"><img src="<?php base_url();?>upload/User_26px.png" alt="Login"/>  Đăng nhập hoặc Đăng ký</div>                           
                </a>	
            </div>
            <?php
				if(isset($_SESSION['count']))
					$count_pd = $_SESSION['count'];
				else
					$count_pd = 0;
			?>
            <div class="col-md-2 col-sm-6 col-xs-6" style="margin-top: 26px; color:#191919;"><!--gio hang-->
                <a href="cart.php">
                    <div style="color:#333;"><img src="<?php base_url();?>upload/ShoppingCart_gr.png" alt="Cart"/> Giỏ hàng <span class="badge"><?php echo $count_pd;?></span></div>
                                               
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div><!--.row-->            
</div><!--.container-->