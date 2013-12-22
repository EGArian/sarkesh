<?php
// this class is for translate parameters in theme and plugins
class cls_localize{
	private $db;
	private $localize;
	function __construct(){
		$this->db = new cls_database;
		$this->db->do_query("select * from " . TablePrefix . "localize where main = 1;");
		$this->localize = $this->db->get_first_row_array();
	}
	//this function return difined localize settings in cookie
	public function get_localize($dif = true){
		if($dif){
			return $this->localize;
		}

		$this->db->do_query("select * from " . TablePrefix . "localize where language = ?;" , array($this->get_language()) );
		return $this->db->get_first_row_array();
	}

	//this function set cms language on cookie
	public function set_language($language){
		if($language != ''){
			$obj_cookie = new cls_cookie;
			$obj_cookie->set('core_language' , $language);
		}
	}
	//this function get language name from cookie if that not defined return system default localize language
	public function get_language(){
		$obj_cookie = new cls_cookie;
		if($obj_cookie->is_set('core_language')){
			$obj_io = new cls_io;
			return $obj_io->cin('core_language','cookie');}
		else{
		//return difault language
		return $this->localize['language'];
		}
	}

//END CLASS
}
?>