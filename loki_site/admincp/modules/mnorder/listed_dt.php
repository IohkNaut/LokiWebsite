<?php
	$orders_id = $_GET['id'];
	$sql = "select * from orders_detail join product on orders_detail.product_id = product.product_id
			 where orders_detail.orders_id = $orders_id";
	$run = mysql_query($sql);
?>
<div class="table-responsive" style="margin-top:8px;">
	<h4><strong> Đơn hàng số: <?php echo $orders_id;?></strong></h4>
    <table class="table table-bordered table-hover">
      <tr >
        <th style="text-align:center; vertical-align:middle;" class="col-md-10">Tên sản phẩm</th>
        <th style="text-align:center; vertical-align:middle;" class="col-md-1">Size</th>
        <th style="text-align:center; vertical-align:middle;" class="col-md-1">Số lượng</th>
      </tr>
      <?php
	  	while ($row = mysql_fetch_array($run)) {
	  ?>
      <tr>
        <td style="text-align:center;text-transform:capitalize;"><?php echo $row['product_name']?></td>
        <td style="text-align:center;text-transform:capitalize;"><?php echo $row['product_size']?></td>
        <td style="text-align:center;"><?php echo $row['quantity']?></td>
      </tr>
      <?php
		}
	  ?>
    </table>
    <center><button class="btn btn-md btn-primary" name="btn_print" type="submit"> In đơn hàng</button></center>
</div>
