<input type="checkbox" name="ctr_switch_<?php echo $name;?>" onclick="ctr_switch_onclick(this,<?php echo $id;?>)" >
<script>
$.fn.bootstrapSwitch.defaults.state = '<?php echo $state;?>';
$.fn.bootstrapSwitch.defaults.onText = '<?php echo $on_text;?>';
$.fn.bootstrapSwitch.defaults.offText = '<?php echo $off_text;?>';
$.fn.bootstrapSwitch.defaults.onColor = '<?php echo $on_color;?>';
$.fn.bootstrapSwitch.defaults.offColor = '<?php echo $off_color;?>';
$.fn.bootstrapSwitch.defaults.labelText = '<?php echo $center_text;?>';
$.fn.bootstrapSwitch.defaults.size = '<?php echo $size;?>';
$("input[name='ctr_switch_<?php echo $name;?>']").on('switchChange.bootstrapSwitch', function(event, state) {
 alert(4444);
});
$("input[name='ctr_switch_<?php echo $name;?>']").bootstrapSwitch();
</script>