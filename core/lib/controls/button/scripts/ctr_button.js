function ctr_button_click(obj, id, j_click, p_click_p, p_click_f, j_afterclick){
	//run javascript click function
 
	if(j_click != '0'){
	  window[j_click]();
	}
	
	//run php click function
	if(p_click_f =! '0' && p_click_p != '0'){
		url = "?control=1&plugin=button&action=p_click&p=" + p_click_p + "&f=" + p_click_f;
		$.get(url ,
			function(data){
				if(j_afterclick != '0'){
					window[j_afterclick](data);
				}
			}
		); 
	}
}