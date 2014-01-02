function show_loading(position, parent){
	$(position).html("<img class='loading_image' src='./core/ect/images/loading.gif' />");
	$(parent).fadeTo("slow", 0.20);
}
function stop_loading(position, parent){
	$(position).html("");
	$(parent).fadeTo("slow", 1); 
}
function show_msg(content){
	$.fn.custombox( content, {
		effect:         'slide',
		position:       'center',
		customClass:    'customslide',
		speed:          200
		});
	e.preventDefault();
  
}
function close_msg(){
	$.fn.custombox('close');
  
}