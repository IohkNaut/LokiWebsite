<?php
	$sql = "select * from catalog order by catalog_id";
	$run = mysql_query($sql);
?>
<div class="table-responsive" style="margin-top:8px;">
    <table class="table table-bordered table-hover">
      <tr >
        <th style="text-align:center">ID</th>
        <th style="text-align:center">Tên loại sản phẩm</th>
        <th style="text-align:center">Loại sản phẩm cha</th>
        <th style="text-align:center" colspan="2">Quản lý</th>
      </tr>
      <?php
	  	while ($row = mysql_fetch_array($run)) {
	  ?>
      <tr>
        <td style="text-align:center;"><?php echo $row['catalog_id'] ?></td>
        <td style="text-align:center;text-transform:capitalize;"><?php echo $row['catalog_name'] ?></td>
        <td style="text-align:center;"><?php echo $row['parent_id'] ?></td>
        <td align="center">
        	<a href="index.php?manage=mncatalog&ac=edit&id=<?php echo $row['catalog_id'] ?>">
            	<img src="../images/Edit.png"/></a></td>
        <td align="center">
        	<a href="modules/mncatalog/handle.php?id=<?php echo $row['catalog_id'] ?>">
            	<img src="../images/Delete.png"/></a></td>
      </tr>
      <?php
		}
	  ?>
    </table>
</div>
