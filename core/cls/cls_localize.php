<?php
// this class is for translate parameters in theme and plugins
class cls_localize{
	private $db;
	private $localize;
	private $obj_cookie;
	private $session;
	
	function __construct(){
		$this->obj_cookie = new cls_cookie;
		$this->obj_session = new cls_session;
		
		$this->db = new cls_database;
		$this->db->do_query("select * from " . TablePrefix . "localize where main ='1';");
		$this->localize = $this->db->get_first_row_array();
		$this->get_language();
	}
	//this function return difined localize settings in cookie
	public function get_localize($dif = false){
		if($dif){
			return $this->localize;
		}

		$this->db->do_query("select * from " . TablePrefix . "localize where language = ?;" , array($this->get_language()) );
		return $this->db->get_first_row_array();
	}

	//this function set cms language on cookie
	public function set_language($language){

		if($language != ''){
			$this->obj_cookie->set('core_language' , $language);
			$this->obj_session->set('core_language', $language);
		}
	}
	//this function get language name from cookie if that not defined return system default localize language
	public function get_language(){

		$obj_io = new cls_io;
		if($this->obj_session->is_set('core_language')){
			
			return $this->obj_session->get('core_language');		
		}
		elseif($this->obj_cookie->is_set('core_language')){
			
			return $obj_io->cin('core_language','cookie');
		}
		else{
		//return difault language
		
		return $this->localize['language'];
		}
	}
	//this function return language code that can use in tinymce editor and ect
	public function convert_language_code($language){
		switch ($language) {
			case 'fa_IR':
			    return 'fa';
			    break;
			case 'en_US':
			    return "en";
			    break;
		}
	
	}

//END CLASS
}
?>