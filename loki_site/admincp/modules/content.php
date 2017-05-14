<div id="wrapper">
	<div class="container">
        <div class="row" style="border: #999 solid 2px;">  
		<?php
			if(isset($_GET['manage'])) {
				$tmp = $_GET['manage'];
			} else {
				$tmp = '';}
				
			if($tmp == 'mncatalog') {
				include('modules/mncatalog/main.php');
			} else if($tmp == 'mnproduct') {
				include('modules/mnproduct/main.php');
			} else if($tmp == 'pd_details') {
				include('modules/pd_details/main.php');
			} else if($tmp == 'pd_gallery') {
				include('modules/pd_gallery/main.php');
			} else if($tmp == 'mnmember') {
				include('modules/mnmember/main.php');
			} else if($tmp == 'mnadmin') {
				include('modules/mnadmin/main.php');
			} else if($tmp == 'mnnews') {
				include('modules/mnnews/main.php');
			} else if($tmp == 'mnorder') {
				include('modules/mnorder/main.php');
			} else if($tmp == 'or_details') {
				include('modules/or_details/main.php');
			} else
				include('modules/slider.php');
			
		?>
        
        </div>
	</div><!--container-->
</div><!--wrapper-->
 <!--CONTENT : END -->