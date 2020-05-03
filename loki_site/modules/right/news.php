<div class="row">
    <h3 align="center" class="col-md-12 col-sm-12 col-xs-12"><a href="#"><strong>TIN TỨC</strong></a></h3>
    <div class="row" >
        
    </div>
    <br />
 	<?php
		if(isset($_GET['page'])) {
			$pg = $_GET['page'];
		} else {
			$pg = '';
		}
		if ($pg == '' || $pg == 1) {
			$pg1 = 0;		
		}
		else
			$pg1 = ($pg - 1) * 16;
		$sql_date = "select * from news order by date desc limit $pg1, 10";
		$run_date = mysql_query($sql_date);
		while ($row_date = mysql_fetch_array($run_date)) {
	?>
    <div class="owl-item col-md-12 col-sm-12 col-xs-12"><div class="post-slide">
    <div class="row">
        <div class="post-img col-md-4 col-sm-4 col-xs-4">
        	<a href="#"><img src="admincp/modules/mnnews/uploaded/<?php echo $row_date['image']?>" style="height:200px;"> </a>
        </div> 
        <h2 class="post-title col-md-8 col-sm-8 col-xs-8" > <a href="#" style="font-size:24px;"><?php echo $row_date['title']?></a> </h2> 
        <span class="col-md-8 col-sm-8 col-xs-8"><h4>Ngày đăng: <?php echo date("d/m/Y - H:i:s", strtotime($row_date['date']));?></h4></span>
        </div>
    </div></div>
    <?php
		}
	?>       
    <br/>
    <br/>
</div>
<center><ul class="pagination">
<?php
	if($pg == '' || $pg == 1)
		echo '<li class="disabled"><a href="#">&laquo;</a></li>';
	else
		echo '<li><a href="?view=news&page='.($pg - 1).'">&laquo;</a></li>';

	$query_page = mysql_query("select * from news");
	$count = mysql_num_rows($query_page);
	$page = ceil($count/16);

	for($i = 1; $i <= $page; $i++) {
		if($pg == $i)
			echo '<li class="active"><a href="?view=news&page='.$i.'"> '.$i.'</a></li>';
		else
			echo '<li><a href="?view=news&page='.$i.'"> '.$i.'</a></li>';
		
	}
	
	if($pg == $page)
		echo '<li class="disabled"><a href="#">&raquo;</a></li>';
	else
		echo '<li><a href="?view=news&page='.($pg + 1).'">&raquo;</a></li>';
?>

</ul></center>
