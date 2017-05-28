<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
 <script>tinymce.init({ selector: 'textarea' });</script>
<?php
	$news_id = $_GET['id'];
	$sql = "select * from news where news_id = $news_id";
	$run = mysql_query($sql);
	$row = mysql_fetch_array($run);
?>

<legend style="margin-top:13px; font-weight:bold;"><i class="glyphicon glyphicon-plus-sign"></i> SỬA TIN TỨC</legend> 
<form action="modules/mnnews/handle.php?id=<?php echo $news_id ?>" enctype="multipart/form-data" method="post" class="form" role="form" >
    <label for="">Tiêu đề</label> 
    <input class="form-control" name="txt_title" type="text" style="margin-top:10px;" required="required" 
    												value="<?php echo $row['title']?>">

    <label for="" style="margin-top:10px;">Nội dung</label> 
    <textarea id = "txt_content" name="txt_content" required=""
    							 style="margin-top:10px; height:250px;"><?php echo $row['content']?></textarea>
    
    <label for="" style="margin-top:10px;">Hình ảnh</label> <br />
    <img src="modules/mnnews/uploaded/<?php echo $row['image']?>" width="100px" height="100px"/>
    <input name="file_image" type="file" style="margin-top:10px;">

    <button class="btn btn-primary col-xs-12 col-md-12 col-sm-12" type="submit" name="btn_edit" style="margin-top:18px;">Sửa</button> 
	<br />
</form>  
