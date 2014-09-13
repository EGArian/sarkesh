<ul class="nav nav-tabs" id="<?php echo $id;?>">
	<?php $counter1=-1; if( isset($tabs) && is_array($tabs) && sizeof($tabs) ) foreach( $tabs as $key1 => $value1 ){ $counter1++; ?><li <?php if( $value1["active"] ){ ?>Class="active"<?php } ?>><a href="#<?php echo $value1["id"];?>" data-toggle="tab"><?php echo $value1["label"];?></a></li><?php } ?>
</ul>
<div class="tab-content">
	<?php $counter1=-1; if( isset($tabs) && is_array($tabs) && sizeof($tabs) ) foreach( $tabs as $key1 => $value1 ){ $counter1++; ?><div Class="tab-pane <?php if( $value1["active"] ){ ?> active<?php } ?>" id="<?php echo $value1["id"];?>"><br /><div class="col-xs-12"><?php echo $value1["body"];?></div></div><?php } ?> 	  
</div>
