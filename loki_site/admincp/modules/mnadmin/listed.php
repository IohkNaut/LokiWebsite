<?php
	$sql = "call sp_admin_listed();";
	$run = mysql_query($sql);
?>
<div class="table-responsive" style="margin-top:8px;">
    <table class="table table-bordered table-hover">
      <tr >
        <th style="text-align:center" class="col-md-1">ID</th>
        <th style="text-align:center" class="col-md-1">Họ tên</th>
        <th style="text-align:center" class="col-md-1">Tên đăng nhập</th>
        <th style="text-align:center" class="col-md-1" colspan="1">Quản lý</th>
      </tr>
      <?php
	  	while ($row = mysql_fetch_array($run)) {
	  ?>
      <tr>
        <td style="text-align:center;vertical-align:middle;"><?php echo $row['admin_id']?></td>
        <td style="text-align:center;text-transform:capitalize;vertical-align:middle;"><?php echo $row['admin_name']?></td>
        <td style="text-align:center;"><?php echo $row['username']?></td>
        <td align="center" style="vertical-align:middle;">
        	<a href="modules/mnadmin/handle.php?id=<?php echo $row['admin_id'] ?>">
            	<img src="../images/Delete.png"/></a></td>
      </tr>
      <?php
		}
	  ?>
    </table>
</div>
