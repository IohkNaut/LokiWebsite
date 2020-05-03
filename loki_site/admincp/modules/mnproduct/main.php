<div class="content col-md-8 col-sm-8 col-xs-12" style="float:right; border-left: #999 solid 2px;">
	<?php
		include('modules/mnproduct/listed.php');
	?>			
</div>        
<div class="sidebar col-md-4 col-sm-4 col-xs-12" style="float:left;">	
    <?php
		if(isset($_GET['ac'])) {
			$tmp = $_GET['ac'];
		} else {
			$tmp = '';}
			
		if($tmp== 'insert') {
			include('modules/mnproduct/insert.php');
		}else if($tmp == 'edit') {
			include('modules/mnproduct/edit.php');
		}
	?>
</div>