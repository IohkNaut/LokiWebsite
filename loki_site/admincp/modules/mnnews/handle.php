<?php
	include('../../config.php');
	$id = $_GET['id'];
	$title = $_POST['txt_title'];
	$content = $_POST['txt_content'];
	$image = $_FILES['file_image']['name'];
	$image_tmp = $_FILES['file_image']['tmp_name'];
	move_uploaded_file($image_tmp, 'uploaded/'.$image);

	if(isset($_POST['btn_insert'])) {
		$sql = "insert into news (title, image, content) values ('$title', '$image', '$content')";
		mysql_query($sql);
		header('location: ../../index.php?manage=mnnews&ac=insert');
	} else if (isset($_POST['btn_edit'])) {
		if($image != '') 
			$sql = "update news set title = '$title', image = '$image', content = '$content', date = now() where news_id = $id";
		else
			$sql = "update news set title = '$title', content = '$content', date = now() where news_id = $id";
		mysql_query($sql);
		header('location: ../../index.php?manage=mnnews&ac=insert');
	} else {
		$sql = "delete from news where news_id = $id";
		mysql_query($sql);
		header('location: ../../index.php?manage=mnnews&ac=insert');
	}
?>