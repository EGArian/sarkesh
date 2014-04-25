<?php
class users_controller{
	private $view;
	private $module;
	//------------------------------------
	
	private $obj_validator;
	private $db;
	private $io;
	private $service_result;
	private $plg_email;
	private $registry;
	private $msg;
	function __construct(){
		$this->registry = new cls_registry;
		$plugin = new cls_plugin;
		$this->view = new users_view;
		$this->module = new users_module;
		$this->db = new cls_database;
		$this->obj_validator = new cls_validator;
		$this->io = new cls_io;
		$this->msg = new msg_controller;
		
		//define plugins
		
		$this->plg_email = new email_view;

	}
	// $view has to value 1- 'block' for show with block header
	// 2-content for show with orginal state
	
	public function action($action_name, $view = 'BLOCK',$position, $show){
		if($action_name == 'login'){
			
			if($this->is_logedin()){
				//show user static
				return $this->module->show_user_page($view);

			}
			else{
				//going to show login page
				
				return $this->view->show_login_page($view,$show);
			}
			
		}
		//warning: this part do not check for user register access
		
		elseif($action_name == 'register'){
			if($this->is_logedin()){
				//jump to user profile
				
				return $this->module->show_user_page($view);
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
		elseif($action_name == 'register_active'){
			if(!$this->is_logedin()){
				//show register page
				
				return $this->view->show_register_active_page($view);
			}
			
		}
		//this part show login page without any check for that user is loged in before or not
		
		elseif($action_name == 'login_panel'){
			return $this->view->show_login_page($view, $show);
			
		}
		elseif($action_name == 'default_core_page'){
			if($this->module->has_permission('core_admin_panel')){
				//show register page
				
				return $this->view->show_default_core_page($view,$show);
			}
			
		}
		elseif($action_name == 'test'){
			
			$a = new ctr_button();
			$a->configure('STYLE','color:blue;');
			$a->configure('TYPE','none');
			$a->configure('J_ONCLICK_SRC','<script src="./plugins/hello/hello.js"></script>');
			$a->configure('J_ONCLICK_FUNCTION','test');
			$a->configure('P_ONCLICK_PLUGIN','hello');
			$a->configure('P_ONCLICK_FUNCTION','test');
			$a->configure('J_AFTERCLICK_SRC','<script src="./plugins/hello/hello.js"></script>');
			$a->configure('J_AFTERCLICK_FUNCTION','test1');
			echo '<form name="DEFAULT_FORM_NAME" id="DEFAULT_FORM_NAME"><input type="button">';
			echo $a->draw();
			echo '</form>';
		}
		
		else{
			//not found
			
			return $this->msg->action(404,$view,false);
		}
		

	}
	
	//service do not has any user interface
	//it just return text
	
	public function service($service_name){
		if($service_name == 'login'){
			/*checking user entered username and password
			*if cerrect do_login and else return negative 
			*1->username and password was cerrect user loged in 
			*/
			if($this->is_logedin()){
				//user is loged in before
				
				$this->view->show_in_box(_('Message'), _('You loged in with defferent account before! first logout.'));
				return false;
			}
			elseif(isset($_GET['username']) && isset($_GET['password'])){
				//start login progress
				
				$this->db->do_query('SELECT * FROM users WHERE username=? AND password=?;', array($this->io->cin('username', 'get'),md5($this->io->cin('password', 'get'))));
				if($this->db->rows_count() != 0){
					//check user permission
					
					$result = $this->db->get_first_row_array();
					$this->db->do_query('SELECT * From permissions where id=?;', array($result['permission']));
					$permission = $this->db->get_first_row_array();
					//check user permission ->enable
					
					if($permission['enable'] == '1'){
						//username is cerrect going to set validator
						
						if(isset($_GET['remember'])){
						
							$valid_id = $this->obj_validator->set('USERS_LOGIN',true,true);
							
						}
						else{
							$valid_id = $this->obj_validator->set('USERS_LOGIN',false,true);
							
						}
						$this->db->do_query('UPDATE users SET validator=? WHERE username=?;', array($valid_id, $this->io->cin('username', 'get')));
						$this->service_result = 1;
					}
					else{
						//user do not has permission
						
						$this->view->show_in_box(_('Message'), _('Your account not active! you can recive new active request from email.') ,true);
					}
				}
				else{
					//username or password is incerrect
					
					$this->view->show_in_box(_('Message'),  _('Username or Password is incerrect!'));
				}
			}
			else{
				//what do you want to do ? 
				// you send nothing for me to process that. so  i return -1 for you
				
				$this->view->show_in_box(_('Message'), _('Your request can not be prossed! try again later.'));
				
			}
		}
		//logout from system
		
		elseif($service_name == 'logout'){
			if($this->is_logedin()){
				//start logout process
				
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
			if(!$this->module->check_email()){
				//email not found
				
				$this->view->show_in_box(_('Message'),  _('you was not regestered with this email.') ,'warning');
			}
			else{
				
					$email = $this->io->cin('email', 'get');
					$result = $this->obj_validator->set('USERS_FORGET',false, false,'all');
					//save validator in user table
					
					$this->db->do_query('UPDATE users SET forget=? WHERE email=?;', array(trim($result['id']),$email));
					//get user informations
					
					$user = $this->module->get_user_info($email);
					//send forget email
					
					$mail = new cls_mail;
					$email_content = $this->plg_email->add_template(_('your code is:%' . $result['special_id']), _('Reset Code'));
					if($mail->simple_send($user['username'], $user['email'] , 'Reset Code' , $email_content) ){
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
						$user = $this->module->get_user_info($reset_id, 'forget');
						$password = $this->module->reset_password($reset_id);
						//reset password successful going to send reset email
						
						$mail = new cls_mail;
						$email_content = $this->plg_email->add_template(_('your password is:%' . $password), _('Reset Password'));
						if($mail->simple_send($user['username'], $user['email'] , _('Reset Password') , $email_content)){
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
				if($this->module->is_registered_username($username)){
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
				if(!preg_match("/^[a-z0-9_\-+\.]+@([a-z0-9\-+]+\.)+[a-z]{2,5}$/i", $email)){
					$this->view->show_message(_('Email:'), _('Email Patern is not cerrect'), 'danger');

				}
				else{
					if($this->module->is_registered_email($email)){
						//not registered going to show msg
						
						$this->view->show_message(_('Email:'), _('This email is not available.'), 'danger');
					}
					else{
						$this->service_result = '1';
					}
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
		//this function compare password and re password 
		
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
			if(isset($_GET['username']) && isset($_GET['email']) && isset($_GET['password'])){
				$username = $this->io->cin('username', 'get');
				$email = $this->io->cin('email', 'get');
				$password = $this->io->cin('password', 'get');
				$captcha_enable = $this->registry->get('users', 'register_captcha');
				$captcha_result = true;
				$captcha = new captcha_module;
				if($captcha_enable == 1){
					$captcha_value = $this->io->cin('captcha', 'get');
					$captcha_result = $captcha->solve($captcha_value);
				}
				if($captcha_result){
					//warrning: email patern not checked
					
					$result = $this->module->register($username, $password, $email);
					if($result == 0){
						//user should get email to active his/her account
						
						$this->view->show_in_box(_('Register'), _('Check your email for active your account'), 'success', 0);
					}
					elseif($result == 1){
						//user is active without email
						
						$this->view->show_in_box(_('Register'), _('You can login to your account with your login info.'), 'success', 1 );
					
					}
					else{
						$this->view->show_in_box(_('Register'), _('Error in registering . please try again later!'), 'danger', 3);
					}
					}
					else{
						$this->view->show_in_box(_('Register'), _('Your entered captcha is not cerrect!!'), 'warning', 2);
					}
				
				}
				else{
					
				}
		}
		//this part just return message for show to user :you should fill all nessecary fields
		
		elseif($service_name == 'failfill'){
			$this->view->show_in_box(_('Message'), _('Please fill all fields that marked with *.'), 'warning', 1 );
		}
		echo $this->service_result;
	}
	
	//this function search for that user is loged in before
	//with check validator with USERS_LOGIN source
	
	public function is_logedin(){
		//first create validator class
		
		return $this->obj_validator->is_set('USERS_LOGIN');
	}
	
	//this function do users logout process
	
	public function logout(){
		$this->obj_validator->delete('USERS_LOGIN');
	}
}
?>
