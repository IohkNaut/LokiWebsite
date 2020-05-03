<?php
	$sql_catalog = "select * from catalog order by catalog_id";
	$run_catalog = mysql_query($sql_catalog);
	$catalog_id = $_GET['id'];
	$sql_edit = "select * from catalog where catalog_id = $catalog_id";
	$run_edit = mysql_query($sql_edit);
	$row_edit = mysql_fetch_array($run_edit);
?>
<legend style="margin-top:13px; font-weight:bold;"><i class="glyphicon glyphicon-plus-sign"></i> SỬA LOẠI SẢN PHẨM</legend> 
<form action="modules/mncatalog/handle.php?id=<?php echo $catalog_id ?>" enctype="multipart/form-data" method="post" class="form" role="form" >
    <label for="">Tên loại sản phẩm</label> 
    
    <input class="form-control" name="txt_catalog_name" type="text" style="margin-top:10px;text-transform:capitalize;" required="required" 
    		value="<?php  echo $row_edit['catalog_name'];?>">
    <label for="" style="margin-top:12px;">Loại sản phẩm cha</label> <br>
    <div class="row" >
    	<div class="col-xs-8 col-md-8 col-sm-8" style="margin-top:10px;">
            <select id="parent_select" name="slt_parent_id" style="text-transform:capitalize;height:33px; 
                                                                            border-radius:4px;font-size:14px;" class="col-xs-12 col-md-12 col-sm-12">
            <?php
				if ($row_edit['parent_id']=='null') {
			?>
                <option value="null" selected="selected"></option>               
            <?php
				} else {
			?>
            	<option value="null"></option>
            <?php
				}
			?>
            <?php		
                while ($row_catalog = mysql_fetch_array($run_catalog)) {
					
					if($row_catalog['catalog_id'] == $row_edit['parent_id']) {
            ?>
                <option selected="selected" style="text-transform:capitalize;" 
                		value=<?php echo $row_catalog['catalog_id']?> ><?php echo $row_catalog['catalog_name'] ?></option>
            <?php
					} else {
			?>
            	<option style="text-transform:capitalize;" value=<?php echo $row_catalog['catalog_id']?> ><?php echo $row_catalog['catalog_name'] ?></option>
			<?php
                	}
				}
            ?>
            </select>
        </div>
        <div class="col-xs-4 col-md-4 col-sm-4" style="margin-top:10px;">
        	<button class="btn btn-primary" type="submit" name="btn_edit">Sửa</button> 
        </div>
    </div>
    <br />
</form>  
