<div class="container"> 
    <div class="row"> 
        <div class="col-xs-12 col-sm-12 col-md-6 well well-sm col-md-offset-3" style="margin-top:20px;">
        	<button class="btn btn-default btn-xs" type="button" style="float:right;"> Sửa thông tin</button> 
            <legend><i class="glyphicon glyphicon-globe"></i> THÔNG TIN THÀNH VIÊN</legend> 
            <form action="#" method="post" class="form" role="form"> 
                <div class="row"> 
                    <div class="col-xs-6 col-md-6">
                    	<label for=""> Họ tên</label> 
                        <input class="form-control" name="name" placeholder="Nhập họ và tên" required="" autofocus="" type="text" readonly> 
                    </div> 
                    <div class="col-xs-6 col-md-6"> 
                    	<label for=""> Số điện thoại</label>
                    	<input class="form-control" name="phone" placeholder="Nhập số điện thoại" required="" type="text" readonly> 
                    </div> 
                </div> 
                <label for=""> Email</label>
                <input class="form-control" name="youremail" placeholder="Nhập email" type="email" readonly>
                <label for=""> Địa chỉ</label>
                <input class="form-control" name="address" placeholder="Nhập địa chỉ" required="" type="text" readonly> 
                <label for=""> Mật khẩu</label>
                <input class="form-control" name="password" placeholder="Nhập mật khẩu" type="password" readonly> 
                <label for=""> Nhập lại mật khẩu</label>
                <input class="form-control" name="retypepassword" placeholder="Nhập lại mật khẩu" type="password" readonly> 
                <label for=""> Ngày sinh</label> 
                <input class="form-control" name="dob" type="date" disabled="disabled">
                <label for=""> Giới tính</label> <br>
                <label class="radio-inline"><input name="sex" id="inlineCheckbox1" value="male" type="radio" disabled>Nam </label> 
                <label class="radio-inline"><input name="sex" id="inlineCheckbox2" value="female" type="radio" disabled>Nữ </label> 
                <br> 
                <br> 
                <button class="btn btn-lg btn-primary btn-block" type="submit" disabled="disabled"> Lưu</button> 
            </form> 
        </div>  
    </div>
</div>