<div class="row <?php echo $class;?>" style="<?php if( $style !='' ){ ?><?php echo $style;?><?php } ?>">
		<?php $counter1=-1; if( isset($e) && is_array($e) && sizeof($e) ) foreach( $e as $key1 => $value1 ){ $counter1++; ?><div class="col-xs-<?php echo $value1["width"];?> <?php if( $value1["offset"] != 0 ){ ?>col-x-offset-4<?php echo $value1["offset"];?><?php } ?>" ><?php echo $value1["body"];?></div><?php } ?>
</div>
