<div class="form-group">
	<div class="row">
		<div class="col-sm-<?php echo $size;?>">
			<label class="<?php if( $inline ){ ?> sr-only <?php } ?>" for="<?php echo $id;?>"> <?php if( $label != '' ){ ?><?php echo $label;?><?php } ?> </label>
			
			<select
			type="text"
			name="<?php echo $id;?>" 
			id="<?php echo $id;?>" 
			form="<?php echo $form;?>" 
			class="<?php if( $bs_control ){ ?>form-control<?php } ?> <?php echo $class;?> ca_<?php echo $form;?>" 
			style="<?php echo $styles;?>" 
			<?php if( $disabled == 'disabled' ){ ?> disabled="disabled"<?php } ?> 
			<?php if( $j_onchange != '0' || $p_onchange_p != '0' || $j_after_onchange !='0' ){ ?> onchange="ctr_system_event(this,'ctr_combobox','<?php echo $j_onchange;?>','<?php echo $p_onchange_p;?>','<?php echo $p_onchange_f;?>','<?php echo $j_after_onchange;?>');"<?php } ?> 
			>
			<?php $counter1=-1; if( isset($source) && is_array($source) && sizeof($source) ) foreach( $source as $key1 => $value1 ){ $counter1++; ?><option value="<?php echo $value1["value"];?>"><?php echo $value1["label"];?></option><?php } ?>
			</select>
			<?php if( $help!='' ){ ?><span class="help-block"><?php echo $help;?></span><?php } ?>
		</div>
	</div>
</div>
