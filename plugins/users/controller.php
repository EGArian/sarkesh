<?php
class users_controller{
	private $view;
	private $madule;
	//------------------------------------
	private $obj_validator;
	private $db;
	private $io;

	function __construct($view, $madule){
		$this->view = $view;
		$this->madule = $madule;
		$this->db = new cls_database;
		//$this->obj_validator = new cls_validator;
		$this->io = new cls_io;
	}
	
	public function action($action_name, $view = 'BLOCK'){

		if($action_name == 'login'){
			if($this->is_logedin()){
				//show user static
			}
			elseif(isset($_GET['username']) && isset($_GET['password'])){
				//start login progress
				$this->db->do_query('SELECT * FROM ' . TablePrefix . 'users WHERE username=? AND password=?;', array($this->io->cin('username', 'get'),md5($this->io->cin('password', 'get'))));
				if($this->db->rows_count() != 0){
					//username is cerrect
				}
			}
			else{
				//going to show login page
				$this->view->show_login_page($view);
				
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
	
	//service do not has any user interface
	//it just return xml document
	public function service($service_name){
		if($service_name == 'check_login'){
			//checking user entered username and password
			//if cerrect do_login and else return negative 
			//	0 -> entered before
			//	1 ->username and password was cerrect user loged in 
			//	-1 ->username or password was incerrect
			if($this->is_logedin()){
				//user is entered before
				return 0;
			}
			elseif(isset($_GET['username']) && isset($_GET['password'])){
				//start login progress
				$this->db->do_query('SELECT * FROM ' . TablePrefix . 'users WHERE username=? AND password=?;', array($this->io->cin('username', 'get'),md5($this->io->cin('password', 'get'))));
				if($this->db->rows_count() != 0){
					//username is cerrect going to set validator
					
					
					return 1;
				}
				else{
					//username or password is incerrect
					return -1;
				}
			}
			else{
				//what do you want to do ? 
				// you send nothing for me to proccess that. so  i return -1 for you
				return -1;
				
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