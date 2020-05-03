<div class="content col-md-8 col-sm-8 col-xs-12" style="float:right; border-left: #999 solid 2px;">
	<?php
		include('modules/mncatalog/listed.php');
	?>			
</div>        
<div class="sidebar col-md-4 col-sm-4 col-xs-12" style="float:left;">	
    <?php
		if(isset($_GET['ac'])) {
			$tam = $_GET['ac'];
		} else {
			$tam = '';}
			
		if($tam == 'insert') {
			include('modules/mncatalog/insert.php');
		}else if($tam == 'edit') {
			include('modules/mncatalog/edit.php');
		}
	?>
</div>