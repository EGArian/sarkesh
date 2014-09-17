
<div class="row">
	<div class="col-xs-<?php echo $size;?>">
		<?php if( $panel ){ ?>
		<div class="panel panel-<?php echo $type;?>">
		  <div class="panel-heading">
			<h3 class="panel-title"><?php echo $label;?></h3>
		  </div>
		  <div class="panel-body">
			<form name="<?php echo $name;?>" class="<?php if( $inline ){ ?>form-inline<?php } ?>">
				<?php $counter1=-1; if( isset($e) && is_array($e) && sizeof($e) ) foreach( $e as $key1 => $value1 ){ $counter1++; ?>
					<?php if( $inline ){ ?><div Class="row"><?php } ?>
						<div class="col-xs-12"><?php echo $value1["body"];?></div>
					<?php if( $inline ){ ?></div><?php } ?>
				<?php } ?>
			</form>
		  </div>
		</div>
		<?php }else{ ?>
		<form name="<?php echo $name;?>" class="<?php if( $inline ){ ?>form-inline<?php } ?>">
				<?php $counter1=-1; if( isset($e) && is_array($e) && sizeof($e) ) foreach( $e as $key1 => $value1 ){ $counter1++; ?>
					<?php if( $inline ){ ?><div Class="row"><?php } ?>
						<div class="col-xs-12"><?php echo $value1["body"];?></div>
					<?php if( $inline ){ ?></div><?php } ?>
				<?php } ?>
			</form>
		<?php } ?>
			

	</div>
</div>
