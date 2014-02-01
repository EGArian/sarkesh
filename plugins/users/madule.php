<?php
class users_madule{
	private $view;
	private $io;
	private $db;
	private $validator;
	private $mail;
	
	function __construct($view){
		$this->view = $view;
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
	
}
?>