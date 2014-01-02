function users_login(){
	
	//first check for that user name or password not empty
	var username = $("input#username").val();
	var password = $("input#password").val();
	var url;
	if(username && password){
		  //show loading
		  show_loading(".users_login_msg" , ".users_login");
		 //username and password is filled
		 if ($('input#remember').is(":checked")){
			//remember is checked
			url = "?service=1&plugin=users&action=login&username=" + username + "&password=" + password + "&remember=yes";
		 }
		 else{
			url = "?service=1&plugin=users&action=login&username=" + username + "&password=" + password;
		 }
		$.get(url ,
			function(data){
				if(data == '1'){
					//login successfull going to refresh page
					location.reload();
				}
				else{
					 //username or password is incerrect or user loged in before
					 //we get message from server for show in localize matched
					 stop_loading(".users_login_msg" , ".users_login");
					 //$("#msg.users_login_msg").html(data);
					show_msg(this);
				}
			}
		); 
		
	}
	


}
