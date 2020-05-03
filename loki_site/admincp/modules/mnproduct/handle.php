<?php
	include('../../config.php');
	$id = $_GET['id'];
	$catalog_id = $_POST['slt_catalog_id'];
	$product_name = $_POST['txt_product_name'];
	$price = $_POST['num_price'];
	$description = $_POST['txt_description'];
	$discount = $_POST['num_discount'];
	$image = $_FILES['file_image']['name'];
	$date = $_POST['date_date'];
	$image_tmp = $_FILES['file_image']['tmp_name'];
	move_uploaded_file($image_tmp, 'uploaded/'.$image);

	if(isset($_POST['btn_insert'])) {
		$sql = "insert into product (catalog_id, product_name, price, description, discount, image, date) values ('$catalog_id', '$product_name', '$price', '$description', '$discount', '$image', '$date');";
		mysql_query($sql);
		header('location: ../../index.php?manage=mnproduct&ac=insert');
	} else if (isset($_POST['btn_edit'])) {
		if($image != '') 
			$sql = "call sp_product_upd('$catalog_id', '$product_name', '$price', '$description', '$discount', '$image', '$date', '$id');";
		else
			$sql = "update product set catalog_id = '$catalog_id', product_name = '$product_name', price = '$price', 
			description = '$description', discount = '$discount', date = '$date' where product_id = $id";
		mysql_query($sql);
		header('location: ../../index.php?manage=mnproduct&ac=insert');
	} else {
		$sql = "call sp_product_del('$id');";
		mysql_query($sql);
		header('location: ../../index.php?manage=mnproduct&ac=insert');
	}
?>