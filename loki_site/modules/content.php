<div id="wrapper">
	<div class="container">
        <div class="row">  
        	<div class="content col-md-10 col-sm-10 col-xs-12" style="float:right;">
                <?php 
                	if(isset($_GET['xem'])) {
						$tam = $_GET['xem'];
					} else {
						$tam = '';}
						
					if($tam == 'all') {
						include('modules/right/all_product.php');
					} else if($tam == 'details_product') {
						include('modules/right/details_product.php');
					} else if($tam == 'details_type') {
						include('modules/right/details_type.php');
					} else
						include('modules/right/index_content.php');
					
                ?>
            </div>        
            <div class="sidebar col-md-2 col-sm-2 col-xs-12" style="float:left;">
                <?php 
                    include('modules/left/catalog.php');
                ?>
            </div>
            
            
        </div>
	</div><!--container-->
</div><!--wrapper-->
 <!--CONTENT : END -->