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
	public function get_user_info($email){
		$this->db->do_query('SELECT * FROM ' . TablePrefix . 'users WHERE email=?;', array($email));
		return $this->db->get_first_row_array();
	}

}
?>