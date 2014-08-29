<?php
class users_module extends users_view{
	private $registry;
	private $settings;
	private $validator;
	function __construct(){
		
		$this->registry = new cls_registry;
		$this->settings = $this->registry->get_plugin('users');
		$this->validator = new cls_validator;
		
		parent::__construct($this->settings);

	}
	/*
	 * this function show login form for input username and password
	 * if user was logedin before return user profile
	 * form
	 */
	protected function module_login_block($pos){

		//checking for that is logedin before
		if($this->module_is_logedin()){
			//show user profile
			//get user information
			$user=$this->module_get_info();
			return $this->view_profile_block($user, $this->module_has_permission('core_admin_panel'));
		}
		else{
			//show login form in block mode
			return $this->view_login_block($pos);
		}
		
	}
	
	/*
	 * OUTPUT:HTML ELEMENTS
	 * Tis function show register form 
	 */
	 protected function module_register(){
		 if($this->module_is_logedin()){
			 header("Location:" . cls_general::create_url(array('plugin','users','action','profile')));
		 }
		 elseif($this->settings['register'] == '0'){
			 //new register was closed
			 $msg = new msg;
			 return $msg->msg('Warrning!','Register new user was closed by Administrator.','danger');
			 
		 }
		 return $this->view_register();		 
	 }
	//this function check user login data and do login proccess
	protected function module_btn_login_onclick($e){
		
		$count = cls_orm::count('users',"username = ? or email=? and password = ?", array($e['txt_username']['VALUE'],$e['txt_username']['VALUE'],md5($e['txt_password']['VALUE'])));
		if($count != 0){
			//login data is cerrect
			//set validator
			if($e['ckb_remember']['CHECKED'] == 1){
						
				$valid_id = $this->validator->set('USERS_LOGIN',true,true);
							
			}
			else{
				$valid_id = $this->validator->set('USERS_LOGIN',false,true);
							
			}
			//INSERT VALID ID IN USER ROW
			$user = cls_orm::load('users',$this->get_user_id($e['txt_username']['VALUE']));
			$user->login_key = $valid_id;
			cls_orm::store($user);
			
			//now jump or relod page
			if(isset($_GET['jump'])){
				$e['RV']['URL'] = $_GET['jump'];
			}
			else{
				//refresh page
				$e['RV']['URL'] = 'R';
			}
		}
		else{
			//username or password is incerrect
			$e['txt_username']['VALUE'] = '';
			$e['txt_password']['VALUE'] = '';
			$e['RV']['MODAL'] = cls_page::show_block(_('Message'), _('Username or Password is incerrect!'), 'MODAL','type-warning');
		}
		return $e;
	}
	
	/*
	 * this function check user loged in before or not
	 * boolean 
	 */
	 protected function module_is_logedin(){
		 if($this->validator->is_set('USERS_LOGIN')){
				$id = $this->validator->get_id('USERS_LOGIN');
				if(cls_orm::count('users','login_key = ?',array($id)) != 0){
					//user is loged in before
					return true;
				}
		 }
		 //user not loged in before
		 return false;
	 }
	 
	 /*
	  * INPUT:STRING > username | NULL > for get logedin user id
	  * this function return user id
	  * it's AI primary key
	  * OUTPUT > integer | FALSE > not found
	  */
	  protected function get_user_id($username){
		  $res = cls_orm::findOne('users',"username = ?",array($username));
		  return $res->id;
	  }
	  
	 
	  /*
	  * INPUT: ELEMENTS | NULL
	  * this function do logout proccess
	  * OUTPUT: boolean | ELEMENTS
	  */
	  protected function module_logout($e = ''){
		  $this->validator->delete('USERS_LOGIN');
		  //if this action requested by content mode jump user to home page
		  if($e == 'content'){
				cls_router::jump_page(SiteDomain);
				
		  }
		  else{
			//jump page with events controller 
			$e['RV']['URL'] = SiteDomain;
		  }
		  
		  return $e;
	  }
	  
	  /*
	   * * INPUT:STRING >permation
	   * INPUT: STRING >USERNAME | NULL >for get cerrent user
	   * this function check permission of user
	   * OUTPUT:boolean
	   */
	   protected function module_has_permission($permission,$username=''){
		   if($username == ''){
			   //get cerrent user info
			   $user = $this->module_get_info();
			   if($user == null){
				   //user is guest
				   //4 = guest primary key
				   $id = 4;
			   }
			   else{
				   //get user permission id
				   $id = $user['permission'];
			   }
			   $per = cls_orm::findOne('permissions',"id = ?", array($id));
			   if($per[$permission] == '1'){return true;}   

			   return false;
			   
		   } 
		   else{
				//get permission with username
				//check for that user exists
				
				if(cls_orm::count('users',"username = ?",array($username)) != 0){
					//going to find permission
					$res = cls_orm::getRow('SELECT * FROM users s INNER JOIN permissions p ON s.permission=p.id where s.username=?',array($username));
					
					//checking for that permission is exist
					if(array_key_exists($permission,$res)){
						if($res[$permission] == '1'){
							return true;
						}
					}
					
				}
				//user not found return false
				return false;
			}
	   }
	   
	   /*
	    * This function return reset password form
	    * OUTPUT:elements
	    */
	    protected function module_reset_password(){
			return $this->view_reset_password();
		}
		
		/*
	    * INPUT:ELEMENTS
	    * This function run with botton that's in reset password form
	    * OUTPUT:ELEMENTS
	    */
	    protected function module_btn_reset_password_onclick($e){
			
			$e['RV']['MODAL'] = cls_page::show_block(1,1,'MODAL','type-warning');
			return $e;
		}
		
		//this function return back user information
		protected function module_get_info($username = ''){
		
			//first check for that what type of user info you want
			if($username == ''){
				//you want user information that now in loged in
				if($this->is_logedin()){
					$id = $this->validator->get_id('USERS_LOGIN');
					if(cls_orm::count('users','login_key = ?',array($id)) != 0){
						return cls_orm::findOne('users','login_key = ?', array($id));
					}
				}
				else{
					//user is guest
					return null;
				}
			}
			else{
				//check for username and return back information if exists
				if(cls_orm::count('users','username = ?',array($username)) != 0){
						return cls_orm::findOne('users','login_key = ?', array($username));
				}
				else{
					//username not found
					return 0;
				}
			}
		}
	 
}
?>
