<div>
    <section class="row" id="sp_banchay"> <!---SAN PHAM BAN CHAY-->
        <h3 align="center" class="col-md-12 col-sm-12 col-xs-12"><a href="#"><strong>SẢN PHẨM BÁN CHẠY</strong></a></h3>
        <div class="row" >

    	</div>
    	<br />
        <?php
		$sql_hot = "SELECT * FROM orders_detail join orders on orders_detail.orders_id = orders.orders_id,product 
					WHERE datediff(CURRENT_DATE(), orders.date) <= 30 and product.product_id = orders_detail.product_id 
					GROUP by orders_detail.product_id 
					ORDER BY sum(quantity) DESC, product.date desc 
					LIMIT 8;";
		$run_hot = mysql_query($sql_hot);
		while ($row_hot = mysql_fetch_array($run_hot)) {
			if ($row_hot['discount'] > 0) { $sale = $row_hot['price'] * (1 - $row_hot['discount']/100);
	?>
    <div class="col-md-3">
    					<span class="label label-danger" style="font-size:12px;">Sale <?php echo $row_hot['discount'] ?>%</span>
                        <span class="label label-primary" style="font-size:12px;">HOT</span>
        <div class="thumbnail"> 
            <div class="caption"> 
                <h4 style=" text-transform:capitalize;"><?php echo $row_hot['product_name'] ?></h4>
                 
                <p class="price" style=" text-decoration:line-through; background-color:#C66;"> 
					<?php echo number_format($row_hot['price'],0) ?> vnđ</p>
                <p style="font-size:17px; font-weight:bold; text-transform:uppercase; background-color:#C33;"> 
					<?php echo number_format($sale,0) ?> vnđ</p>
                <p style="margin-top:20px;">
                	<a href="index.php?view=details_product&id=<?php echo $row_hot['product_id'] ?>" class="btn btn-success" rel="tooltip">Xem chi tiết</a> 
            </div> <img src="admincp/modules/mnproduct/uploaded/<?php echo $row_hot['image']?>" alt="<?php echo $row_date['product_name'] ?>"> 
        </div> 
        
    </div> 
    <?php } else {?>
        <div class="col-md-3"> <span class="label label-danger" style="font-size:12px;">HOT</span>
            <div class="thumbnail"> 
            <div class="caption"> 
                <h4 style=" text-transform:capitalize;"><?php echo $row_hot['product_name'] ?></h4> 
                <p class="price" style="background-color:#C33;"> <?php echo $row_hot['price'] ?> vnđ</p>
                <p><a href="index.php?view=details_product&id=1" class="btn btn-success" rel="tooltip" >Xem chi tiết</a> 
            </div> <img src="admincp/modules/mnproduct/uploaded/<?php echo $row_hot['image']?>" alt="<?php echo $row_date['product_name'] ?>"> 
        	</div> 
        </div> 
      	<?php
			}
		}
		?>
      
        <p align="center" class="col-md-12 col-sm-12 col-xs-12"><a href="index.php?view=best" class="btn btn-info" rel="tooltip">Xem thêm >></a></p>

    </section><!--end sp ban chay-->
            
    <section class="row" id="sp_banchay"> <!---SAN PHAM GIAM GIA-->
        <h3 align="center" class="col-md-12 col-sm-12 col-xs-12"><a href="#"><strong>SẢN PHẨM GIẢM GIÁ</strong></a></h3>
        <div class="row" >

    	</div>
    	<br />
        <?php
		$sql_discount = "select * from product where discount > 0 order by discount desc";
		$run_discount = mysql_query($sql_discount);
		while ($row_discount = mysql_fetch_array($run_discount)) {
			$sale_price = $row_discount['price'] * (1 - $row_discount['discount']/100);
		?>
		<div class="col-md-3"> <span class="label label-danger" style="font-size:12px;">Sale <?php echo $row_discount['discount'] ?>%</span>
			<div class="thumbnail"> 
				<div class="caption"> 
					<h4 style=" text-transform:capitalize;"><?php echo $row_discount['product_name'] ?></h4> 
					<p class="price" style=" text-decoration:line-through;background-color:#C66;"> 
						<?php echo number_format($row_discount['price'],0) ?> vnđ</p>
					<p style="font-size:17px; font-weight:bold; text-transform:uppercase;background-color:#C33;"> 
						<?php echo number_format($sale_price,0) ?> vnđ</p>
					<p><a href="index.php?view=details_product&id=<?php echo $row_discount['product_id'] ?>" class="btn btn-success" rel="tooltip">Xem chi tiết</a> 
				</div> <img src="admincp/modules/mnproduct/uploaded/<?php echo $row_discount['image']?>" alt="<?php echo $row_discount['product_name'] ?>"> 
			</div> 
		</div> 
		<?php

		}
		?>     
      
        <p align="center" class="col-md-12 col-sm-12 col-xs-12"><a href="index.php?view=sale" class="btn btn-info" rel="tooltip">Xem thêm >></a></p>

    </section><!--end sp giam gia-->
            
    <section class="row" id="tintuc"> <!---TIN TUC-->
        <h3 align="center" class="col-md-12 col-sm-12 col-xs-12"><a href="#"><strong>TIN TỨC</strong></a></h3>
     	<?php
		$sql_news = "select * from news order by date desc limit 3";
		$run_news = mysql_query($sql_news);
		while ($row_news = mysql_fetch_array($run_news)) {
		?>
        <div id="news-slider" class="owl-carousel owl-theme" style="opacity: 1; display: block;"> 
            <div class="owl-wrapper-outer"><div class="owl-wrapper" style="left: 0px; display: block;">   
                                         
                <div class="owl-item col-md-4 col-sm-4 col-xs-12"><div class="post-slide"> 
                    <div class="post-img"> <span class="over-layer"></span> 
                        <img src="admincp/modules/mnnews/uploaded/<?php echo $row_news['image']?>" style="height:150px;"> 
                    </div> 
                    <h3 class="post-title"> <a href="#"><?php echo $row_news['title']?></a> 
                    </h3> <span>Ngày đăng: <?php echo date("d/m/Y - H:i:s", strtotime($row_news['date']));?></span> 
                </div></div>

		<?php } ?>
                </div></div>
            </div>
        </div> 
                
        <p align="center" class="col-md-12 col-sm-12 col-xs-12" style="margin-top:20px;"><a href="index.php?view=news" class="btn btn-info" rel="tooltip">Xem thêm >></a></p>

    </section><!--tin tuc-->
            
    <span><br/></span> 
</div>
