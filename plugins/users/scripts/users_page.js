function users_logout(){
  		  //show loading
		  show_loading(".users_page_msg" , ".users_page");
	var url = url = "?service=1&plugin=users&action=logout";
	$.get(url ,
		function(data){
			//if recive 1 that mean log out successfull else show msg
			if(data == '1'){
				//logout successfull going to refresh page
				location.reload();
			}
			else{
				 //username or password is incerrect or user loged in before
				 //we get message from server for show in localize matched
				 stop_loading(".users_page_msg" , ".users_page");
				 $("#msg.users_page_msg").html(data);
			}
		}
	); 
}