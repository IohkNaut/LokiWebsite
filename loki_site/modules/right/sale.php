<div class="row">
    <h3 align="center" class="col-md-12 col-sm-12 col-xs-12"><a href="#"><strong>SẢN PHẨM GIẢM GIÁ</strong></a></h3>
    <br />
    <div class="row">

    </div>
    <br />
 	<?php
		if(isset($_GET['page'])) {
			$pg = $_GET['page'];
		} else {
			$pg = '';
		}
		if ($pg == '' || $pg == 1) {
			$pg1 = 0;		
		}
		else
			$pg1 = ($pg - 1) * 16;
		$sql_discount = "select * from product where discount > 0 order by discount desc limit $pg1, 16";
		$run_discount = mysql_query($sql_discount);
		while ($row_discount = mysql_fetch_array($run_discount)) {
			$sale_price = $row_discount['price'] * (1 - $row_discount['discount']/100);
	?>
    <div class="col-md-3"><span class="label label-danger" style="font-size:12px;">Sale <?php echo $row_discount['discount'] ?>%</span>
        <div class="thumbnail"> 
            <div class="caption"> 
                <h4 style=" text-transform:capitalize;"><?php echo $row_discount['product_name'] ?></h4>
                 
                <p class="price" style=" text-decoration:line-through; background-color:#C66;"> <?php echo number_format($row_discount['price'],0) ?> vnđ</p>
                <p style="font-size:17px; font-weight:bold; text-transform:uppercase; background-color:#C33;"> <?php echo number_format($sale_price,0) ?> vnđ</p>
                <p style="margin-top:20px;"><a href="index.php?view=details_product&id=<?php echo $row_discount['product_id'] ?>" class="btn btn-success" rel="tooltip">Xem chi tiết</a> 
            </div> <img src="admincp/modules/mnproduct/uploaded/<?php echo $row_discount['image']?>" alt="<?php echo $row_discount['product_name'] ?>"> 
        </div> 
        
    </div> 
    <?php
		}
	?>       
    <span><br/></span> 
</div>

<center><ul class="pagination">
<?php
	if($pg == '' || $pg == 1)
		echo '<li class="disabled"><a href="#">&laquo;</a></li>';
	else
		echo '<li><a href="?view=sale&page='.($pg - 1).'">&laquo;</a></li>';

	$query_page = mysql_query("select * from product where discount > 0");
	$count = mysql_num_rows($query_page);
	$page = ceil($count/16);

	for($i = 1; $i <= $page; $i++) {
		if($pg == $i)
			echo '<li class="active"><a href="?view=sale&page='.$i.'"> '.$i.'</a></li>';
		else
			echo '<li><a href="?view=sale&page='.$i.'"> '.$i.'</a></li>';
		
	}
	
	if($pg == $page)
		echo '<li class="disabled"><a href="#">&raquo;</a></li>';
	else
		echo '<li><a href="?view=sale&page='.($pg + 1).'">&raquo;</a></li>';
?>

</ul></center>