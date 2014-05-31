<?php
class users extends users_module{
	function __construct(){
		parent::__construct();
	}
	
	//this function return login form
	public function login(){
		return $this->module_login();
	}
	
	//this function show register form
	public function register(){
		return array(2,2);
	}
	
	//this function in ligin button onclick event
	public function btn_login_onclick($e){
		//first check for that username and password is filled
		if(trim($e['txt_username']['VALUE']) == '' || trim($e['txt_password']['VALUE'])==''){
			$e['RV']['MODAL'] = cls_page::show_block(_('Message'),_('Please fill in all of the required fields"'),'MODAL','type-warning');
			return $e;
		}
		else{
			//handle request to module
			return $this->module_btn_login_onclick($e);
		}
		
	}
	
	 /*
	 * this function check user loged in before or not
	 * boolean 
	 */
	 public function is_logedin(){
		 return $this->module_is_logedin();
	 }
	 
	 /*
	  * INPUT: ELEMENTS | NULL
	  * this function do logout proccess
	  * OUTPUT: boolean | ELEMENTS
	  */
	  public function logout($e == ''){
		  return $this->module_logout();
	  }
}
?>
