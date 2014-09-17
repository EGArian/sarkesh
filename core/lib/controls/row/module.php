<?php
namespace core\control\row;
class module extends view{
	function __construct(){
		parent::__construct();
	}
	
	public function module_draw($e,$config){
		return $this->view_draw($e,$config);
	}
}
?>
