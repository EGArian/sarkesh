function SystemRunEvent(obj,type ,j_before, p_events_p, p_event_f, j_after){
	 //Get all elements and push in array
	 var options = SystemGetFormString(obj);
	 var form_elements = SystemGetFormArray(obj);
	 SystemEventsHandle(type,j_before, p_events_p, p_event_f,j_after,form_elements,options);
}
function ctr_system_event(obj,type, j_before, p_events_p, p_event_f, j_after){ 
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
		//seperate controls
		if(this.type == 'select-one'){
			options += "<!>selected<!>";
			options += this.value;
			options += "<!!>";
		}
		else{
			
			options += "<!>value<!>";
			options += this.value;
			options += "<!>label<!>";
			options += $(this).html();	
			options += "<!!>";
		}
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
	  window[j_before](form_elements);
	}
	//run php click function

	if(p_event_p != '0'){
		url = "?control=1&plugin=" + p_event_p + "&action=" + p_event_f + "&options=" + options;
		url = encodeURI(url);
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
						else if(this.tagName.toLowerCase() == "selected"){
							//it's from element like SELECT tag
							
							//It's under development
							
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
					var RV = $(data).find("RV").children("value").html();
					window[j_after](RV.replace(/&lt;/g,'<').replace(/&gt;/g,'>').replace(/&amp;/g,'&'));
				}
				
			}
		); 
	}
}
