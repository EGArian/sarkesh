<div class="row">
	<div class="col-xs-<?php echo $size;?>">
		<table <?php if( $bs_control ){ ?>class="table <?php if( $border ){ ?>table-bordered <?php } ?> <?php if( $hover ){ ?>table-hover<?php } ?> <?php if( $striped ){ ?>table-striped<?php } ?> <?php if( $class != '' ){ ?> <?php echo $class;?><?php } ?>"<?php } ?> >
		<tr class="success"><?php $counter1=-1; if( isset($headers) && is_array($headers) && sizeof($headers) ) foreach( $headers as $key1 => $value1 ){ $counter1++; ?><th class="text-center col-md-<?php echo $headers_width["$key1"];?>"><?php echo $value1;?></th><?php } ?></tr>
		<?php $counter1=-1; if( isset($rows) && is_array($rows) && sizeof($rows) ) foreach( $rows as $key1 => $value1 ){ $counter1++; ?>
			<tr class="">
			<?php $counter2=-1; if( isset($value1) && is_array($value1) && sizeof($value1) ) foreach( $value1 as $key2 => $value2 ){ $counter2++; ?>
				<td class="text-center "><?php echo $value2;?></td>
			<?php } ?>
			</tr>
		<?php } ?>
		</table>
	</div>
</div>

