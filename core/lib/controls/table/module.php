<?php
namespace core\control\table;
class module extends view{
	
	function __construct(){
		parent::__construct();
	}
	protected function module_draw($config){
		return $this->view_draw($config);
	}
}

?>
