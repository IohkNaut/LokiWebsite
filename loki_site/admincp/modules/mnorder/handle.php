<?php
	include('../../config.php');
	$id = $_GET['id'];
	$address = $_POST['txt_address'];
	$status = $_POST['slt_status'];
	if (isset($_POST['btn_edit'])) {
		$sql = "update orders set address = '$address', status = '$status' where orders_id = '$id'";
		if(mysql_query($sql)) {
			if($status == 1) {
				mysql_query("update orders set date = now() where orders_id = '$id'");
				$query_dt = mysql_query("select * from orders_detail where orders_id = $id");
				while($row_dt = mysql_fetch_array($query_dt)) {
					$pd_id = $row_dt['product_id'];
					$pd_size = $row_dt['product_size'];
					$quantity = $row_dt['quantity'];
					$query_pd = "update product_detail set quantity = (quantity - '$quantity') where product_id = '$pd_id' and size = '$pd_size'";
					mysql_query($query_pd);
				}
			}
		}
		header("location: ../../index.php?manage=mnorder&ac=edit&id=$id");

	} else {
		$sql_dt = "delete from orders_detail where orders_id = $id";
		mysql_query($sql_dt);
		$sql = "delete from orders where orders_id = $id";
		mysql_query($sql);
		header('location: ../../index.php?manage=orders');
	}
?>