//this function set events for starting
jQuery(document).ready(function($) {
  
});

function show_loading(block_name){
	$(block_name + '_msg').html("<img class='loading_image' src='./core/ect/images/loading.gif' />");
	$(block_name).fadeTo("fast", 0.20);
}
function stop_loading(block_name){
  
	$(block_name + '_msg').html("");
	$(block_name).fadeTo("fast", 1); 
}
function show_msg(content, block_name){
	stop_loading(block_name);
        $.fn.custombox(content);
        e.preventDefault();

  
}
function close_msg(){
	
	$.fn.custombox('close');
  
}