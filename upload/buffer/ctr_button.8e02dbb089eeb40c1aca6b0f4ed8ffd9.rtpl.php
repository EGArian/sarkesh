<button type="button" value="<?php echo $value;?>" name="<?php echo $id;?>" id="<?php echo $id;?>" form="<?php echo $form;?>" class="<?php echo $type;?> <?php echo $class;?> ca_<?php echo $form;?>" style="<?php echo $styles;?>" <?php if( $disabled == 'disabled' ){ ?>disabled="disabled"<?php } ?> onclick="ctr_button_click(this,'<?php echo $id;?>','<?php echo $j_click;?>','<?php echo $p_click_p;?>','<?php echo $p_click_f;?>','<?php echo $j_afterclick;?>');"><?php echo $label;?></button>