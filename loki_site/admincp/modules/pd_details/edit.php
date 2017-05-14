<?php
	$product_id = $_GET['id'];
	$detail_id = $_GET['dt_id'];
	$sql_details = "select * from product_detail where pd_detail_id = $detail_id";
	$run_details = mysql_query($sql_details);
	$row_details = mysql_fetch_array($run_details);
?>

<legend style="margin-top:13px; font-weight:bold;"><i class="glyphicon glyphicon-plus-sign"></i> SỬA CHI TIẾT SẢN PHẨM</legend> 
<form action="modules/pd_details/handle.php?id=<?php echo $product_id ?>&dt_id=<?php echo $detail_id ?>" enctype="multipart/form-data" method="post" class="form" role="form" >
    <div class="row" > 
        <div class="col-xs-6 col-md-6 col-sm-6" style="margin-top:10px;">
            <label for=""> Size</label> 
            <input style="margin-top:10px;" class="form-control" name="num_size" required="" type="number"
            value="<?php echo $row_details['size'] ?>">
        </div> 
        <div class="col-xs-6 col-md-6 col-sm-6" style="margin-top:10px;"> 
            <label for=""> Số lượng</label>
            <input style="margin-top:10px;" class="form-control" name="num_quantity" required="" type="number"
            value="<?php echo $row_details['quantity'] ?>"> 
        </div> 
    </div>

    <button class="btn btn-primary col-xs-12 col-md-12 col-sm-12" type="submit" name="btn_edit" style="margin-top:18px;">Sửa</button> 
	<br />
</form>  
