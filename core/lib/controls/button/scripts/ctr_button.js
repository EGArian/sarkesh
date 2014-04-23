function ctr_button_click(obj, id, j_click, p_click_p, p_click_f, j_afterclick){
	//run javascript click function
 var form = $(obj).attr('form');
  
 //Get all elements and push in array
 var options = "";
 var form_elements = [];
 $('.ca_' + form).each(function(){
	options += this.name;
	options += "<!!>value<!>";
	options += this.value;
	options += "<!>label<!>";
	options += $(this).html();	
	
 });
	if(j_click != '0'){
	  window[j_click](form_elements);
	}

	
	
	//run php click function
	if(p_click_p != '0'){
		url = "?control=1&plugin=button&action=p_click&p=" + p_click_p + "&f=" + p_click_f + "&options=" + options;
		$.get(url ,
			function(data){
				//data back from php code is stored with xml
				if(j_afterclick != '0'){
					window[j_afterclick](data);
				}
			}
		); 
	}

}