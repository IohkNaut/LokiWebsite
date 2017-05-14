<?php
	include('../../config.php');
	$product_id = $_GET['id'];
	
	if(isset($_POST['btn_insert'])) {
		foreach($_FILES['file']['name'] as $i => $name) {
			$name = $_FILES['file']['name'][$i];
			$type = $_FILES['file']['type'][$i];
			$size = $_FILES['file']['size'][$i];
			$tmp = $_FILES['file']['tmp_name'][$i];
			$explode = explode('.', $name);
			$ext = end($explode);
			$path = 'uploaded/';
			$path = $path . basename($name);
			$pd_img = basename($name);
			if (empty($tmp)) {
				//thong bao
			} else {
				$allow = array('jpeg', 'png', 'jpg', 'gif', 'bmp');
				$max_size = 4000000;
				if(in_array($ext, $allow) === false) {
					//thong bao
				} if($size > $max_size) {
					//thong bao
				}
			}
		
			if(in_array($ext, $allow) === true && $size <= $max_size) {
				if (!file_exists('uploaded')) {
					mkdir('uploaded', 0777);
				}
				if (move_uploaded_file($tmp, $path)) {
					$sql = mysql_query("insert into product_gallery(product_id, image) values ('$product_id', '$pd_img')");
					header("location: ../../index.php?manage=pd_gallery&id=$product_id");
					//thong bao thanh cong
				} else {
					//thong bao that bai
				}
			}
		}
	} else {
		$gallery_id = $_GET['gal_id'];
		$sql = "delete from product_gallery where pd_gallery_id = $gallery_id";
		mysql_query($sql);
		header("location: ../../index.php?manage=pd_gallery&id=$product_id");
	}
?>