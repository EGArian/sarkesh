<?php
class users_controller{
	private $view;
	private $madule;
	//------------------------------------
	private $obj_validator;
	private $db;
	private $io;
	private $service_result;
	function __construct($view, $madule){
		$this->view = $view;
		$this->madule = $madule;
		$this->db = new cls_database;
		$this->obj_validator = new cls_validator;
		$this->io = new cls_io;
	}
	// $view has to value 1- 'block' for show with block header
	// 		2-content for show with orginal state
	public function action($action_name, $view = 'BLOCK'){

		if($action_name == 'login'){
			
			if($this->is_logedin()){
				//show user static
				return $this->view->show_user_page($view);

			}
			else{
				//going to show login page
				return $this->view->show_login_page($view);
			}
			
		}
		elseif($action_name == 'register'){
			if($this->is_logedin()){
				//jump to user profile
				return $this->view->show_user_page($view);
			}
			else{
				//show register page
				return $this->view->show_register_page($view);
			}
		}
		elseif($action_name == 'forget_password'){
			if(!$this->is_logedin()){
				//show register page
				return $this->view->show_forget_password_page($view);
			}
			
		}
		elseif($action_name == 'reset_password'){
			if(!$this->is_logedin()){
				//show register page
				return $this->view->show_reset_password_page($view);
			}
			
		}
		

	}
	
	//service do not has any user interface
	//it just return text
	public function service($service_name){
		if($service_name == 'login'){
			//checking user entered username and password
			//if cerrect do_login and else return negative 
			//1 ->username and password was cerrect user loged in 
			if($this->is_logedin()){
				//user is logedin before
				$this->view->show_in_box(_('Message'), _('You loged in with defferent acount before! first logout.') ,true);
			}
			elseif(isset($_GET['username']) && isset($_GET['password'])){
				//start login progress
				$this->db->do_query('SELECT * FROM ' . TablePrefix . 'users WHERE username=? AND password=?;', array($this->io->cin('username', 'get'),md5($this->io->cin('password', 'get'))));
				if($this->db->rows_count() != 0){
				
					//username is cerrect going to set validator
					if(isset($_GET['remember'])){
					
						$valid_id = $this->obj_validator->set('USERS_LOGIN',true,true);
						
					}
					else{
						$valid_id = $this->obj_validator->set('USERS_LOGIN',false,true);
						
					}
					$this->db->do_query('UPDATE ' . TablePrefix . 'users SET validator=? WHERE username=?;', array($valid_id, $this->io->cin('username', 'get')));
					$this->service_result = 1;
				}
				else{
					//username or password is incerrect
					$this->view->show_in_box(_('Message'),  _('Username or Password is incerrect!'));
				}
			}
			else{
				//what do you want to do ? 
				// you send nothing for me to proccess that. so  i return -1 for you
				$this->view->show_in_box(_('Message'), _('Your request can not be prossed! try again later.'));
				
			}
		}
		//logout from system
		elseif($service_name == 'logout'){
			if($this->is_logedin()){
				//start logout proccess
				$this->logout();
				$this->service_result = "1";
			}
			else{
				$this->view->show_in_box(_('Message'),  _('Problem in log out! try again later'));
			}
		
		}
		elseif($service_name == 'get_forget_panel'){
			//this function return forget password panel
				$this->view->show_in_box(_('Message'),  _('Username or Password is incerrect!'));
		}
		elseif($service_name == 'send_forget_email'){
			if(!$this->madule->check_email()){
				//email not found
				$this->view->show_in_box(_('Message'),  _('you was not regestered with this email.') ,'warning');
			}
			else{
				
					$email = $this->io->cin('email', 'get');
					$result = $this->obj_validator->set('USERS_FORGET',false, false,'all');
					//save validator in user table
					$this->db->do_query('UPDATE ' . TablePrefix . 'users SET forget=? WHERE email=?;', array(trim($result['id']),$email));
					//get user informations
					$user = $this->madule->get_user_info($email);
					//send forget email
					$mail = new cls_mail;
					
					if($mail->simple_send($user['username'], $user['email'] , 'forget_password_subject' , "your code is: " . $result['special_id']) ){
						//show success message
						$this->view->show_in_box(_('Message'),  _('Check your email for more informations.'), 'success' );
					}	
					else{
						$this->view->show_in_box(_('Message'),  _('Error in sending email . please tell admins!'), 'danger' );
					  
					}
				
			}
		}
		elseif($service_name == 'reset_password'){
			//first check for that code is send with get
			if(isset($_GET['USERS_FORGET'])){
				//GOING TO CHECK
			
				if($this->obj_validator->is_set('USERS_FORGET')){
				
					$reset_id = $this->obj_validator->get_id('USERS_FORGET');
					if($reset_id == '0' || $reset_id == ''){
						$this->view->show_in_box(_('Message'),  _('Your entered code is invalid.'), 'warning' );
					}
					else{
						$user = $this->madule->get_user_info($reset_id, 'forget');
						$password = $this->madule->reset_password($reset_id);
						//reset password successfull going to send reset email
						$mail = new cls_mail;
						if($mail->simple_send($user['username'], $user['email'] , 'reset_password_subject' , "your password is: $password")){
							//show success message
							$this->view->show_in_box(_('Message'),  _('Your password changed! look at your email.'), 'success' );
						}	
						else{
							$this->view->show_in_box(_('Message'),  _('Error in sending email . please tell admins!'), 'danger' );
						}
					}
				}
				else{
					//invalid code
					$this->view->show_in_box(_('Message'),  _('Your entered code is invalid.'), 'warning' );
				}
			}
		
		

		}
		//this function check for that is username is exist before
		elseif($service_name == 'is_user_registered'){
			if(isset($_GET['username'])){
				$username = $this->io->cin('username', 'get');
				if($this->madule->is_registered_username($username)){
					//not registered going to show msg
					$this->view->show_message(_('Username:'), _('This username is not available.'), 'danger');
				}
				else{
					$this->service_result = '1';
				}
			}
		
		}
		// this function check that email is exist before
		elseif($service_name == 'is_email_registered'){
			if(isset($_GET['email'])){
				$email = $this->io->cin('email', 'get');
				if($this->madule->is_registered_email($email)){
					//not registered going to show msg
					$this->view->show_message(_('Email:'), _('This email is not available.'), 'danger');
				}
				else{
					$this->service_result = '1';
				}
			}
		
		}
		//this function check password length .it's should be more than 8 characters
		elseif($service_name == 'check_password_length'){
			if(isset($_GET['password'])){
				$password = $this->io->cin('password', 'get');
				if(strlen($password) < 8){
					//not registered going to show msg
					$this->view->show_message(_('Password:'), _('Your password must be between 8 and 32 characters long.'), 'danger');
				}
				else{
					$this->service_result = '1';
				}
			}
		
		}
		//this function compare password and repassword 
		elseif($service_name == 'check_password_match'){
			if(isset($_GET['password']) && isset($_GET['repassword'])){
				$password = $this->io->cin('password', 'get');
				$repassword = $this->io->cin('repassword', 'get');
				if(strcmp($password, $repassword) != 0){
					$this->view->show_message(_('Password:'), _('Your entered passwords are not match!'), 'danger');
				}
				else{
					$this->service_result = '1';
				}
			}
		
		}
		//this function is for register user 
		elseif($service_name == 'register_me'){
			if(isset($_GET['username']) && isset($_GET['email']) && isset($_GET['password']) && isset($_GET['captcha'])){
				$username = $this->io->cin('username', 'get');
				$email = $this->io->cin('email', 'get');
				$password = $this->io->cin('password', 'get');
				$captcha = $this->io->cin('captcha', 'get');
				
				//check data
				
				//going to save
			}
		
		}
		
		
		echo $this->service_result;
	
	}
	
	//this function search for that user is loged in before
	//with check validator with USERS_LOGIN source
	public function is_logedin(){
		//first create validator class
		$c = new cls_validator;
		return $this->obj_validator->is_set('USERS_LOGIN');
	}
	
	//this function do users logout proccess
	public function logout(){
		$this->obj_validator->delete('USERS_LOGIN');
	}
	



}
?>