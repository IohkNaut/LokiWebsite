<?php
	$sql = "select orders.orders_id, orders.member_id, member_name, phone, orders.address, cost, status 
	from orders join member on orders.member_id = member.member_id 
	where status = 0 order by orders_id";
	$run = mysql_query($sql);
?>
<div class="table-responsive" style="margin-top:8px;">
    <table class="table table-bordered table-hover">
      <tr >
        <th style="text-align:center">ID</th>
        <th style="text-align:center">Tên khách hàng</th>
        <th style="text-align:center">Số điện thoại</th>
        <th style="text-align:center">Địa chỉ giao hàng</th>
        <th style="text-align:center">Trị giá</th>
        <th style="text-align:center">Trạng thái</th>
        <th style="text-align:center" colspan="2">Quản lý</th>
      </tr>
      <?php
	  	while ($row = mysql_fetch_array($run)) {
	  ?>
      <tr>
        <td style="text-align:center;"><?php echo $row['orders_id'] ?></td>
        <td style="text-align:center;text-transform:capitalize;">
        	<a href="index.php?manage=mnmember&ac=edit&id=<?php echo $row['member_id'] ?>"><?php echo $row['member_name'] ?></a></td>
        <td style="text-align:center;"><?php echo $row['phone'] ?></td>
        <td style="text-align:center;"><?php echo $row['address'] ?></td>
        <td style="text-align:center;"><?php echo $row['cost'] ?></td>
        <td style="text-align:center;"><?php if (($row['status']) == 0) {echo "Chưa giao";} else {echo 'Đã giao';}  ?></td>
        <td align="center">
        	<a href="index.php?manage=mnorder&ac=edit&id=<?php echo $row['orders_id'] ?>">
            	<img src="../images/Edit.png"/></a></td>
        <td align="center">
        	<a href="modules/mnorder/handle.php?id=<?php echo $row['orders_id'] ?>">
            	<img src="../images/Delete.png"/></a></td>
      </tr>
      <?php
		}
	  ?>
    </table>
</div>
