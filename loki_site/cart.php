<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Giỏ hàng - LOKI STORE</title>
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
				include('modules/header.php');
				include('modules/navigation.php');
			?>
            <h2 class="text-center">GIỎ HÀNG CỦA BẠN</h2><br/>
            <div class="container-fluid"> 
                <table id="cart" class="table table-hover table-condensed" > 
                    <thead> 
                       <tr> 
                        <th style="width:50%">Tên sản phẩm</th> 
                        <th style="width:10%">Giá</th> 
                        <th style="width:8%">Số lượng</th> 
                        <th style="width:22%" class="text-center">Thành tiền</th> 
                        <th style="width:10%"> </th> 
                       </tr> 
                    </thead> 
                    <tbody><tr> 
                        <td data-th="Product"> 
                            <div class="row"> 
                                <div class="col-sm-2 hidden-xs"><img src="images/yeezy_moonrock.jpg" alt="Sản phẩm 1" class="img-responsive" width="100"></div> 
                                <div class="col-sm-10"><h4 class="nomargin">Sản phẩm 1</h4></div> 
                            </div> 
                        </td> 
                        <td data-th="Price">200.000 đ</td> 
                        <td data-th="Quantity"><input class="form-control text-center" value="1" type="number"></td> 
                        <td data-th="Subtotal" class="text-center">200.000 đ</td> 
                        <td class="actions" data-th="">
                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                        </td> 
                    </tr> 
                    <tr> 
                        <td data-th="Product"> 
                            <div class="row"> 
                                <div class="col-sm-2 hidden-xs"><img src="images/yeezy_moonrock.jpg" alt="Sản phẩm 1" class="img-responsive" width="100"></div> 
                                <div class="col-sm-10"><h4 class="nomargin">Sản phẩm 1</h4></div> 
                            </div> 
                        </td> 
                        <td data-th="Price">200.000 đ</td> 
                        <td data-th="Quantity"><input class="form-control text-center" value="1" type="number"></td> 
                        <td data-th="Subtotal" class="text-center">200.000 đ</td> 
                        <td class="actions" data-th="">
                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                        </td>
                    </tr></tbody>
                    <tfoot> 
                        <tr class="visible-xs"> 
                            <td class="text-center"><strong>Tổng 400.000 đ</strong></td> 
                        </tr> 
                        <tr> 
                            <td><a href="#" class="btn btn-success"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a></td> 
                            <td colspan="2" class="hidden-xs"> </td> 
                            <td class="hidden-xs text-center"><strong>Tổng tiền 500.000 đ</strong></td> 
                            <td><a href="#" class="btn btn-success btn-block">Thanh toán <i class="fa fa-angle-right"></i></a></td> 
                        </tr> 
                    </tfoot> 
                </table>
                </div>
            <?php
				include('modules/footer.php');		
			?> 
    	</div><!--MAIN : END -->
        
    	<p>&nbsp;</p>
   	<p>&nbsp;</p>
    <script src="bootstrap/js/jquery-3.2.0.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>



