<?php
	$product_id = $_GET['id'];
	$sql = "select * from product join product_detail on product.product_id = product_detail.product_id
			 where product_detail.product_id = $product_id";
	$run = mysql_query($sql);
?>
<div class="table-responsive" style="margin-top:8px;">
    <table class="table table-bordered table-hover">
      <tr >
        <th style="text-align:center" class="col-md-1">ID</th>
        <th style="text-align:center" class="col-md-1">Tên sản phẩm</th>
        <th style="text-align:center" class="col-md-1">Size</th>
        <th style="text-align:center" class="col-md-1">Số lượng</th>
        <th style="text-align:center" class="col-md-1" colspan="2">Quản lý</th>
      </tr>
      <?php
	  	while ($row = mysql_fetch_array($run)) {
	  ?>
      <tr>
        <td style="text-align:center;"><?php echo $row['pd_detail_id']?></td>
        <td style="text-align:center;text-transform:capitalize;"><?php echo $row['product_name']?></td>
        <td style="text-align:center;text-transform:capitalize;"><?php echo $row['size']?></td>
        <td style="text-align:center;"><?php echo $row['quantity']?></td>
        <td align="center">
        	<a href="index.php?manage=pd_details&amp;ac=edit&id=<?php echo $row['product_id'] ?>&amp;dt_id=<?php echo $row['pd_detail_id'] ?>">
            	<img src="../images/Edit.png"/></a></td>
        <td align="center">
        	<a href="modules/pd_details/handle.php?id=<?php echo $row['product_id'] ?>&dt_id=<?php echo $row['pd_detail_id'] ?>">
            	<img src="../images/Delete.png"/></a></td>
      </tr>
      <?php
		}
	  ?>
    </table>
</div>
