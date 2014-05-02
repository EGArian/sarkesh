function SystemRunEvent(obj,type ,j_before, p_events_p, p_event_f, j_after){
	 //Get all elements and push in array
	 var options = SystemGetFormString(obj);
	 var form_elements = SystemGetFormArray(obj);
	 SystemEventsHandle(type,j_before, p_events_p, p_event_f,j_after,form_elements,options);
}
function ctr_system_click(obj,type, j_before, p_events_p, p_event_f, j_after){ 
	 SystemRunEvent(obj,type, j_before, p_events_p, p_event_f, j_after);
}

//this function handle gotfocus event
function ctr_system_got_focus(obj,type, j_before, p_events_p, p_event_f, j_after){
	 SystemRunEvent(obj,type, j_before, p_events_p, p_event_f, j_after);
}

//this function handle lostfocus event
function ctr_system_lost_focus(obj,type, j_before, p_events_p, p_event_f, j_after){
	 SystemRunEvent(obj,type, j_before, p_events_p, p_event_f, j_after);
}

//this function return form in string
//obj is an element for input
function SystemGetFormString(obj){
	 //run javascript click function
	 var form = $(obj).attr('form');
	  
	 //Get all elements and push in array
	 var options = "";
	 $('.ca_' + form).each(function(){
		 //start control tag
		options += "control";
		options += "<!!>name<!>";
		options += this.name;
		options += "<!>value<!>";
		options += this.value;
		options += "<!>label<!>";
		options += $(this).html();	
		options += "<!!>";
	 });
	//create return element
	options += "control";
	options += "<!!>name<!>RV<!>value<!>0";
	return options;
}

//this function return all form to array
function SystemGetFormArray(obj){
	 //run javascript click function
	 var form = $(obj).attr('form');
	  
	 //Get all elements and push in array
	 var form_elements = [];
	 $('.ca_' + form).each(function(){
		 //add element for store
		 form_elements.push(this);
	 });
	return form_elements;
}

//this function handle javascript and php events
function SystemEventsHandle(ctr_type,j_before,p_event_p, p_event_f,j_after,form_elements,options){
	
	if(j_before != '0'){
	  window[j_click](form_elements);
	}
	//run php click function

	if(p_event_p != '0'){
		url = "?control=1&plugin=" + ctr_type + "&action=p_click&p=" + p_event_p + "&f=" + p_event_f + "&options=" + options;
		
		$.get(url ,
			function(data){
				//find deference and set that
				window['Counter'] = 0;
				$(form_elements).each(function(){
				
					$(data).find($(this).attr("id")).children().each(function(){
						//check defernece
						if(this.tagName.toLowerCase() == "label"){
							$(form_elements[window['Counter']]).html($(this).html().trim());
						}
						else{
							if(form_elements[window['Counter']][this.tagName.toLowerCase()].toLowerCase().trim() != $(this).html().toLowerCase().trim()){
								$(form_elements[window['Counter']]).attr(this.tagName.toLowerCase(), $(this).html().toLowerCase().trim());
									
							}
						}
									
						
					});
					window['Counter'] ++;
				});
				//control is afterclick input value
				//data back from php code is stored with xml
				//get xml and create object of that
				if(j_after != '0'){
					window[j_after]($(data).find("RV").children("value").html());
				}
				
			}
		); 
	}
}
