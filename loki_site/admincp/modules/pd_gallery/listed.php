<?php
	$product_id = $_GET['id'];
	$sql = "select * from product join product_gallery on product.product_id = product_gallery.product_id
			 where product_gallery.product_id = $product_id";
	$run = mysql_query($sql);
?>
<div class="table-responsive" style="margin-top:8px;">
    <table class="table table-bordered table-hover">
      <tr >
        <th style="text-align:center" class="col-md-1">ID</th>
        <th style="text-align:center" class="col-md-1">Tên sản phẩm</th>
        <th style="text-align:center" class="col-md-2">Hình ảnh</th>
        <th style="text-align:center" class="col-md-1" colspan="1">Quản lý</th>
      </tr>
      <?php
	  	while ($row = mysql_fetch_array($run)) {
	  ?>
      <tr>
        <td style="text-align:center;vertical-align:middle;"><?php echo $row['pd_gallery_id']?></td>
        <td style="text-align:center;text-transform:capitalize;vertical-align:middle;"><?php echo $row['product_name']?></td>
        <td style="text-align:center;">
			<img width="100px" height="100px" src="modules/pd_gallery/uploaded/<?php echo $row['image']?> "/></td>
        <td align="center" style="vertical-align:middle;">
        	<a href="modules/pd_gallery/handle.php?id=<?php echo $row['product_id'] ?>&gal_id=<?php echo $row['pd_gallery_id'] ?>">
            	<img src="../images/Delete.png"/></a></td>
      </tr>
      <?php
		}
	  ?>
    </table>
</div>
