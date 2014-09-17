<?php
namespace core\plugin\languages;
use \core\cls\db as db;
use \core\cls\core as core;
class module extends view{
	private $db;
	private $obj_localize;
	function __construct(){
		parent::__construct();
		
		$this->obj_localize = new core\localize;
		$this->db = new db\mysql;
	}
	protected function module_get_languages(){
		$this->db->do_query("SELECT language,language_name FROM localize ORDER BY language=? DESC;", array($this->obj_localize->get_language()));
		return $this->db->get_array();
	}
	protected function module_select_lang(){
		return $this->view_select_lang($this->module_get_languages());
	}
	protected function module_change_language($e){
		
		if($this->obj_localize->set_language($e['lang']['SELECTED'])){
		//change successfull return 1
		$e['RV']['URL'] = 'R';
		}
		else{
			$e['RV']['VALUE'] = cls_page::show_block(false,_('message'), _('changing language has some problem! Please try again later.'), 'MODAL','type-warning');
		}
		return $e;
	}
	

}
?>
