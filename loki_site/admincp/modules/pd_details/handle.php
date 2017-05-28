<?php
	include('../../config.php');
	$product_id = $_GET['id'];
	$detail_id = $_GET['dt_id'];
	$size = $_POST['num_size'];
	$quantity = $_POST['num_quantity'];
	
	$sql_size = "select * from product_detail where product_id = $product_id";
	$run_size = mysql_query($sql_size);

	if(isset($_POST['btn_insert'])) {
		$sql = "call sp_product_detail_ins('$product_id', '$quantity', '$size')";
		mysql_query($sql);
		header("location: ../../index.php?manage=pd_details&ac=insert&id=$product_id");
	} else if (isset($_POST['btn_edit'])) {
		if (check_Size($size) == 0) {
			$sql = "update product_detail set size = '$size', quantity = '$quantity' where pd_detail_id = $detail_id";
			mysql_query($sql);
			header("location: ../../index.php?manage=pd_details&ac=insert&id=$product_id");
		} else {?>
        <script> alert ('Size vừa nhập đã bị trùng!');</script>
	<?php
		}
	} else {
		$sql = "delete from product_detail where pd_detail_id = $detail_id";
		mysql_query($sql);
		header("location: ../../index.php?manage=pd_details&ac=insert&id=$product_id");
	}
?>