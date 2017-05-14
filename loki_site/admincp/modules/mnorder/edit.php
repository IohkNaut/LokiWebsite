<?php
	$orders_id = $_GET['id'];
	$sql_edit = "select member_name, phone, orders.address, date, cost, status 
	from orders join member on orders.member_id = member.member_id 
	where orders_id = $orders_id";
	$run_edit = mysql_query($sql_edit);
	$row_edit = mysql_fetch_array($run_edit);
?>
<legend style="margin-top:13px; font-weight:bold;"><i class="glyphicon glyphicon-plus-sign"></i> THÔNG TIN ĐƠN HÀNG</legend> 
<form action="modules/mnorder/handle.php?id=<?php echo $orders_id ?>" enctype="multipart/form-data" method="post" class="form" role="form"> 
    <label for=""> Tên khách hàng</label>
    <input class="form-control" type="text" value="<?php echo $row_edit['member_name'] ?>" readonly="readonly">
    <label for=""> Số điện thoại</label>
    <input class="form-control" type="text" value="<?php echo $row_edit['phone'] ?>" readonly="readonly">
    <label for=""> Ngày đặt hàng</label>
    <input class="form-control" type="text" value="<?php echo $row_edit['date'] ?>" readonly="readonly">
    <label for=""> Trị giá đơn hàng</label>
    <input class="form-control" type="text" value="<?php echo number_format($row_edit['cost'], 0) ?> vnđ" readonly="readonly">
    <label for=""> Địa chỉ giao hàng</label>
    <?php
		if($row_edit['status'] == 0) {
	?>
    <input class="form-control" name="txt_address" required="" type="text" value="<?php echo $row_edit['address'] ?>"> 
	<div class="row"> 
        <div class="col-xs-6 col-md-6">
            <label for=""> Trạng thái</label>
            <select name="slt_status" style="height:33px;border-radius:4px;font-size:14px; margin-bottom:25px;" class="col-xs-12 col-md-12">
            <?php
                if ($row_edit['status'] == 0) {
                    echo '<option value="0" selected="selected">Chưa giao</option>';
                    echo '<option value="1">Đã giao</option>';
                }
                else {
                    echo '<option value="1" selected="selected">Đã giao</option>';
                    echo '<option value="0">Chưa giao</option>';
                }
            ?>
            </select>
        </div> 
        <div class="col-xs-6 col-md-6" style="margin-top:30px;"> 
		    <center><strong><a href="index.php?manage=mnorder&ac=view&id=<?php echo $orders_id;?>" 
            style="color:#F00; size:18px;">Chi tiết đơn hàng >> </a></strong></center>
        </div> 
    </div> 
	
    <button class="btn btn-md btn-primary btn-block" name="btn_edit" type="submit"> Lưu</button>
    <?php } else { ?>
		<input class="form-control" name="txt_address" readonly="readonly" type="text" value="<?php echo $row_edit['address'] ?>"> 
        <div class="row"> 
            <div class="col-xs-6 col-md-6">
                <label for=""> Trạng thái</label>
                <select name="slt_status" disabled="disabled" style="height:33px;border-radius:4px;font-size:14px; margin-bottom:25px;" class="col-xs-12 col-md-12">
                <?php
                	echo '<option value="1" selected="selected">Đã giao</option>';
                ?>
                </select>
            </div> 
            <div class="col-xs-6 col-md-6" style="margin-top:30px;"> 
                <center><strong><a href="index.php?manage=mnorder&ac=view&id=<?php echo $orders_id;?>" 
                style="color:#F00; size:18px;">Chi tiết đơn hàng >> </a></strong></center>
            </div> 
        </div>
	<?php } ?>
</form> 