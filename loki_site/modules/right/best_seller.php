<div class="row">
    <h3 align="center" class="col-md-12 col-sm-12 col-xs-12"><a href="#"><strong>SẢN PHẨM BÁN CHẠY</strong></a></h3><br />
    <div class="row" >

    </div>
    <br />
 	<?php
		
		$sql_date = "SELECT * FROM orders_detail join orders on orders_detail.orders_id = orders.orders_id,product 
					WHERE datediff(CURRENT_DATE(), orders.date) <= 30 and product.product_id = orders_detail.product_id 
					GROUP by orders_detail.product_id 
					ORDER BY sum(quantity) DESC, product.date desc 
					LIMIT 10;";
		$run_date = mysql_query($sql_date);
		while ($row_date = mysql_fetch_array($run_date)) {
			if ($row_date['discount'] > 0) { $sale_price = $row_date['price'] * (1 - $row_date['discount']/100);
	?>
    <div class="col-md-3">
    					<span class="label label-danger" style="font-size:12px;">Sale <?php echo $row_date['discount'] ?>%</span>
                        <span class="label label-primary" style="font-size:12px;">HOT</span>
        <div class="thumbnail"> 
            <div class="caption"> 
                <h4 style=" text-transform:capitalize;"><?php echo $row_date['product_name'] ?></h4>
                 
                <p class="price" style=" text-decoration:line-through; background-color:#C66;"> 
					<?php echo number_format($row_date['price'],0) ?> vnđ</p>
                <p style="font-size:17px; font-weight:bold; text-transform:uppercase; background-color:#C33;"> 
					<?php echo number_format($sale_price,0) ?> vnđ</p>
                <p style="margin-top:20px;">
                	<a href="index.php?view=details_product&id=<?php echo $row_date['product_id'] ?>" class="btn btn-success" rel="tooltip">Xem chi tiết</a> 
            </div> <img src="admincp/modules/mnproduct/uploaded/<?php echo $row_date['image']?>" alt="<?php echo $row_date['product_name'] ?>"> 
        </div> 
        
    </div> 
    <?php }else {?>
    <div class="col-md-3"> <span class="label label-danger" style="font-size:12px;">HOT</span>
        <div class="thumbnail"> 
            <div class="caption"> 
                <h4 style=" text-transform:capitalize;"><?php echo $row_date['product_name'] ?></h4> 
                <p class="price" style="background-color:#C33;"> <?php echo number_format($row_date['price'],0) ?> vnđ</p>
                <p><a href="index.php?view=details_product&id=<?php echo $row_date['product_id'] ?>" class="btn btn-success" rel="tooltip">Xem chi tiết</a> 
            </div> <img src="admincp/modules/mnproduct/uploaded/<?php echo $row_date['image']?>" alt="<?php echo $row_date['product_name'] ?>"> 
        </div> 
    </div> 
    <?php
		}
		}
	?>       
    <span><br/></span> 
</div>

