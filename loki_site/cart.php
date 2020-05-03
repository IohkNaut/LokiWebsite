<?php session_start();$sum = 0;$count = 0; ob_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Giỏ hàng | Loki Store</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css"/> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link rel="stylesheet" type="text/css" href="css/cart_style.css"/>
    </head>
    
    <body> 
    <div class="main"> 
<?php
	include('admincp/config.php');
	if(isset($_SESSION['login_mem'])) {
		include('modules/header_2.php');
	} else
		include('modules/header.php');
	include('modules/navigation.php');
?>
        <h2 class="text-center">GIỎ HÀNG CỦA BẠN</h2><br/>
        <div class="container"> 
            <table id="cart" class="table table-hover table-condensed" style="font-size:15px;"> 
                <thead> 
                    <tr> 
                        <th style="width:50%">Tên sản phẩm</th>
                        <th style="width:12%">Size</th> 
                        <th style="width:13%">Giá</th> 
                        <th style="width:7%">Số lượng</th> 
                        <th style="width:15%" class="text-center">Thành tiền</th> 
                        <th style="width:3%"> </th> 
                    </tr> 
                </thead>
                <tbody >
<?php
	//them san pham moi
	if(isset($_GET['add']) && !empty($_GET['add'])) {
		$add = $_GET['add'];
		$size = $_POST['slt_size'];
		$quantity = $_POST['num_quantity'];					
		@$_SESSION['cart_'.$size.$add] += $quantity;
		header('location:cart.php');
	}
	
	//hien thi san pham da them
	foreach($_SESSION as $name => $value) {
		if($value > 0) {
			if(substr($name, 0, 5) == 'cart_') {
				$add = substr($name, 7, strlen($name - 7));
				$size = substr($name, 5, strlen($name - 5));
				$sql_pd = "select * from product where product_id = $add";
				$run_pd = mysql_query($sql_pd);
				while ($row_pd = mysql_fetch_array($run_pd)) {
					$price = $row_pd['price'] - $row_pd['price']*$row_pd['discount']/100;
					$sum += $price * $value;
					$count += $value;
?>
                <tr> 
                <td data-th="Product" > 
                    <div class="row" > 
                        <div class="col-sm-2 hidden-xs">
                            <img src="admincp/modules/mnproduct/uploaded/<?php echo $row_pd['image']?>" 
                            class="img-responsive" width="100"></div>
                        <div class="col-sm-10" ><h4 class="nomargin" style=" margin-top:20px;"><?php echo $row_pd['product_name'] ?></h4></div> 
                    </div> 
                </td> 
                <td data-th="Size" style=" vertical-align:middle;"><?php echo $size ?></td> 
                <td data-th="Price" style=" vertical-align:middle;"><?php echo number_format($price,0)?></td> 
                <form method="post" action="cart.php?update=<?php echo $add ?>&size=<?php echo $size ?>">
                <td data-th="Quantity" style=" vertical-align:middle;">
                    <input class="form-control text-center" value="<?php echo $value ?>" type="number" min="1" name="current_num"/></td> 
                <td data-th="Subtotal" class="text-center" style=" vertical-align:middle;"><?php echo number_format(($price*$value), 0)?></td> 
                <td class="actions" data-th="" style=" vertical-align:middle;">
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fa fa-refresh"></i></button>
                    <a href="cart.php?delete=<?php echo $add ?>&size=<?php echo $size ?>" class="btn btn-danger btn-sm">
                    	<i class="fa fa-trash-o"></i></a>
                </td> 
                </form>
                </tr>
<?php
            };
			
        }
    }
}
			//cap nhat san pham
			if(isset($_GET['update']) && isset($_GET['size'])) {
                $upd_id = $_GET['update'];
                $upd_size = $_GET['size'];
                $upd_quan = $_POST['current_num'];					
                @$_SESSION['cart_'.$upd_size.$upd_id] = $upd_quan;
				header('location:cart.php');
            }
			//xoa san pham
			if(isset($_GET['delete']) && isset($_GET['size'])) {
                $del_id = $_GET['delete'];
                $del_size = $_GET['size'];			
                @$_SESSION['cart_'.$del_size.$del_id] = 0;
				header('location:cart.php');
            }
?>

            </tbody>
            <tfoot>
			<?php
					echo "<h4 align='center'><strong>($count sản phẩm)</strong></h4><br/>";
					$_SESSION['count'] = $count;
			?>
                <tr> 
                    <td><a href="#" class="btn btn-success"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a></td> 
                    <td colspan="1" class="hidden-xs"> </td> 
                    <td colspan="2" class="hidden-xs text-center"><strong>Tổng tiền: <?php echo number_format($sum,0)?> vnđ</strong></td> 
                    <?php
						$_SESSION['sum'] = $sum;
						
						if(isset($_SESSION['login_mem'])) {
							echo '<td><a href="checkout.php" class="btn btn-success">Tiến hành đặt hàng <i class="fa fa-angle-right"></i></a></td>';
						} else
							echo '<td><a href="#" class="btn btn-success disabled">Tiến hành đặt hàng <i class="fa fa-angle-right"></i></a></td>';
					?>
                     
                </tr>

            </tfoot> 
        </table>
    </div>
<?php
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



