<?php
class languages_module extends languages_view{
	private $db;
	private $obj_localize;
	function __construct(){
		parent::__construct();
		
		$this->obj_localize = new cls_localize;
		$this->db = new cls_database;
	}
	protected function module_get_languages(){
		$this->db->do_query("SELECT language,language_name FROM localize ORDER BY language=? DESC;", array($this->obj_localize->get_language()));
		return $this->db->get_array();
	}
	protected function module_show_languages($view){
		return $this->view_show_languages($this->module_get_languages(),$view);
	}
	protected function module_change_language($e){
		
		if($this->obj_localize->set_language($e['lang']['SELECTED'])){
		//change successfull return 1
		$e['RV']['VALUE'] = 1;
		}
		else{
			$e['RV']['VALUE'] = cls_page::show_block(false,_('message'), _('changing language has some problem! Please try again later.'), 'MODAL','type-warning');
		}
		return $e;
	}
	

}
?>
