
<div class="container-fluid"> 
    <div class="row" style="margin-top:20px;"> 
        <div class="col-xs-12 col-sm-12 col-md-10 well well-sm col-md-offset-1" style="margin-top:20px;">
            <legend><i class="glyphicon glyphicon-globe"></i><strong> THÔNG TIN THÀNH VIÊN</strong></legend> 
            <form action="signin.php?view=info" method="post" class="form" role="form" enctype="multipart/form-data"> 
                <div class="row"> 
                    <div class="col-xs-6 col-md-6">
                    	<label for=""> Họ tên</label> 
                        <input class="form-control" name="txt_name" placeholder="Nhập họ và tên" required="" 
                        								value="<?php //echo $mem['member_name'];?>" type="text" style="margin-top:10px;"> 
                    </div> 
                    <div class="col-xs-6 col-md-6"> 
                    	<label for=""> Số điện thoại</label>
                    	<input class="form-control" name="num_phone" placeholder="Nhập số điện thoại" 
                        						value="<?php //echo $mem['phone'];?>" required="" type="number" style="margin-top:10px;"> 
                    </div> 
                </div> 
                <label for="" style="margin-top:10px;"> Email</label>
                <input style="margin-top:10px;" class="form-control" name="im_email" placeholder="Nhập email" type="email" value="<?php //echo $mem['email'];?>">
                <label style="margin-top:10px;" for=""> Địa chỉ</label>
                <input style="margin-top:10px;" class="form-control" name="txt_address" placeholder="Nhập địa chỉ" required="" 
                					value="<?php //echo $mem['address'];?>" type="text"> 
                <label style="margin-top:10px;" for=""> Mật khẩu</label>
                <input style="margin-top:10px;" class="form-control" name="pw_password" placeholder="Nhập mật khẩu" type="password" value="<?php //echo $mem['password'];?>"> 
                <label style="margin-top:10px;" for=""> Nhập lại mật khẩu</label>
                <input style="margin-top:10px;" class="form-control" name="pw_retype" placeholder="Nhập lại mật khẩu" type="password" value="<?php //echo $mem['password'];?>">
                <div class="row"> 
                    <div class="col-xs-6 col-md-6">
                    	<label style="margin-top:10px;" for=""> Ngày sinh</label> 
                        <input style="margin-top:10px;" class="form-control" name="date_dob" type="date" value="<?php //echo $mem['dob'];?>">
                    </div> 
                    <div class="col-xs-6 col-md-6"> 
                    	<label style="margin-top:10px;" for=""> Giới tính</label>
                    	<select name="slt_gender" style=" margin-top:10px;height:33px;border-radius:4px;font-size:14px;" class="col-xs-12 col-md-12 col-sm-12">
                        <?php //if($mem['gender'] == 1) {
//                        	echo '<option selected="selected" value="1">Nam</option>';
//                        	echo '<option value="0">Nữ</option>';
//						} else {
//							echo '<option value="1">Nam</option>';
//                        	echo '<option selected="selected" value="0">Nữ</option>';
//						}?>
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