<?php
	if(isset($_GET['ac'])) {
		$tmp = $_GET['ac'];
	} else {
		$tmp = '';}
	if($tmp == 'edit') {?>
    <div class="col-xs-12 col-sm-12 col-md-6 well well-sm col-md-offset-3" style="margin-top:20px;">
    <?php
		include('modules/mnadmin/editpw.php');?>
        </div>
	<?php }   else {
?>
<div class="content col-md-8 col-sm-8 col-xs-12" style="float:right; border-left: #999 solid 2px;">
	<?php
		include('modules/mnadmin/listed.php');
	?>			
</div>        
<div class="sidebar col-md-4 col-sm-4 col-xs-12" style="float:left;">	
    <?php
		include('modules/mnadmin/insert.php');
	}
	?>
</div>