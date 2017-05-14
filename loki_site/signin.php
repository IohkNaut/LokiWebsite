<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Đăng nhập | Đăng kí</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css"/> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link rel="stylesheet" type="text/css" href="css/register.css"/>
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
				
				if(isset($_GET['view'])) {
					$tmp = $_GET['view'];
				} else {
					$tmp = '';}
					
				if($tmp == 'signup') {
					include('modules/register.php');
				} else if($tmp == 'info') {
					include('modules/member_info.php');
				} else if($tmp == 'signin')
					include('modules/login.php');
				else
					include('modules/login.php');
				include('modules/footer.php');		
			?> 
    	</div><!--MAIN : END -->
        
    	<p>&nbsp;</p>
   	<p>&nbsp;</p>
    <script src="bootstrap/js/jquery-3.2.0.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>


