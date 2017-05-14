<?php
	$product_id = $_GET['id'];
?>

<legend style="margin-top:13px; font-weight:bold;"><i class="glyphicon glyphicon-plus-sign"></i> THÊM CHI TIẾT SẢN PHẨM</legend> 
<form action="modules/pd_details/handle.php?id=<?php echo $product_id ?>" enctype="multipart/form-data" method="post" class="form" role="form" >
    <div class="row" > 
        <div class="col-xs-6 col-md-6 col-sm-6" style="margin-top:10px;">
            <label for=""> Size</label> 
            <input style="margin-top:10px;" class="form-control" name="num_size" required="" type="number">
        </div> 
        <div class="col-xs-6 col-md-6 col-sm-6" style="margin-top:10px;"> 
            <label for=""> Số lượng</label>
            <input style="margin-top:10px;" class="form-control" name="num_quantity" required="" type="number"> 
        </div> 
    </div>

    <button class="btn btn-primary col-xs-12 col-md-12 col-sm-12" type="submit" name="btn_insert" style="margin-top:18px;">Thêm</button> 
	<br />
</form>  
