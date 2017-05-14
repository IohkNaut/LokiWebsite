<?php
	include('../../config.php');
	$id = $_GET['id'];
	$name = $_POST['txt_name'];
	$phone = $_POST['num_phone'];
	$email = $_POST['im_email'];
	$address = $_POST['txt_address'];
	$password = $_POST['pw_password'];
	$dob = $_POST['date_dob'];
	$gender = $_POST['slt_gender'];
	if (isset($_POST['btn_edit'])) {
		$sql = "update member set member_name = '$name', phone = '$phone', email = '$email', 
				address = '$address', password = '$password', dob = '$dob', gender = '$gender' where member_id = '$id'";
		mysql_query($sql);
		header("location: ../../index.php?manage=mnmember&ac=edit&id=$id");

	} else {
		$sql = "delete from member where member_id = $id";
		mysql_query($sql);
		header('location: ../../index.php?manage=mnmember');
	}
?>