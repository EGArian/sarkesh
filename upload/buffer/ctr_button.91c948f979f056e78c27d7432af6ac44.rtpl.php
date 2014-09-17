<?php if( $href != '' ){ ?><a href="<?php echo $href;?>"><?php } ?>
<button 
	type="button"
	value="<?php echo $value;?>" 
	name="<?php echo $id;?>" 
	id="<?php echo $id;?>" 
	form="<?php echo $form;?>" 
	class="button <?php if( $bs_control ){ ?><?php echo $type;?> <?php echo $class;?> <?php if( $size != '' ){ ?>btn-<?php echo $size;?><?php } ?><?php } ?> ca_<?php echo $form;?>" 
	style="<?php echo $styles;?>" 
	<?php if( $disabled == 'disabled' ){ ?> disabled="disabled"<?php } ?> 
	<?php if( $j_onblur != '0' || $p_onblur_p != '0' || $j_after_onblur !='0' ){ ?> onblur="ctr_system_event(this,'ctr_button','<?php echo $j_onblur;?>','<?php echo $p_onblur_p;?>','<?php echo $p_onblur_f;?>','<?php echo $j_after_onblur;?>');"<?php } ?> 
	<?php if( $j_onfocus != '0' || $p_onfocus_p != '0' || $j_after_onfocus !='0' ){ ?>onfocus="ctr_system_event(this,'ctr_button','<?php echo $j_onfocus;?>','<?php echo $p_onfocus_p;?>','<?php echo $p_onfocus_f;?>','<?php echo $j_after_onfocus;?>');"<?php } ?> 
	<?php if( $j_onclick != '0' || $p_onclick_p != '0' || $j_after_onclick !='0' ){ ?>onclick="ctr_system_event(this,'ctr_button','<?php echo $j_onclick;?>','<?php echo $p_onclick_p;?>','<?php echo $p_onclick_f;?>','<?php echo $j_after_onclick;?>');"<?php } ?>
>
	<?php echo $label;?>
</button>
<?php if( $href != '' ){ ?></a><?php } ?>

