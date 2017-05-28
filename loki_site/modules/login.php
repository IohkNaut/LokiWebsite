<?php
	@session_start();		
	if(isset ($_POST['btn_login'])) {
		$username = $_POST['txt_username'];
		$password = $_POST['pw_password'];
		$sql = "select * from admin where username = '$username' and password = '$password'";
		$run = mysql_query($sql);
		$num = mysql_num_rows($run);

		if($num > 0) {
			$_SESSION['login_ad'] = $username;
			//header('location:admincp/index.php');
            echo '<script> location.replace("admincp/index.php"); </script>';
		} else {
			$sql_mem = "select * from member where (email = '$username' or phone = '$username') and password = '$password'";
			$run_mem = mysql_query($sql_mem);
			$member = mysql_fetch_array($run_mem);
			$num_mem = mysql_num_rows($run_mem);
			if ($num_mem > 0) {
				$_SESSION['login_mem'] = $member['member_id'];
            	echo '<script> location.replace("index.php"); </script>';
			} else {
				echo '<script> alert("Thông tin đăng nhập sai!"); </script>';
			}
		} 
	}
?>

<div class="container">
	<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 well well-sm col-md-offset-4" style="margin-top:20px;">
        	<a href="signin.php?view=signup" style="margin-bottom:10px; float:right; font-size:14px;">Tạo tài khoản</a> 
            <legend><i class="glyphicon glyphicon-user"></i><strong> ĐĂNG NHẬP</strong></legend> 
            <form action="signin.php" method="post" class="form" role="form" enctype="multipart/form-data">
            	<label for="">Tên đăng nhập</label> 
                <input class="form-control" name="txt_username" placeholder="Nhập Email hoặc Số điện thoại" required="" type="text">
                <label for="">Mật khẩu</label> 
                <input class="form-control" name="pw_password" placeholder="Nhập mật khẩu" type="password" required="required"> 
                <br> 
                <button class="btn btn-lg btn-primary btn-block" name="btn_login" type="submit"> Đăng nhập</button> 
            </form>  
        </div>
    </div>
</div>
