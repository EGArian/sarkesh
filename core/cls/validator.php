<?php
#REQ = DATABASE , COOKIE , SESSION , GENERAL
#this class is for auth user and ect
class cls_validator{
private $db;
private $obj_cookie;
private $obj_session;
private $obj_general;
private $settings;

	function __construct(){
		$this->obj_general = new cls_general;
		$this->obj_session = new cls_session;
		$this->obj_cookie = new cls_cookie;
		$this->db= new cls_database;
		$this->db->do_query("select * from " . TablePrefix . "settings;");
		$settings=$this->db->get_first_row_array();
		$last_check_refresh = $this->settings['validator_max_time'] + $this->settings['validator_last_check'];
		//we use this for save in database;
		
		if($last_check_refresh < time()){
			#refresh database for delete old validator keys
			$this->refresh();
		}
	}
	//this function set validator with source and save that in cookie and session
	public function set( $source,$cookie = false){
		//check for that is this source saved before
		if(!$this->is_set($source)){	
			//not set before now we want to save that
			//first create random spicial_id
			$spicial_id=$this->obj_general->random_string();
			//save source in session
			$this->obj_session->set($source,$spicial_id);
			//set in cookie
			if ($cookie){
				$this->obj_cookie->set($source , $spicial_id);
			}
			//save source in database
		
			$this->db->do_query('INSERT INTO ' . TablePrefix . 'validator (source,valid_time,spicial_id) VALUES (?,?,?);' , array($source,time() + $this->settings['validator_max_time'], $spicial_id));
			}
	}
	//this function check for that is source validated before
	public function is_set($source){
	
		$id = $this->get_id($source);
		if($id == '0'){
			//we found nothing from cookie and session
			return false;
		}
		//now we want to check spicial id with database
		$this->db->do_query("SELECT * FROM " . TablePrefix . " validator WHERE spicial_id=?;" ,array($id));
		if($this->db->rows_count() != 0){
			//source is validated
			$this->update($id);
			return true;
		}
		//source is not valid 
		return false;
	}
	//this function get spicial id from user client
	public function get_id($source){
		$id = 0;
		// first we want to check source from session
		$id = $this->obj_session->get($source);
		if($id != '0'){ return $id;}
		//then check cookie
		//if session was present we don't check cookie
		$id = $this->obj_cookie->get($source);
		return $id;
	}
	//this function update source
	private function update($spicial_id){
		$this->db->do_query('UPDATE ' . TablePrefix .' validator SET valid_time=? WHERE spicial_id=?;', array(time() + 3600 , $spicial_id)); 
		return true;
	}
	//this function refresh and delete invalid validator keys that stored in database
	private function refresh(){
		#clear old data from database
		$this->db->do_query("delete from " . TablePrefix . "validator where valid_time<?;", array(time()));
		#update next check for refresh database
		$this->db->do_query("update " . TablePrefix . "settings set validator_last_check=?;", array(time()));
	}
	#END CLASS
	}
	

?>