<?php
class users extends users_module{
	function __construct(){
		parent::__construct();
	}
	
	/*
	 * INPUT:string: position name in theme file
	 * this function return login form in blocks else content area
	 * OUTPUT:elements
	 */
	public function login_block(){

		return $this->module_login_block('block');
		
	}
	
	/*
	 * INPUT:string: position name in theme file
	 * this function return login form in blocks in content area
	 * OUTPUT:elements
	 */
	public function login(){

		return $this->module_login_block('content');
	}
	/*
	 *INPUT:string:position
	 *this function return reset password form
	 *OUTPUT:elements
	 */
	public function reset_password($position){
		if(!$this->is_logedin()){
			return $this->module_reset_password();
		}
		cls_router::jump_page(array('plugin','users','action','profile'));
	}
	/* INPUT:string: position name in theme file
	 * this function return register form
	 * OUTPUT:elements
	 */
	public function register($position){
		return $this->module_register();
	}
	
	/*
	 * INPUT:elements array
	 * this function run with btn_login onclick event
	 * OUTPUT:elements array
	 */
	public function btn_login_onclick($e){
		//if this action requested by content mode i should reject that
		if($e == 'content'){
			cls_router::jump_page(SiteDomain);
		}
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
	   * INPUT: string:username | NULL: for current user
	   * this function check for that user has access to entered permission
	   * OUTPUT: boolean
	   */
	   public function has_permission($name, $username=''){
		   return $this->module_has_permission($name,$username);
	   }
	   
	   /*
	    * INPUT:ELEMENTS
	    * This function run with button that's in reset password form
	    * OUTPUT:ELEMENTS
	    */
	    public function btn_reset_password_onclick($e){
			//if this action requested by content mode i should reject that
			if($e == 'content'){
				cls_router::jump_page(SiteDomain);
			}
			return $this->module_btn_reset_password_onclick($e);
		}
		
		/*
	    * INPUT:ELEMENTS
	    * This function run with botton that's in register form
	    * OUTPUT:ELEMENTS
	    */
	    public function btn_signup_onclick($e){
			//if this action requested by content mode i should reject that
			if($e == 'content'){
				cls_router::jump_page(SiteDomain);
			}
			
			//check input
			if( $e['txt_username']['VALUE'] == '' || $e['txt_email']['VALUE'] == '' || $e['txt_password']['VALUE'] == '' || $e['txt_repassword']['VALUE'] == '' ){
				//invalid field
				$e['RV']['MODAL'] = cls_page::show_block(_('Message'),_('Please fill out all the field that are marked with an asterisk (*).'),'MODAL','type-warning');
				return $e;
			}
			else{
				return $this->module_btn_signup_onclick($e);
			}
		}
        
        /*
         *This function return user id
         * if user be a guest this function return false
         */
         public function get_id($username = ''){
            
            //WARRNING: UNDER DEVELOPMENT
            
         }
		
		/* INPUT:string(username).if username not set this function return back information of user that now is logined in
		* if user will be guest this function return null;
		* if user not found this function return 0
	    * This function return array of user information
	    * OUTPUT:array(user information);
	    */
	    public function get_info($username = ''){
			
			return $this->module_get_info($username);
		}
}
?>
