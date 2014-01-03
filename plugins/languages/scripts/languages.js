//this function send service to page and if get 1 .relode page and not , show message.
function languages_change(){
	var language_code = $('select.languages_selector :selected').val();
	var url = '?service=1&plugin=languages&action=change&lang=' + language_code;

	$.get(url ,
		function(data){
		  if(data == '1'){
					//login successfull going to refresh page
					location.reload();
				}
				else{
					 //username or password is incerrect or user loged in before
					 //we get message from server for show in localize matched
					 
					 show_msg(this ,'.users_login');

					 
				}
		}
	);
  
}