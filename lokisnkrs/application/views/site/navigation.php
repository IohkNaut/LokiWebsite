<?php ob_start(); ?>
<div class="container">
	<div class="row ">
        <nav class="navbar navbar-default " role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="<?php echo base_url();?>/upload/Home_24px.png" style="padding-left:5px;"/></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav nav-tabs nav-justified navbar-static-top" style="padding-top:8px; font-size:14px;">
                        <li><a href="index.php?view=intro">Giới thiệu</a></li>
                        <li><a href="index.php?view=all&page=1">Sản phẩm</a></li>
                        <li><a href="index.php?view=size_guide">Hướng dẫn chọn size</a></li>
                        <li><a href="index.php?view=shop_guide">Hướng dẫn mua hàng</a></li>
                        <li><a href="index.php?view=news&page=1">Tin tức</a></li>
                        <li><a href="index.php?view=contact">Liên hệ</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->           	         
        </nav></div></div><?php ob_end_flush(); ?>