<?php session_start(); ob_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Đặt hàng | Loki Store</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css"/> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
    </head>
    
    <body> 
    <div class="main"> 
<?php
	include('admincp/config.php');
	include('modules/header_2.php');
	include('modules/navigation.php');
	$username = $_SESSION['login_mem'];
	$sql_mem = "select * from member where member_id = $username";
	$run_mem = mysql_query($sql_mem);
	$mem = mysql_fetch_array($run_mem);
?>
    <div class="container"> 
        <div class="row"> 
            <div class="col-xs-12 col-sm-12 col-md-6 well well-sm col-md-offset-3" style="margin-top:20px;"> 
			<h2 class="text-center">THÔNG TIN ĐẶT HÀNG</h2><br/>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Khách hàng: </strong><?php echo $mem['member_name'];?></li>
					<li class="list-group-item"><strong>Email: </strong><?php echo $mem['email'];?></li>
                    <li class="list-group-item"><strong>Số điện thoại: </strong><?php echo $mem['phone'];?></li>
                </ul>
                <form action="checkout.php" method="post" class="form" role="form" enctype="multipart/form-data"> 
                    <label for=""> Địa chỉ giao hàng: </label>
                    <input class="form-control" name="txt_address" required="" type="text" value="<?php echo $mem['address'];?>"> 
					<br/> 
                    <br/> 
                    <button class="btn btn-lg btn-primary btn-block" name="btn_check" type="submit"> Đặt hàng</button> 
                </form> 
            </div>  
        </div>
    </div>
<?php
	if(isset($_POST['btn_check'])) {
		$address = $_POST['txt_address'];
		if(isset($_SESSION['sum']))
			$sum = $_SESSION['sum'];
		else
			$sum = 0;
		$sql_or = "insert into orders(member_id, address, cost, status) values ($username, '$address', $sum, 0)";
		if(mysql_query($sql_or)) {
			$query_id = mysql_query("select max(orders_id) as max from orders");
			$run_id = mysql_fetch_array($query_id);
			$id = $run_id['max'];
			foreach($_SESSION as $name => $value) {
				if($value > 0) {
					if(substr($name, 0, 5) == 'cart_') {
						$add = substr($name, 7, strlen($name - 7));
						$size = substr($name, 5, strlen($name - 5));
						$sql_dt = "call sp_orders_detail_ins($id, $add, $size, $value)";
						mysql_query($sql_dt);
						unset($_SESSION[$name]);
					}
				}
			}
			echo '<script> alert("Đặt hàng thành công!"); </script>';
			echo '<script> location.replace("index.php"); </script>';
		}
	}
    include('modules/footer.php');
	ob_end_flush();		
?> 
    </div><!--MAIN : END -->
        
    	<p>&nbsp;</p>
   	<p>&nbsp;</p>
    <script src="bootstrap/js/jquery-3.2.0.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>



