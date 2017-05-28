<?php
	include('../../config.php');
	$id = $_GET['id'];
	$catalog_name = $_POST['txt_catalog_name'];
	$parent_id = $_POST['slt_parent_id'];
	if(isset($_POST['btn_insert'])) {
		if($parent_id != 'null')
			$sql = "insert into catalog (catalog_name,parent_id) values ('$catalog_name','$parent_id')";
		else
			$sql = "insert into catalog (catalog_name) values ('$catalog_name')";
		mysql_query($sql);
		header('location: ../../index.php?manage=mncatalog&ac=insert');
	} else if (isset($_POST['btn_edit'])) {
		$sql = "update catalog set catalog_name = '$catalog_name', parent_id = '$parent_id' where catalog_id = '$id'";
		mysql_query($sql);
		header('location: ../../index.php?manage=mncatalog&ac=insert');

	} else {
		$sql = "delete from catalog where catalog_id = $id";
		mysql_query($sql);
		header('location: ../../index.php?manage=mncatalog&ac=insert');
	}
?>