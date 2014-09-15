<?php
namespace control\form;
class module extends \control\form\view{
	
	function __construct(){
		parent::__construct();
	}
	protected function module_draw($e,$c){
		return $this->view_draw($e,$c);
	}
}
?>
