<?php
	$member_id = $_GET['id'];
	$sql_edit = "select * from member where member_id = $member_id";
	$run_edit = mysql_query($sql_edit);
	$row_edit = mysql_fetch_array($run_edit);
?>
<legend style="margin-top:13px; font-weight:bold;"><i class="glyphicon glyphicon-plus-sign"></i> THÔNG TIN THÀNH VIÊN</legend> 
<form action="modules/mnmember/handle.php?id=<?php echo $member_id ?>" enctype="multipart/form-data" method="post" class="form" role="form"> 
    <div class="row"> 
        <div class="col-xs-7 col-md-7">
            <label for=""> Họ tên</label> 
            <input class="form-control" name="txt_name" required="" autofocus="" type="text" value="<?php echo $row_edit['member_name'] ?>"> 
        </div> 
        <div class="col-xs-5 col-md-5"> 
            <label for=""> Số điện thoại</label>
            <input class="form-control" name="num_phone" required="" type="number" value="<?php echo $row_edit['phone'] ?>"> 
        </div> 
    </div> 
    <label for=""> Email</label>
    <input class="form-control" name="im_email" type="email" value="<?php echo $row_edit['email'] ?>">
    <label for=""> Địa chỉ</label>
    <input class="form-control" name="txt_address" required="" type="text" value="<?php echo $row_edit['address'] ?>"> 
    <label for=""> Mật khẩu</label>
    <input class="form-control" name="pw_password" type="text" value="<?php echo $row_edit['password'] ?>"> 
    <div class="row"> 
        <div class="col-xs-6 col-md-6">
            <label for=""> Ngày sinh</label> 
            <input class="form-control" name="date_dob" type="date" value="<?php echo $row_edit['dob'] ?>">
        </div> 
        <div class="col-xs-6 col-md-6"> 
            <label for=""> Giới tính</label>
            <select name="slt_gender" style="height:33px;border-radius:4px;font-size:14px;" class="col-xs-12 col-md-12 col-sm-12" >
            <?php
				if ($row_edit['gender'] == 0) {
					echo '<option value="0" selected="selected">Nữ</option>';
					echo '<option value="1">Nam</option>';
				}
				else {
					echo '<option value="1" selected="selected">Nam</option>';
					echo '<option value="0">Nữ</option>';
				}
			?>
            </select>
        </div> 
    </div> 
    <br> 
    <button class="btn btn-lg btn-primary btn-block" name="btn_edit" type="submit"> Lưu</button> 
    <br>
</form> 