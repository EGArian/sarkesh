<?php
class files_module extends files_view{
	
		private $db;

		
	function __construct(){
		parent::__construct();
		$this->db = new cls_database;
	}
	
	//store temp files with id
	protected function module_save_temp_file($this_file , $upload_info){
		$page = new cls_page;
		
		//get active strong class
		$this->db->do_query("SELECT * FROM file_places WHERE state = '1'");
		$active_place = $this->db->get_first_row_array();
		$plugin_name = $active_place['class_name'];
		//include access point file
		include_once(dirname(__FILE__) . '/access points/' . $plugin_name . '.php');
		//create object
		$ap = new $plugin_name($active_place['options']);
		$adr = $ap->save_temp_file($this_file);
		if(! is_null($adr)){
			//file uploaded successful
			//save file in database and return back id of that
			//get user that upload this file
			$user = new users_module;
			$user_info = $user->get_current_user_info();
			if($user_info == '-1'){
					//user is guest
					$values = array($this_file['name'],$active_place['id'],$adr,time(), '-1' ,$this_file['size']);
			}
			else{
					$values = array($this_file['name'],$active_place['id'],$adr,time(), $user_info['id'] ,$this_file['size']);

			}
			$this->db->do_query("INSERT INTO files (name,place,address,date,user,size) VALUES (?,?,?,?,?,?);", $values);
			$inser_id = $this->db->last_insert_id();
			return $page->show_block(FALSE, _('File system'), _('Your file successfuly uploaded.'), 'MODAL', 'type-success', $inser_id);
			
		}
		else{
			//a problem happened in saving file
			return $page->show_block(FALSE, _('File system'), _('Upload fail! please refresh page and try again.'), 'MODAL', 'type-danger', 0);
				
		}
		
	}

}
?>