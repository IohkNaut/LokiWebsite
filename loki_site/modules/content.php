<?php ob_start() ?>
<div id="wrapper">
	<div class="container">
        <div class="row">  
        	<div class="content col-md-10 col-sm-10 col-xs-12" style="float:right;">
	<?php 
        if(isset($_GET['view'])) {
            $tmp = $_GET['view'];
        } else {
            $tmp = '';}
            
        if($tmp == 'all') {
            include('modules/right/all_product.php');
        } else if($tmp == 'details_product') {
            include('modules/right/details_product.php');
        } else if($tmp == 'details_type') {
            include('modules/right/details_type.php');
        } else if($tmp == 'sale') {
            include('modules/right/sale.php');
        } else if($tmp == 'new') {
            include('modules/right/new_arrival.php');
        } else if($tmp == 'best') {
            include('modules/right/best_seller.php');
        } else if($tmp == 'news') {
            include('modules/right/news.php');
        } else if($tmp == 'search') {
            include('modules/right/search.php');
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
<?php ob_end_flush(); ?>