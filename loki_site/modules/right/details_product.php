<div class="card"> 
	<div class="container-fluid"> 
   		<div class="wrapper row">
			<?php
            $product_id = $_GET['id'];
            $sql_pd = "select * from product where product_id = $product_id";
            $run_pd = mysql_query($sql_pd);
            $row_pd = mysql_fetch_array($run_pd);
    
            $sql_dt = "select * from product_detail where product_id = $product_id";
            $run_dt = mysql_query($sql_dt);
			
			$sql_gal = "select * from product_gallery where product_id = $product_id";
            $run_gal = mysql_query($sql_gal);
			
			$sql_gal1 = "select * from product_gallery where product_id = $product_id";
            $run_gal1 = mysql_query($sql_gal);
            
            ?> 
    		<div class="preview col-md-6" > 
     			<div class="preview-pic tab-content" style="height:400px;"> 
      				<div class="tab-pane active" id="pic-1">
                    	<img src="admincp/modules/mnproduct/uploaded/<?php echo $row_pd['image']?>" 
                        					alt="<?php echo $row_pd['product_name'] ?>"></div> 
                    <?php
						$num1 = 2;
						while($row_gal1 = mysql_fetch_array($run_gal1)) {
					?>
                  	<div class="tab-pane" id="pic-<?php echo $num1 ?>"><img src="admincp/modules/pd_gallery/uploaded/<?php echo $row_gal1['image']?>"></div> 
                    <?php $num1 += 1; } ?>
     			</div> 
     			<ul class="preview-thumbnail nav nav-tabs"> 
      				<li class="active" style="height:50px;">
                    	<a data-target="#pic-1" data-toggle="tab" ><img height="70" src="admincp/modules/mnproduct/uploaded/<?php echo $row_pd['image']?>"></a>
      				</li> 
                    <?php
						$num = 2;
						while($row_gal = mysql_fetch_array($run_gal)) {
					?>
      				<li>
                    	<a data-target="#pic-<?php echo $num ?>" data-toggle="tab"><img height="70" src="admincp/modules/pd_gallery/uploaded/<?php echo $row_gal['image']?>"></a>
      				</li> 
					<?php $num += 1; } ?>
     			</ul> 
    		</div> 
            
    		<div class="details col-md-6">
            
            <?php if ($row_pd['discount'] > 0) { $sale_price = $row_pd['price'] * (1 - $row_pd['discount']/100);?> 
     			<h3 class="product-title"><?php echo $row_pd['product_name'] ?>
                	<span class="label label-danger">Sale <?php echo $row_pd['discount'] ?>%</span></h3> 
 				<p class="product-description" style="font-size:15px; text-align:justify;"><?php echo $row_pd['description'] ?></p>
                
                <div class="row" style="margin-top:10px;">
                    <label style="float:left; font-size:16px; margin-left:14px;">Giá bán: </label>              
                    <div style="float:left; font-weight:bold; text-decoration:line-through; font-size:16px; margin-left:10px;"> 
						<?php echo number_format($row_pd['price'],0) ?> VNĐ</div>
                    <div style="float:left; font-size:22px;margin-left:15px;"><span class="label label-danger"> 
						<?php echo number_format($sale_price,0) ?> VNĐ</span></div>
                </div>
                
            <?php } else { ?>
            	<h3 class="product-title"><?php echo $row_pd['product_name'] ?></h3> 
 				<p class="product-description" style="font-size:15px;"><?php echo $row_pd['description'] ?></p>               
     			<div class="row" style="margin-top:10px;">
                    <label style="float:left; font-size:16px; margin-left:14px;">Giá bán: </label>              
                    <div style="float:left; font-size:22px;margin-left:15px;"><span class="label label-danger"> 
						<?php echo number_format($row_pd['price'],0) ?> VNĐ</span></div>
                </div>
            <?php } ?>
            		
                <form action="cart.php?add=<?php echo $product_id ?>" enctype="multipart/form-data" method="post" class="form" role="form">
                    <div class="row" style="margin-top:25px;" >
                    
                    	<div class="col-xs-6 col-md-6 col-sm-6">
                            <label style="font-size:16px;" for="">Kích cỡ:  </label>
                            <select class="form-control" name="slt_size" style="font-weight:bold;">
                            <?php
                                while($row_dt = mysql_fetch_array($run_dt)) {
                                    if($row_dt['quantity'] > 0) {
                            ?>
                                <option value="<?php echo $row_dt['size'] ?>"><?php echo $row_dt['size'] ?></option>
                            <?php
                                    }
                                }
                            ?>
                            </select>  
                        </div>
                        
                        <div class="col-xs-6 col-md-6 col-sm-6">
                        	<label style="font-size:16px;" for="">Số lượng: </label> 
                            <input name="num_quantity" class="form-control" type="number" value="1" min="1" style="font-weight:bold;"/>  
                        </div> 
                          
                    </div>
                    
                    <div class="action" align="center" style="margin-top:30px;">
                    <?php
						if(mysql_num_rows($run_dt) > 0) {?>
                	<a href="cart.php?add=<?php echo $product_id ?>" >
                    <button class="btn btn-success" name="addtocart" type="submit"><img src="images/ShoppingCart_24px.png"/>  THÊM VÀO GIỎ</button>
                    </a>
                    <?php
						} else {
					?>
                    <button disabled="disabled" class="btn btn-success" name="addtocart" type="submit"><img src="images/ShoppingCart_24px.png"/>  THÊM VÀO GIỎ</button>
                    <?php
						}
						?>
                </div> 
                </form>     

     			
    		</div> 
   		</div> 
	</div> 
</div>
