function ctr_button_click(obj, id, j_click, p_click_p, p_click_f, j_afterclick){
	//run javascript click function
 var form = $(obj).attr('form');
 var form_elements = [];
 //Get all elements and push in array
 $('.ca_' + form).each(function(){
 	form_elements.push(this);
 });
	if(j_click != '0'){
	  window[j_click](obj);
	}
	
	//run php click function
	if(p_click_p != '0'){
		url = "?control=1&plugin=button&action=p_click&p=" + p_click_p + "&f=" + p_click_f + "&options=" + options;
		$.get(url ,
			function(data){
				if(j_afterclick != '0'){
					window[j_afterclick](data);
				}
			}
		); 
	}
}