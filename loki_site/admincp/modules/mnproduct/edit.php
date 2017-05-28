<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
 <script>tinymce.init({ selector: 'textarea' });</script>
<?php
	$sql_catalog = "select * from catalog order by catalog_id";
	$run_catalog = mysql_query($sql_catalog);
	$product_id = $_GET['id'];
	$sql_product = "select * from product where product_id = $product_id";
	$run_product = mysql_query($sql_product);
	$row_product = mysql_fetch_array($run_product);
?>

<legend style="margin-top:13px; font-weight:bold;"><i class="glyphicon glyphicon-plus-sign"></i> SỬA SẢN PHẨM</legend> 
<form action="modules/mnproduct/handle.php?id=<?php echo $product_id ?>" enctype="multipart/form-data" method="post" class="form" role="form" >
    <label for="">Tên sản phẩm</label> 
    <input class="form-control" name="txt_product_name" type="text" style="margin-top:10px;" required="required" 
    																		value="<?php echo $row_product['product_name']?>">

    <div class="row" > 
        <div class="col-xs-8 col-md-8 col-sm-8" style="margin-top:10px;">
            <label for=""> Giá niêm yết (vnđ)</label> 
            <input style="margin-top:10px;" class="form-control" name="num_price" required="" type="number" 
            value="<?php echo $row_product['price']?>">
        </div> 
        <div class="col-xs-4 col-md-4 col-sm-4" style="margin-top:10px;"> 
            <label for=""> Giảm giá (%)</label>
            <input style="margin-top:10px;" class="form-control" name="num_discount" required="" type="number" value="<?php echo $row_product['discount']?>"> 
        </div> 
    </div>

    <label for="" style="margin-top:10px;">Mô tả sản phẩm</label> 
    <textarea name="txt_description" required=""
    							 style="margin-top:10px; height:200px;"><?php echo $row_product['description']?></textarea>
    
    <label for="" style="margin-top:10px;">Hình ảnh</label> <br />
    <img src="modules/mnproduct/uploaded/<?php echo $row_product['image']?>" width="80px" height="80px"/>
    <input name="file_image" type="file" style="margin-top:10px;">

    <div class="row" >
    	<div class="col-xs-6 col-md-6 col-sm-6" style="margin-top:10px;">
        	<label for="">Loại sản phẩm</label>
            <select id="catalog_select" name="slt_catalog_id" style="text-transform:capitalize;height:33px; margin-top:10px;
                                                                            border-radius:4px;font-size:14px;" class="col-xs-12 col-md-12 col-sm-12">

            <?php
                while ($row_catalog = mysql_fetch_array($run_catalog)) {
					if($row_catalog['catalog_id'] == $row_product['catalog_id']) {
            ?>
                <option selected="selected" style="text-transform:capitalize;" 
                		value=<?php echo $row_catalog['catalog_id']?> ><?php echo $row_catalog['catalog_name'] ?></option>
            <?php
					} else {
			?>
            	<option style="text-transform:capitalize;" value=<?php echo $row_catalog['catalog_id']?> ><?php echo $row_catalog['catalog_name'] ?></option>
			<?php
                	}
				}
            ?>
            </select>
        </div>
        
        <div class="col-xs-6 col-md-6 col-sm-6" style="margin-top:10px;">
        	<label for="" >Ngày nhập</label>
            <input class="form-control" name="date_date" type="date" style="margin-top:10px;" value="<?php echo $row_product['date']?>">
        </div>
    </div> 
    <button class="btn btn-primary col-xs-12 col-md-12 col-sm-12" type="submit" name="btn_edit" style="margin-top:18px;">Sửa</button> 
	<br />
</form>  
