<?php
namespace control\row;
class module extends \control\row\view{
	function __construct(){
		parent::__construct();
	}
	
	public function module_draw($e,$config){
		return $this->view_draw($e,$config);
	}
}
?>
