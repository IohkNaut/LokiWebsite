<?php
	$sql = "select * from member order by member_id";
	$run = mysql_query($sql);
?>
<div class="table-responsive" style="margin-top:8px;">
    <table class="table table-bordered table-hover">
      <tr >
        <th style="text-align:center">ID</th>
        <th style="text-align:center">Họ tên</th>
        <th style="text-align:center">Ngày sinh</th>
        <th style="text-align:center">Giới tính</th>
        <th style="text-align:center">SĐT</th>
        <th style="text-align:center">Email</th>
        <th style="text-align:center" colspan="2">Quản lý</th>
      </tr>
      <?php
	  	while ($row = mysql_fetch_array($run)) {
	  ?>
      <tr>
        <td style="text-align:center;"><?php echo $row['member_id'] ?></td>
        <td style="text-align:center;text-transform:capitalize;"><?php echo $row['member_name'] ?></td>
        <td style="text-align:center;"><?php echo $row['dob'] ?></td>
        <td style="text-align:center;"><?php if (($row['gender']) == 0) {echo "Nữ";} else {echo 'Nam';}  ?></td>
        <td style="text-align:center;"><?php echo $row['phone'] ?></td>
        <td style="text-align:center;"><?php echo $row['email'] ?></td>
        <td align="center">
        	<a href="index.php?manage=mnmember&ac=edit&id=<?php echo $row['member_id'] ?>">
            	<img src="../images/Edit.png"/></a></td>
        <td align="center">
        	<a href="modules/mnmember/handle.php?id=<?php echo $row['member_id'] ?>">
            	<img src="../images/Delete.png"/></a></td>
      </tr>
      <?php
		}
	  ?>
    </table>
</div>
