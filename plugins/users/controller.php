<?php
class users_controller{
	private $view;
	private $madule;
	//------------------------------------
	private $obj_validator;

	function __construct($view, $madule){
		$this->view = $view;
		$this->madule = $madule;


	}
	
	public function action($action_name){

		if($action_name == 'login'){
			if($this->is_logedin()){
				//show user static
			
			}
			else{
				//going to show login page
				$this->view->show_login_page();
			}
		}
		elseif($action_name == 'do_login'){
			if(isset($POST['username']) && isset($POST['password'])){
				//start login progress
			}
			else{
				//show login page
				$this->view->show_login_page();
			}
		}
		elseif($action_name == 'logout'){
			//start log out proccess
			$this->logout();
		}
		elseif($action_name == 'register'){
			if($this->is_logedin()){
				//jump to user profile
				$this->view->show_profile_page();
			}
			else{
				//show register page
				$this->view->show_register_page();
			}
		}
		

	}
	
	//this function search for that user is loged in before
	//with check validator with USER_LOGIN source
	public function is_logedin(){
		//first create validator class
		return false;
		return $this->obj_validator->is_set('USER_LOGIN');
	}
	
	//this function do users logout proccess
	public function logout(){
		$this->obj_validator->delete('USER_LOGIN');
	}


}
?>