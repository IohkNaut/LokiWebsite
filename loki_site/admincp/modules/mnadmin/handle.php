<?php
	include('../../config.php');
	$admin_id = $_GET['id'];
	$ad_name = $_POST['txt_admin_name'];
	$us_name = $_POST['txt_username'];
	
	if(isset($_POST['btn_insert'])) {
		$sql = "insert into admin (admin_name, username, password) values ('$ad_name','$us_name', '123')";
		mysql_query($sql);
		header('location: ../../index.php?manage=mnadmin');
	} else {
		$sql = "delete from admin where admin_id = $admin_id";
		mysql_query($sql);
		header('location: ../../index.php?manage=mnadmin');
	}
?>