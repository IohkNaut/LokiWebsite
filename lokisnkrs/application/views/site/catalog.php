		<!--sidebar-->			
<div class="panel-group" id="accordion" style="background:#F2F2F2;">
	<div><br /></div>
    <div id="catalog">DANH MỤC</div>  <div><br /></div>
    
    <div class="panel panel-default">
    	<div class="panel-heading">
        	<div class="panel-title" style="font-size: 14px;">
            	<a data-parent="#accordion" href="index.php?view=all&page=1">Tất cả sản phẩm</a>
            </div>
    	</div>
    </div>
                          
    <div class="panel panel-default">
    	<div class="panel-heading">
        	<div class="panel-title" style="font-size: 14px;">
            	<a data-parent="#accordion" href="index.php?view=new&page=1">Hàng mới về</a>
            </div>
    	</div>
    </div>
                          
    <div class="panel panel-default">
    	<div class="panel-heading">
        	<div class="panel-title" style="font-size: 14px;">
            	<a data-parent="#accordion" href="index.php?view=best&page=1">Sản phẩm bán chạy</a>
            </div>
    	</div>
    </div>
                          
    <div class="panel panel-default">
    	<div class="panel-heading">
        	<div class="panel-title" style="font-size: 14px;">
            	<a data-parent="#accordion" href="index.php?view=sale&page=1">Sản phẩm giảm giá</a>
            </div>
    	</div>
    </div>
                     
    <div class="panel panel-default">
    	<div class="panel-heading">
        	<div class="panel-title" style="font-size: 14px;">
            	<a data-toggle="collapse" data-parent="#accordion" href="#<?php //echo $num ?>" style="text-transform:capitalize;">
				<?php //echo $row_catalog['catalog_name'] ?><span class="caret"></span></a>
            </div>
        </div>
        
        <div id="<?php //echo $num ?>" class="panel-collapse collapse">
        	<ul class="list-group">
            	<?php
					//while ($row_child = mysql_fetch_array($query_child)) {
				?>
            	<li class="list-group-item"><a href="index.php?view=details_type&id=<?php //echo $row_child['catalog_id'] ?>" style="color:#000;text-transform:capitalize;">
				<?php //echo $row_child['catalog_name'] ?></a></li>
                <?php 
				//$num += 1;
				//} ?>
        	</ul>
     	</div>
   	</div>

    <br />                     
    
</div>