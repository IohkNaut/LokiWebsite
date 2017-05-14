<?php
	@session_start();
	if(isset($_SESSION['login_mem'])) {
		$username = $_SESSION['login_mem'];
		$sql = "select * from member where member_id = $username";
		$run = mysql_query($sql);
		$mem = mysql_fetch_array($run);
	}
	
	if(isset($_POST['btn_edit'])) {
		$name = $_POST['txt_name'];
		$phone = $_POST['num_phone'];
		$email = $_POST['im_email'];
		$address = $_POST['txt_address'];
		$password = $_POST['pw_password'];
		$retype_pw = $_POST['pw_retype'];
		$dob = $_POST['date_dob'];
		$gender = $_POST['slt_gender'];
		if($password === $retype_pw) {
			$sql_edit = "update member set member_name = '$name', gender = '$gender', dob = '$dob', phone = '$phone',
			 address = '$address', email = '$email', password = '$password' where member_id = $username";
			$run_query = mysql_query($sql_edit);
			if($run_query) {
				echo '<script> location.replace("signin.php?view=info"); </script>';
			} else {
				echo '<script> alert("Sửa thông tin thất bại!"); </script>';
			}
		}
		
	}
?>
<div class="container"> 
    <div class="row"> 
        <div class="col-xs-12 col-sm-12 col-md-6 well well-sm col-md-offset-3" style="margin-top:20px;">
            <legend><i class="glyphicon glyphicon-globe"></i> THÔNG TIN THÀNH VIÊN</legend> 
            <form action="signin.php?view=info" method="post" class="form" role="form" enctype="multipart/form-data"> 
                <div class="row"> 
                    <div class="col-xs-6 col-md-6">
                    	<label for=""> Họ tên</label> 
                        <input class="form-control" name="txt_name" placeholder="Nhập họ và tên" required="" 
                        								value="<?php echo $mem['member_name'];?>" type="text"> 
                    </div> 
                    <div class="col-xs-6 col-md-6"> 
                    	<label for=""> Số điện thoại</label>
                    	<input class="form-control" name="num_phone" placeholder="Nhập số điện thoại" 
                        						value="<?php echo $mem['phone'];?>" required="" type="number"> 
                    </div> 
                </div> 
                <label for=""> Email</label>
                <input class="form-control" name="im_email" placeholder="Nhập email" type="email" value="<?php echo $mem['email'];?>">
                <label for=""> Địa chỉ</label>
                <input class="form-control" name="txt_address" placeholder="Nhập địa chỉ" required="" 
                					value="<?php echo $mem['address'];?>" type="text"> 
                <label for=""> Mật khẩu</label>
                <input class="form-control" name="pw_password" placeholder="Nhập mật khẩu" type="password" value="<?php echo $mem['password'];?>"> 
                <label for=""> Nhập lại mật khẩu</label>
                <input class="form-control" name="pw_retype" placeholder="Nhập lại mật khẩu" type="password" value="<?php echo $mem['password'];?>">
                <div class="row"> 
                    <div class="col-xs-6 col-md-6">
                    	<label for=""> Ngày sinh</label> 
                        <input class="form-control" name="date_dob" type="date" value="<?php echo $mem['dob'];?>">
                    </div> 
                    <div class="col-xs-6 col-md-6"> 
                    	<label for=""> Giới tính</label>
                    	<select name="slt_gender" style="height:33px;border-radius:4px;font-size:14px;" class="col-xs-12 col-md-12 col-sm-12">
                        <?php if($mem['gender'] == 1) {
                        	echo '<option selected="selected" value="1">Nam</option>';
                        	echo '<option value="0">Nữ</option>';
						} else {
							echo '<option value="1">Nam</option>';
                        	echo '<option selected="selected" value="0">Nữ</option>';
						}?>
                        </select>
                    </div> 
                </div
                ><br> 
                <br> 
                <button class="btn btn-lg btn-primary btn-block" name="btn_edit" type="submit"> Sửa thông tin</button> 
            </form> 
        </div>  
    </div>
</div>