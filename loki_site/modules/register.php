<?php
	if(isset($_POST['btn_register'])) {
		$name = $_POST['txt_name'];
		$phone = $_POST['num_phone'];
		$email = $_POST['im_email'];
		$address = $_POST['txt_address'];
		$password = $_POST['pw_password'];
		$retype_pw = $_POST['pw_retype'];
		$dob = $_POST['date_dob'];
		$gender = $_POST['slt_gender'];
		if($password === $retype_pw) {
			$sql_register = "insert into member(member_name, gender, dob, phone, address, email, password) 
			values ('$name','$gender','$dob','$phone','$address','$email','$password')";
			$run_query = mysql_query($sql_register);
			if($run_query) {
				header('location:index.php');
			} else {
				header('location:signin.php?view=signup');
			}
		}
		
	}
?>
<div class="container"> 
    <div class="row"> 
        <div class="col-xs-12 col-sm-12 col-md-6 well well-sm col-md-offset-3" style="margin-top:20px;"> 
            <legend><i class="glyphicon glyphicon-globe"></i> <strong>ĐĂNG KÝ THÀNH VIÊN</strong></legend> 
            <form action="signin.php?view=signup" method="post" class="form" role="form" enctype="multipart/form-data"> 
                <div class="row"> 
                    <div class="col-xs-6 col-md-6">
                    	<label for=""> Họ tên</label> 
                        <input class="form-control" name="txt_name" placeholder="Nhập họ và tên" required="" autofocus="" type="text"> 
                    </div> 
                    <div class="col-xs-6 col-md-6"> 
                    	<label for=""> Số điện thoại</label>
                    	<input class="form-control" name="num_phone" placeholder="Nhập số điện thoại" required="" type="number"> 
                    </div> 
                </div> 
                <label for=""> Email</label>
                <input class="form-control" name="im_email" placeholder="Nhập email" type="email">
                <label for=""> Địa chỉ</label>
                <input class="form-control" name="txt_address" placeholder="Nhập địa chỉ" required="" type="text"> 
                <label for=""> Mật khẩu</label>
                <input class="form-control" name="pw_password" placeholder="Nhập mật khẩu" type="password"> 
                <label for=""> Nhập lại mật khẩu</label>
                <input class="form-control" name="pw_retype" placeholder="Nhập lại mật khẩu" type="password">
                <div class="row"> 
                    <div class="col-xs-6 col-md-6">
                    	<label for=""> Ngày sinh</label> 
                        <input class="form-control" name="date_dob" type="date">
                    </div> 
                    <div class="col-xs-6 col-md-6"> 
                    	<label for=""> Giới tính</label>
                    	<select name="slt_gender" style="height:33px;border-radius:4px;font-size:14px;" class="col-xs-12 col-md-12 col-sm-12">
                        	<option value="1">Nam</option>
                        	<option value="0">Nữ</option>
                        </select>
                    </div> 
                </div
                ><br> 
                <br> 
                <button class="btn btn-lg btn-primary btn-block" name="btn_register" type="submit"> Đăng ký</button> 
            </form> 
        </div>  
    </div>
</div>