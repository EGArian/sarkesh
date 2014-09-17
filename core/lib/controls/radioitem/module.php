<?php
namespace core\control\radioitem;
class module extends view{
	
	function __construct(){
		parent::__construct();
	}
	protected function module_draw($c){
		return $this->view_draw($c);
	}
}
?>
