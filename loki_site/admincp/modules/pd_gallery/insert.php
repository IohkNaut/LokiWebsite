<?php
	$product_id = $_GET['id'];
?>

<legend style="margin-top:13px; font-weight:bold;"><i class="glyphicon glyphicon-plus-sign"></i> THÊM HÌNH ẢNH SẢN PHẨM</legend> 
<form action="modules/pd_gallery/handle.php?id=<?php echo $product_id ?>" enctype="multipart/form-data" method="post" class="form" role="form" >
        <label for=""> Chọn hình ảnh</label> 
        <input style="margin-top:10px;" class="form-control" name="file[]" multiple="multiple" type="file"> 

    <button class="btn btn-primary col-xs-12 col-md-12 col-sm-12" type="submit" name="btn_insert" style="margin-top:18px;">Thêm</button> 
	<br />
</form>  
