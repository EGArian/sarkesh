<?php
class languages_controller extends languages_module{

	private $obj_io;
	
	function __construct(){
		parent::__construct();
		$this->obj_io = new cls_io;
	}
	//this function control request and show UI
	public function action($action_name, $view){
		if($action_name == 'language_select'){
			//going to show language selection
			return $this->module_show_languages($view);

		}

	}

	public function languages_onchange($e){
		
		return $this->module_change_language($e);
	}

}
?>
