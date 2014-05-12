<?php
class languages extends languages_module{

	private $obj_io;
	
	function __construct(){
		parent::__construct();
		$this->obj_io = new cls_io;
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
