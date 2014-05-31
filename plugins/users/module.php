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
	protected function module_login(){
		//checking for that is logedin before
		if($this->module_is_logedin()){
			//show user profile
			//get user information
			
			return $this->view_profile('BLOCK');
		}
		else{
			//show login form in block mode
			return $this->view_login();
		}
		
	}
	
	//this function check user login data and do login proccess
	protected function module_btn_login_onclick($e){
		
		$count = cls_orm::count('users',"username = ? and password = ?", array($e['txt_username']['VALUE'],md5($e['txt_password']['VALUE'])));
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
			$user->login = $valid_id;
			cls_orm::store($user);
			//refresh page
			$e['RV']['URL'] = 'R';
		
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
		 return $this->validator->is_set('USERS_LOGIN');
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
	   * INPUT: Integer > user id | NULL for get legedin user info
	   * this function return array of user info
	   * if 
	   * OUTPUT: Array > user info | False > if user not found
	   */
	   protected function get_user_info($id = 0){
		   if($id == 0){
				//going to find logedin user info
				echo $this->validator->get_id('USERS_LOGIN');
			}
			else{
				//get info of user id
			}
	   }
	   
	  /*
	  * INPUT: ELEMENTS | NULL
	  * this function do logout proccess
	  * OUTPUT: boolean | ELEMENTS
	  */
	  public function module_logout(){
		  
	  }
	 
}
?>
