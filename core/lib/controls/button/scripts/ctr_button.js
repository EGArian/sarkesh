function ctr_button_click(obj, id, j_click, p_click_p, p_click_f, j_afterclick){
	//run javascript click function
 var form = $(obj).attr('form');
  
 //Get all elements and push in array
 var options = "";
 var backed_elements = [];
 var form_elements = [];
 $('.ca_' + form).each(function(){
	 //add element for store
	 form_elements.push(this);
	 //start control tag
	options += "control";
	options += "<!!>name<!>";
	options += this.name;
	options += "<!>value<!>";
	options += this.value;
	options += "<!>label<!>";
	options += $(this).html();	

 });
	//if(j_click != '0'){
	//  window[j_click](form_elements);
	//}
	
	//run php click function
	if(p_click_p != '0'){
		url = "?control=1&plugin=button&action=p_click&p=" + p_click_p + "&f=" + p_click_f + "&options=" + options;
		$.get(url ,
			function(data){
				//find deference and set that
				var a = 0;
				$(data).find("control").children().each(function(){
					//check defernece
					if(this.tagName.toLowerCase() == "label"){
						$(form_elements[a]).html($(this).html().toLowerCase().trim());
					}
					else{
						if(form_elements[a][this.tagName.toLowerCase()].toLowerCase().trim() != $(this).html().toLowerCase().trim()){
							$(this).attr(this.tagName.toLowerCase(), $(this).html().toLowerCase().trim());
						}
						
					}
					//a = a+1;
				});
				
				//data back from php code is stored with xml
				//get xml and create object of that
				//if(j_afterclick != '0'){
				//	window[j_afterclick](data);
				//}
			}
		); 
	}

}
