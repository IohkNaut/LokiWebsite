<?php
	if(isset($_SESSION['login_ad'])) {
		$username = $_SESSION['login_ad'];
		$sql = "select * from admin where username = '$username'";
		$run = mysql_query($sql);
		$admin = mysql_fetch_array($run);	}
	
?>
<div class="content col-md-8 col-sm-8 col-xs-12" style="float:right;">
	<div class="alert alert-info" style="padding-left:30px; margin-top:20px; font-weight:bold; font-size:20px; " role="alert">Chàoo <?php echo $admin['admin_name'];?>!!!<br />Bạn xem báo cáo hôm nay chưa????</div>
    
	<div class="alert alert-warning" style="padding-left:30px; margin-top:20px; font-weight:bold; font-size:16px; " role="alert">
    
    	<form action="fpdf/inventory_report.php" enctype="multipart/form-data" method="get" class="form-horizontal" role="form" >
            <i class="glyphicon glyphicon-chevron-right"></i>
            <label for="" style="margin-left:5px;"> Báo cáo tồn kho </label>  
            <i class="glyphicon glyphicon-hand-right" style="margin-left:5px;"></i>
            <button class="btn btn-primary " style="margin-left:10px;" type="submit" name="btn_rpt1">Xem báo cáo</button> 
            <br />
        </form>
        
        <br />
        <br />
        
        <form action="fpdf/outofstock_report.php" enctype="multipart/form-data" method="get" class="form-horizontal" role="form" >
            <i class="glyphicon glyphicon-chevron-right"></i>
            <label for="" style="margin-left:5px;"> Báo cáo sản phẩm đã hết hàng </label>  
            <i class="glyphicon glyphicon-hand-right" style="margin-left:5px;"></i>
            <button class="btn btn-primary " style="margin-left:10px;" type="submit" name="btn_rpt4">Xem báo cáo</button> 
            <br />
        </form>
        
        <br />
        <br />
        
        <form action="fpdf/revenue_month_report.php" enctype="multipart/form-data" method="get" class="form-horizontal" role="form" >
            <i class="glyphicon glyphicon-chevron-right"></i>
            <label for="" style="margin-left:5px;"> Báo cáo doanh thu tháng </label> 
            <select id="catalog_select" name="month" style=" text-align:center;height:30px; margin-top:5px;
                                                                            border-radius:4px;font-size:15px; margin-left:5px;">
				<?php
					$i = 1;
					while($i < 13) {
				?>
                <option style="text-transform:capitalize;" value=<?php echo $i?> ><?php echo $i?></option>
            	<?php
					$i++;
					}
				?>
            </select>
            <label for="" style="margin-left:5px;"> năm </label> 
            <select id="catalog_select" name="year" style=" text-align:center;height:30px; margin-top:5px;
                                                                            border-radius:4px;font-size:15px; margin-left:5px;">
				<?php
					$i = date(Y);
					while($i > 2009) {
				?>
                <option style="text-transform:capitalize;" value=<?php echo $i?> ><?php echo $i?></option>
            	<?php
					$i--;
					}
				?>
            </select>
            <i class="glyphicon glyphicon-hand-right" style="margin-left:5px;"></i>
            <button class="btn btn-primary " style="margin-left:10px;" type="submit" name="btn_rpt2">Xem báo cáo</button> 
            <br />
        </form>
        
        <br />
        <br />
        
        <form action="fpdf/revenue_day_report.php" enctype="multipart/form-data" method="get" class="form-inline" role="form" >
            <i class="glyphicon glyphicon-chevron-right"></i>
            <label for="" style="margin-left:5px;"> Báo cáo doanh thu ngày </label> 
            <input name="day" type="date" style="text-align:center;height:30px; margin-top:5px;
                                                                            border-radius:4px;font-size:15px;margin-left:5px;">
            <i class="glyphicon glyphicon-hand-right" style="margin-left:5px;"></i>
            <button class="btn btn-primary " style="margin-left:10px;" type="submit" name="btn_rpt3">Xem báo cáo</button> 
            <br />
        </form>
        
    </div>
    
</div>
        
<div class="sidebar col-md-4 col-sm-4 col-xs-12" style="float:left;">	
    <img src="../images/large.png"/>
</div>