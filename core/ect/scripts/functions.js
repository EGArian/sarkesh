function show_loading(position, parent){
	$(position).html("<img class='loading_image' src='./core/ect/images/loading.gif' />");
	$(parent).fadeTo("slow", 0.20);
}
function stop_loading(position, parent){
	$(position).html("");
	$(parent).fadeTo("slow", 1); 
}