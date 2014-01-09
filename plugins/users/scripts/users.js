function users_login(){
	
	//first check for that user name or password not empty
	var username = $("input#username").val();
	var password = $("input#password").val();
	var url;
	if(username && password){
	
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
					  xmlDoc = $.parseXML( data ),
					  $xml = $( xmlDoc ),
					  $header = $xml.find( "header" );
					  $content = $xml.find( "content" );
					  $btnback = $xml.find( "btn-back" );
					  BootstrapDialog.show({
					  type: BootstrapDialog.TYPE_WARNING,
					  title: $header.text(),
					  message: $content.text(),
					  onshow: function(){
						$("input#username").val("");
						$("input#password").val("");
					  },
					  buttons: [{
					      label: $btnback.text(),	       
					      action: function(dialogItself){dialogItself.close(); }		       
					      }]
					  });     



				}
			}
		); 
		
	}
	else{
	    //username or password not filled
	  
	}
	


}

function users_logout(){
	var url = url = "?service=1&plugin=users&action=logout";
	$.get(url ,
		function(data){
			//if recive 1 that mean log out successfull else show msg
			if(data == '1'){
				//logout successfull going to refresh page
				location.reload();
			}
			else{
				//problem in logout
				 xmlDoc = $.parseXML( data ),
				$xml = $( xmlDoc ),
				$header = $xml.find( "header" );
				$content = $xml.find( "content" );
				$btnback = $xml.find( "btn-back" );
				BootstrapDialog.show({
				type: BootstrapDialog.TYPE_WARNING,
				title: $header.text(),
				message: $content.text(),

				buttons: [{
					  label: $btnback.text(),	       
					  action: function(dialogItself){dialogItself.close(); }		       
				}]
				});   	 
			}
		}
	); 
}

//this function check user forget password and show result
function users_forget_password(){
  var email = $("input#users_email").val();
  if(email){
	  var url = url = "?service=1&plugin=users&action=send_forget_email&email=" + email;
		$.get(url ,
			function(data){

					//problem in logout
					xmlDoc = $.parseXML( data ),
					$xml = $( xmlDoc ),
					$type = $xml.find( "type" );
					$header = $xml.find( "header" );
					$content = $xml.find( "content" );
					$btnback = $xml.find( "btn-back" );
					BootstrapDialog.show({
					type: $type.text(),
					title: $header.text(),
					message: $content.text(),
					onhide: function(){ $('input#users_email').val('');},
					buttons: [{
						  label: $btnback.text(),	       
						  action: function(dialogItself){dialogItself.close(); }		       
					}]
					});   	 
				
			}
		); 
  }
}
