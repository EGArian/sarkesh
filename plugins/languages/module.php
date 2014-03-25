<?php
class languages_module{
	private $view;
	//------------
	private $db;
	private $obj_localize;
	function __construct(){
		$this->view = new languages_view;
		$this->obj_localize = new cls_localize;
		
		$this->db = new cls_database;
	}
	public function get_languages($user_language){
		$this->db->do_query("SELECT language,language_name FROM localize ORDER BY language=? DESC;", array($user_language));
		return $this->db->get_array();
	}

}
?>