<?php
class users extends users_module{
	function __construct(){
		parent::__construct();
	}
	
	/*
	 * INPUT:string: position name in theme file
	 * this function return login form
	 * OUTPUT:elements
	 */
	public function login_block($position){

		if($position != 'content'){
			return $this->module_login_block();
		}
	}
	
	/*
	 * INPUT:string: position name in theme file
	 * this function return register form
	 * OUTPUT:elements
	 */
	public function register($position){
		//WARRNING : UNDER DEVELOPMENT
		return array(2,2);
	}
	
	/*
	 * INPUT:elements array
	 * this function run with btn_login onclick event
	 * OUTPUT:elements array
	 */
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
	 * 
	 * this function check user loged in before or not
	 * OUTPUT: boolean 
	 */
	 public function is_logedin(){
		 return $this->module_is_logedin();
	 }
	 
	 /*
	  * INPUT: ELEMENTS | NULL
	  * this function do logout proccess
	  * OUTPUT: boolean | ELEMENTS
	  */
	  public function btn_logout_onclick($e = ''){
		  return $this->module_logout($e);
	  }
	  
	  /*
	   * INPUT: string : permission name
	   * INPUT: string:username | NULL: for cerrent user
	   * this function check for that user has access to entered permission
	   * OUTPUT: boolean
	   */
	   public function has_permission($name, $username=''){
		   return $this->module_has_permission($name,$username);
	   }
}
?>
