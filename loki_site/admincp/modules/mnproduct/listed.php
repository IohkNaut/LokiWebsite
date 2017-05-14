<?php
	$sql = "select * from product join catalog on product.catalog_id = catalog.catalog_id order by product_id";
	$run = mysql_query($sql);
?>
<div class="table-responsive" style="margin-top:8px;">
    <table class="table table-bordered table-hover">
      <tr >
        <th style="text-align:center" class="col-md-1">ID</th>
        <th style="text-align:center" class="col-md-1">Tên sản phẩm</th>
        <th style="text-align:center" class="col-md-1">Loại sản phẩm</th>
        <th style="text-align:center" class="col-md-4">Mô tả sản phẩm</th>
        <th style="text-align:center" class="col-md-1">Giá niêm yết</th>
        <th style="text-align:center" class="col-md-1">Giảm giá</th>
        <th style="text-align:center" class="col-md-2">Hình ảnh</th>
        <th style="text-align:center" class="col-md-1" colspan="2">Quản lý</th>
      </tr>
      <?php
	  	while ($row = mysql_fetch_array($run)) {
	  ?>
      <tr>
        <td style="text-align:center;"><?php echo $row['product_id']?></td>
        <td style="text-align:center;text-transform:capitalize;">
			<?php echo $row['product_name']?>
            <p><a href="index.php?manage=pd_details&ac=insert&id=<?php echo $row['product_id'] ?>" style="color:#00F;"><i>Chi tiết</a></i></p></td>
        <td style="text-align:center;text-transform:capitalize;"><?php echo $row['catalog_name']?></td>
        <td style="text-align:justify;"><?php echo $row['description']?></td>
        <td style="text-align:center;"><?php echo $row['price']?></td>
        <td style="text-align:center;"><?php echo $row['discount']?></td>
        <td style="text-align:center;">
        	<img width="80px" height="80px" src="modules/mnproduct/uploaded/<?php echo $row['image']?> "/>
            <p><a href="index.php?manage=pd_gallery&id=<?php echo $row['product_id'] ?>" style="color:#00F;"><i>Hình ảnh khác</i></a></p>
        </td>
        <td align="center">
        	<a href="index.php?manage=mnproduct&ac=edit&id=<?php echo $row['product_id'] ?>">
            	<img src="../images/Edit.png"/></a></td>
        <td align="center">
        	<a href="modules/mnproduct/handle.php?id=<?php echo $row['product_id'] ?>">
            	<img src="../images/Delete.png"/></a></td>
      </tr>
      <?php
		}
	  ?>
    </table>
</div>
