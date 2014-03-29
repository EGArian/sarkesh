<?php
#REQ = DATABASE , COOKIE , SESSION , GENERAL
#this class is for auth user and ect
class cls_validator{
private $db;
private $obj_cookie;
private $obj_session;
private $obj_general;
private $obj_io;
private $settings;
private $obj_registry;

	function __construct(){
		$this->obj_io = new cls_io;
		$this->obj_general = new cls_general;
		$this->obj_session = new cls_session;
		$this->obj_cookie = new cls_cookie;
		$this->db = new cls_database;
		$this->obj_registry = new cls_registry;
		$this->settings = $this->obj_registry->get_plugin('core');
		$last_check_refresh = $this->settings['validator_max_time'] + $this->settings['validator_last_check'];
		//we use this for save in database;
		
		if($last_check_refresh < time()){
			#refresh database for delete old validator keys
			//$this->refresh();
		}
	}
	//this function set validator with source and save that in cookie and session
	public function set( $source,$cookie = false, $session = true, $back = 'id'){
		//check for that is this source saved before
		if(!$this->is_set($source)){

			//not set before now we want to save that
			//first create random spicial_id
			$spicial_id=$this->obj_general->random_string();
			//save source in session
			if($session){
				$this->obj_session->set($source,$spicial_id);
			}
			//set in cookie
			if ($cookie){
				$this->obj_cookie->set($source , $spicial_id);
			}
			//save source in database
			$this->db->do_query('INSERT INTO validator (source,valid_time,special_id) VALUES (?,?,?);' , array($source,time() + $this->settings['validator_max_time'], $spicial_id),false);
			if($back == 'id'){
				return  $this->db->last_insert_id(true);
			}
			elseif($back == 'sid'){
				return $spicial_id; 
			}
			else{
				//RETURN ALL ROW
				$this->db->do_query("SELECT * FROM validator WHERE special_id=?;" ,array($spicial_id));
				return $this->db->get_first_row_array(); 
			}

		}
		else{
			//going to update source
			
			//return updated id
			return $this->get_id($source , $back);
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
		$this->db->do_query("SELECT * FROM validator WHERE id=?;" ,array($id));
		if($this->db->rows_count(true) != 0){
			//source is validated
			$this->update($id);
			return true;
		}
		//source is not valid 
		return false;
	}
	//this function delete validator
	public function delete($source, $id =0){
		if($id == 0){ $id = $this->get_id($source); }
		if($id != 0){
			//going to delete that
			return $this->db->do_query("DELETE FROM validator WHERE id=?;" ,array(trim($id)));

		}
		return false;
	}
	//this function get spicial id from user client
	public function get_id($source, $back = 'id'){
		$id = 0;
		if(isset($_GET[$source])){
			//going to get id from get metode;
			$id = $this->obj_io->cin($source, 'get');
		}
		elseif(isset($_SESSION[$source])){
			//geting from session
			$id = $this->obj_session->get($source);
		}
		elseif(isset($_COOKIE[$source])){

			//geting from cookie
			$id = $this->obj_io->cin($source, 'cookie');
		}
		if($id != '0'){
		
			$this->db->do_query("SELECT * FROM validator WHERE special_id=?;" ,array(trim($id)));
			if($this->db->rows_count() == 0){
				//not found
				return 0;
			}
			else{
				$result = $this->db->get_first_row_array();
				if($back == 'id'){
					return $result['id']; 
				}
				elseif($back == 'sid'){
					return $id;
				}
				else{
					//return all of result
					return $result;
				}
			}
		}
		//not set
		return 0;
	}
	//this function update source
	private function update($spicial_id){
		$this->db->do_query('UPDATE validator SET valid_time=? WHERE special_id=?;', array(time() + 3600 , $spicial_id)); 
		return true;
	}
	//this function refresh and delete invalid validator keys that stored in database
	private function refresh(){
		#clear old data from database
		$this->db->do_query("delete from validator where valid_time<?;", array(time()));
		#update next check for refresh database
		$this->registery->set('core', 'validator_last_check' , time());
	}
	#END CLASS
	}
	

?>