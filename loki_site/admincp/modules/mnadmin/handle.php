<?php
	include('../../config.php');
	$admin_id = $_GET['id'];
	$ad_name = $_POST['txt_admin_name'];
	$us_name = $_POST['txt_username'];
	$pw = $_POST['pw_password'];
	$pw_retype = $_POST['pw_retype'];
	if(isset($_POST['btn_insert'])) {
		$sql = "call sp_admin_ins('$ad_name', '$us_name');";
		if(mysql_query($sql))
			echo '<script> alert("Thêm thành công!"); </script>';
		else
			echo '<script> alert("Thêm thất bại!"); </script>';
		header('location: ../../index.php?manage=mnadmin');
	} else if(isset($_POST['btn_edit'])) {
		if($pw === $pw_retype) {
			$sql = "call sp_admin_upd('$ad_name', '$us_name', '$pw', '$admin_id');";
			mysql_query($sql); 
			
			header("location: ../../index.php?manage=mnadmin&ac=edit&id=$admin_id");
			echo '<script> alert("Cập nhật thành công!"); </script>';
		} else {
			echo '<script> alert("Nhập lại mật khẩu sai!"); </script>';
		}
	} else {
		$sql = "call sp_admin_del('$admin_id')";
		if(mysql_query($sql))
			echo '<script> alert("Xoá thành công!"); </script>';
		else
			echo '<script> alert("Xoá thất bại!"); </script>';
		header('location: ../../index.php?manage=mnadmin');
	}
?>