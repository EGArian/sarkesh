	//num 0 = is registered messeage
	//num 1 = is cerect email
	//num 2 = password
	//num 3 = re password
	register_form_msg = new Array(0 ,0 ,0 ,0);


function users_login(){
  
	//first check for that user name or password not empty
	var username = $("div.users_login input#users_username").val();
	var password = $("div.users_login input#users_password").val();
	var url;
	if(username && password){
	
		 //username and password is filled
		 if ($('div.users_login input#users_remember').is(":checked")){
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
						$("div.users_login input#users_username").val("");
						$("div.users_login input#users_password").val("");
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
	    //add warrning class to textboxes
	
	  
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
  var email = $("div.users_forget input#users_email").val();
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
					onhide: function(){ $('div.users_forget input#users_email').val('');},
					buttons: [{
						  label: $btnback.text(),	       
						  action: function(dialogItself){dialogItself.close(); }		       
					}]
					});   	 
				
			}
		); 
  }
}

function users_reset_password(){
	//get value of code
	var code = $('div.users_reset input#users_reset_code').val();
	if(code){
		var url = url = "?service=1&plugin=users&action=reset_password&USERS_FORGET=" + code;
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
					onhide: function(){ $('div.users_reset input#users_reset_code').val('');},
					buttons: [{
						  label: $btnback.text(),	       
						  action: function(dialogItself){dialogItself.close(); }		       
					}]
					});   	 
				
			}
		); 
	  
	}
  
}

//this function check username
function users_is_registered_username(){
	var username = $('div.users_register input#users_username').val();
	if(username){
		var url = url = "?service=1&plugin=users&action=is_user_registered&username=" + username;
		$.get(url ,
			function(data){
				if(data != '1'){
				  window.register_form_msg[0] = data;
				  show_message('register_form');
				  //change color of textbox
				  
				}
				else{
				  window.register_form_msg[0] = null;
				  show_message('register_form');
				}
				
			}
		); 
	  
	}
}


//this function check email
function users_is_registered_email(){
	var username = $('div.users_register input#users_email').val();
	if(username){
		var url = url = "?service=1&plugin=users&action=is_email_registered&email=" + username;
		$.get(url ,
			function(data){
				if(data != '1'){
				  window.register_form_msg[1] = data;
				  show_message('register_form');
				}
				else{
				  window.register_form_msg[1] = null;
				  show_message('register_form');
				}
				
			}
		); 
	  
	}
}
  //this function send user information to server for register
function users_register(){
  //first we want to check for that is all nessasary fields filled.
   var msgs = window.register_form_msg;
   var all_ok = true;
    for(i=0; i<= msgs.length-1; i++){
	  if(msgs[i] != null){
	    all_ok = false;
	  }
    }
   if(all_ok == true){
    //send information to server
    var captcha = '0';
    if ( $( "div.users_register input#captcha_captcha" ).length ) {
    	captcha = $('div.users_register input#captcha_captcha').val(); 
    }
	var password = $('div.users_register input#users_password').val();
	var email = $("div.users_register input#users_email").val();
	var username = $('div.users_register input#users_username').val();
	var url = "?service=1&plugin=users&action=register_me&username=" + username + "&password=" + password + "&email=" + email;
	if(captcha != '0'){
		url = url + '&captcha=' + captcha;
	}
	$.get(url ,
		function(data){
			xmlDoc = $.parseXML( data ),
			$xml = $( xmlDoc ),
			$result = $xml.find( "result" );
			$type = $xml.find( "type" );
			$header = $xml.find( "header" );
			$content = $xml.find( "content" );
			$btnback = $xml.find( "btn-back" );
			BootstrapDialog.show({
				type: $type.text(),
				title: $header.text(),
				message: $content.text(),
				onhide: function(){  
				 //someting that shoud do after hide modal
				 if($result.text() == '1'){
					 window.location.href = "?plugin=users&action=login";
				 }
				 else if($result.text() == '0'){
					 window.location.href = ".?plugin=users&action=register_active";
				 }
				 else if($result.text() == '2'){
					 $('div.users_register input#captcha_captcha').val('');
				 }
				 else{
					 window.location.href = ".?plugin=users&action=register";
				 }
			},
				buttons: [{
					label: $btnback.text(),	       
					action: function(dialogItself){dialogItself.close(); }		       
				}]
			});   	 
				
		}
	); 
	  
    }   
   else{
     url = '?service=1&plugin=users&action=failfill';
     $.get(url ,
		function(data){
			xmlDoc = $.parseXML( data ),
			$xml = $( xmlDoc ),
			$result = $xml.find( "result" );
			$type = $xml.find( "type" );
			$header = $xml.find( "header" );
			$content = $xml.find( "content" );
			$btnback = $xml.find( "btn-back" );
			BootstrapDialog.show({
				type: $type.text(),
				title: $header.text(),
				message: $content.text(),
				buttons: [{
					label: $btnback.text(),	       
					action: function(dialogItself){dialogItself.close(); }		       
				}]
			});   	 
				
		}
	); 
   }
}
function users_cancel_register(){
window.location.href = "../";
}
function show_message(action){

  if(action == 'register_form'){
    var msgs = window.register_form_msg;
    var tag_msg = "";
    for(i=0; i<= msgs.length; i++){
	  if(msgs[i] != 0 && msgs[i] != null){
	    tag_msg += msgs[i];
	  }
    
    }
    $("#msg.users_register_msg").html(tag_msg);
  }
}

//this function check length of password
function users_check_password(){
	var password = $('div.users_register input#users_password').val();
	if(password.length < 9){
		var url = url = "?service=1&plugin=users&action=check_password_length&password=" + password;
		$.get(url ,
			function(data){
				if(data != '1'){
				  window.register_form_msg[2] = data;
				  show_message('register_form');
				}
				else{

				}
				
			}
		); 
	  
	}
	window.register_form_msg[2] = null;
	show_message('register_form');
	
}

//this function compare password and re password in register forms
function users_check_repassword(){
  var password = $('div.users_register input#users_password').val();
  var repassword = $('div.users_register input#users_repassword').val();
	if(password != repassword && password.length > 8){
		var url = url = "?service=1&plugin=users&action=check_password_match&password=" + password + "&repassword=" + repassword;
		$.get(url ,
			function(data){
				if(data != '1'){
				  window.register_form_msg[3] = data;
				  show_message('register_form');
				}
				else{

				}
				
			}
		); 
	  
	}
	window.register_form_msg[3] = null;
	show_message('register_form');	
}
  

