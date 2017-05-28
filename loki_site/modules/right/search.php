<?php ob_start(); ?>
<div class="row">
    <h3 align="center" class="col-md-12 col-sm-12 col-xs-12"><a href="#"><strong>KẾT QUẢ TÌM KIẾM</strong></a></h3>
    <div class="row" >       
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

		if(isset($_POST['btn_search'])) {
			$kw = $_POST['txt_keyword'];
			$sql_date = "select * from product where product_name like '$kw%' or product_name like '%$kw' or product_name like '%$kw%' limit $pg1, 16";
			$run_date = mysql_query($sql_date);
			if (mysql_num_rows($run_date) > 0) {
				//header('location:index.php?view=search');?>
                <meta http-equiv="Location" content="http://localhost/loki_site/index.php?view=search">
			<?php while ($row_date = mysql_fetch_array($run_date)) {
				if ($row_date['discount'] > 0) { $sale_price = $row_date['price'] * (1 - $row_date['discount']/100);
		
	?>
    <div class="col-md-3"><span class="label label-danger" style="font-size:12px;">Sale <?php echo $row_date['discount'] ?>%</span>
        <div class="thumbnail"> 
            <div class="caption"> 
                <h4 style=" text-transform:capitalize;"><?php echo $row_date['product_name'] ?></h4>             
                <p class="price" style=" text-decoration:line-through; background-color:#C66;"> 
					<?php echo number_format($row_date['price'],0) ?> vnđ</p>
                <p style="font-size:17px; font-weight:bold; text-transform:uppercase; background-color:#C33;"> 
					<?php echo number_format($sale_price,0) ?> vnđ</p>
                <p style="margin-top:20px;">
                	<a href="index.php?view=details_product&id=<?php echo $row_date['product_id'] ?>" 
                    class="btn btn-success" rel="tooltip">Xem chi tiết</a> 
            </div> <img src="admincp/modules/mnproduct/uploaded/<?php echo $row_date['image']?>" alt="<?php echo $row_date['product_name'] ?>"> 
        </div> 
    </div> 
    <?php } else {?>
    <div class="col-md-3" style="margin-top:12px;">
        <div class="thumbnail"> 
            <div class="caption"> 
                <h4 style=" text-transform:capitalize;"><?php echo $row_date['product_name'] ?></h4> 
                <p class="price" style="background-color:#C33;"> <?php echo number_format($row_date['price'],0) ?> vnđ</p>
                <p style="margin-top:20px;">
                	<a href="index.php?view=details_product&id=<?php echo $row_date['product_id'] ?>" class="btn btn-success" rel="tooltip">Xem chi tiết</a> 
            </div> <img src="admincp/modules/mnproduct/uploaded/<?php echo $row_date['image']?>" alt="<?php echo $row_date['product_name'] ?>"> 
        </div> 
    </div> 
    <?php
		}
		}
	}
		} 
	?>       
    <span><br/></span> 
</div>
<center><ul class="pagination">
<?php
	if(isset($_POST['btn_search'])) {
		$kw = $_POST['txt_keyword'];
		$query_page = mysql_query("select * from product where product_name like '$kw%' or product_name like '%$kw' or product_name like '%$kw%'");
		$count = mysql_num_rows($query_page);
		if($count == 0) {
			echo '<p><h4>Không có sản phẩm nào được tìm thấy!</h4></p>';
		}
		else {
			$page = ceil($count/16);
			
			if($pg == '' || $pg == 1)
				echo '<li class="disabled"><a href="#">&laquo;</a></li>';
			else
				echo '<li><a href="?view=search&page='.($pg - 1).'">&laquo;</a></li>';

			for($i = 1; $i <= $page; $i++) {
				if($pg == $i || $pg == '')
					echo '<li class="active"><a href="?view=search&page='.$i.'"> '.$i.'</a></li>';
				else
					echo '<li><a href="?view=search&page='.$i.'"> '.$i.'</a></li>';
			}
			
			if($pg == $page)
				echo '<li class="disabled"><a href="#">&raquo;</a></li>';
			else
				echo '<li><a href="?view=search&page='.($pg + 1).'">&raquo;</a></li>';
			}
		}
?>
</ul></center>
<?php ob_end_flush(); ?>
