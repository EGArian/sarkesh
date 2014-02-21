<?php
class users_madule{
	private $view;
	private $io;
	private $db;
	private $validator;
	private $email;
	
	function __construct(){
		$this->view = new users_view;
		$this->io = new cls_io;
		$this->db = new cls_database;
		$this->validator = new cls_validator;
		$this->email = new cls_mail;
	}
	
	//this madule check email
	public function check_email($email = null){
		//if email wass null we get that from browser
		if($email == null){
			$email = $this->io->cin('email', 'get');
			
			if($email == '0'){
				//not set
				return false;
			}
		}
		//going to check
		$this->db->do_query('SELECT email FROM ' . TablePrefix . 'users WHERE email=?;', array($email));
		if($this->db->rows_count() != 0){
			//email is cerrent
			return true;
		}
		//not found
		return false;
	}
	

	
	//this function send back user info
	public function get_user_info($value, $parameter = 'email'){
		$this->db->do_query('SELECT * FROM ' . TablePrefix . 'users WHERE ' . $parameter . '=?;', array($value));
		return $this->db->get_first_row_array();
	}
	//WARRNING: before use this function check validator for get id
	public function reset_password($id){
		$general = new cls_general;
		//create random password
		$password = $general->random_string(10);
		//change user password
		if($this->db->do_query('UPDATE ' . TablePrefix . 'users SET password=?, forget=0 WHERE Forget=?;', array(md5($password), $id))){
			$this->validator->delete('USERS_FORGET', $id);
		}
		return $password;
	}
	public function is_registered_username($username){
		$this->db->do_query('SELECT * FROM ' . TablePrefix . 'users WHERE username =?;', array($username));
		if($this->db->rows_count() != 0){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function is_registered_email($email){
		$this->db->do_query('SELECT * FROM ' . TablePrefix . 'users WHERE email =?;', array($email));
		if($this->db->rows_count() != 0){
			return true;
		}
		else{
			return false;
		}
	}
	//this function register neew user
	// 0= user should recive email for active
	// 1= user activated automaticly
	// 2= fail in register user
	public function register($username, $password, $email){
		//first check for that email or username not registered before
		
		if($this->is_registered_email($email) == false && $this->is_registered_username($username) == false){
			//going to register new user
			//check for that active from email is enabled
			$registry = new cls_registry;
			//num 3 means not activated
			$permation_id = '3';
			if($registry->get('users', 'active_from_email') != '1'){
				$permation_id = $registry->get('users', 'default_permation');
			}
			//save user
			$this->db->do_query('INSERT INTO ' . TablePrefix . 'users (username,password,email,permation) VALUES (?,?,?,?);', array($username, md5($password), $email,$permation_id));
			//if active via email is enable going to create validator and send email
			
			if($permation_id == '3'){
			      //going to create validator
			      $validator = $this->validator->set('USERS_ACTIVE', false, false, 'both');
			      $this->db->do_query('UPDATE ' . TablePrefix . 'users SET validator=? WHERE username=?;', array($validator['id'], $username));
			      //going to send email
			      if($this->email->simple_send($username, $email, _('Register'), _('your code is:' . $validator['special_id'] ))){
					return 0;
			      }
			      return 2;
			}
			
			return 1;
		}
		return 2;
	}
	
}
?>