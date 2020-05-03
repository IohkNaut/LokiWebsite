<?php 
	$id = $_GET['id'];
	$run = mysql_query("call sp_admin_info($id);");
	$row = mysql_fetch_array($run);
?>
<legend style="margin-top:13px; font-weight:bold;"><i class="glyphicon glyphicon-info"></i> THÔNG TIN NGƯỜI DÙNG</legend> 
<form action="modules/mnadmin/handle.php?id=<?php echo $id;?>" enctype="multipart/form-data" method="post" class="form" role="form" >
    <label for="">Họ tên</label> 
    <input class="form-control" name="txt_admin_name" type="text" style="margin-top:10px;" required="" value="<?php echo $row['admin_name'];?>">
    <label for="" style="margin-top:12px;">Tên đăng nhập</label> <br>
    <input class="form-control" name="txt_username" type="text" style="margin-top:10px;" required="required" value="<?php echo $row['username'];?>">
    <label for="" style="margin-top:12px;">Mật khẩu</label> <br>
    <input class="form-control" name="pw_password" type="password" style="margin-top:10px;" required="required" value="<?php echo $row['password'];?>">
    <label for="" style="margin-top:12px;">Xác nhận mật khẩu</label> <br>
    <input class="form-control" name="pw_retype" type="password" style="margin-top:10px;" required="required">
    <button class="btn btn-primary col-xs-12 col-md-12 col-sm-12" type="submit" name="btn_edit" style="margin-top:18px;margin-bottom:13px;">Lưu</button>
    <span></span> 
</form>  
<br />
