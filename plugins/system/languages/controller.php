<?php
namespace core\plugin;
use \core\plugin\languages as languages;
use \core\cls\network as network;
class languages extends languages\module{

	private $obj_io;
	
	function __construct(){
		parent::__construct();
		$this->obj_io = new network\io;
	}

	public function select_lang(){
		//going to show language selection
		return $this->module_select_lang();
	}

	public function languages_onchange($e){
		
		return $this->module_change_language($e);
	}

}
?>
