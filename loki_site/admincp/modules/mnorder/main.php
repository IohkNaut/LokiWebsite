<div class="content col-md-8 col-sm-8 col-xs-12" style="float:right; border-left: #999 solid 2px;">
	<?php
		if(isset($_GET['view'])) {
			$tmp = $_GET['view'];
		} else {
			$tmp = '';}
		if($tmp == 'new') {
			include('modules/mnorder/listed.php');
		} else 
			include('modules/mnorder/all_listed.php');
	?>			
</div>        
<div class="sidebar col-md-4 col-sm-4 col-xs-12" style="float:left;">	
    <?php
		if(isset($_GET['ac'])) {
			$tmp = $_GET['ac'];
		} else {
			$tmp = '';}
		
		if($tmp == 'edit') {
			include('modules/mnorder/edit.php');
		} else if ($tmp == 'view') {
			include('modules/mnorder/listed_dt.php');
		}
	?>
</div>