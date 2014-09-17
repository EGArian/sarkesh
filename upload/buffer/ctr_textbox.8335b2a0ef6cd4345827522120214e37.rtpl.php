<div class="form-group sm <?php if( $type != 'default' ){ ?>has-<?php echo $type;?><?php } ?>">
	<div class="row">
		<div class="col-sm-<?php echo $size;?>">
			<label class="<?php if( $inline ){ ?> sr-only <?php } ?>" for="<?php echo $id;?>"> <?php if( $label != '' ){ ?><?php echo $label;?><?php } ?> </label>
			<div class="input-group">
				
				<?php if( $addon != '' ){ ?><span class="input-group-addon"><?php echo $addon;?></span><?php } ?>
				<input 
				type="<?php if( $password ){ ?>password<?php }else{ ?>text<?php } ?>"
				name="<?php echo $id;?>" 
				placeholder="<?php echo $placeholder;?>"
				id="<?php echo $id;?>" 
				form="<?php echo $form;?>"
				value="<?php echo $value;?>" 
				class="<?php if( $bs_control ){ ?>form-control<?php } ?> <?php echo $class;?> ca_<?php echo $form;?> <?php if( $bs_size != 'default' ){ ?>input-<?php echo $bs_size;?><?php } ?>" 
				style="<?php echo $styles;?>" 
				<?php if( $disabled == 'disabled' ){ ?> disabled="disabled"<?php } ?> 
				<?php if( $j_onblur != '0' || $p_onblur_p != '0' || $j_after_onblur !='0' ){ ?> onblur="ctr_system_event(this,'ctr_button','<?php echo $j_onblur;?>','<?php echo $p_onblur_p;?>','<?php echo $p_onblur_f;?>','<?php echo $j_after_onblur;?>');"<?php } ?> 
				<?php if( $j_onfocus != '0' || $p_onfocus_p != '0' || $j_after_onfocus !='0' ){ ?>onfocus="ctr_system_event(this,'ctr_button','<?php echo $j_onfocus;?>','<?php echo $p_onfocus_p;?>','<?php echo $p_onfocus_f;?>','<?php echo $j_after_onfocus;?>');"<?php } ?> 
				<?php if( $j_onclick != '0' || $p_onclick_p != '0' || $j_after_onclick !='0' ){ ?>onclick="ctr_system_event(this,'ctr_button','<?php echo $j_onclick;?>','<?php echo $p_onclick_p;?>','<?php echo $p_onclick_f;?>','<?php echo $j_after_onclick;?>');"<?php } ?>
				>
				</input>
			</div>
			
		</div>
	</div>
	<?php if( $help!='' ){ ?><span class="help-block"><?php echo $help;?></span><?php } ?>
</div>
