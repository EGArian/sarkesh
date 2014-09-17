<?php
namespace core\control\tabbar;
class module extends view{
	
	function __construct(){
		parent::__construct();
	}
	protected function module_draw($tabs,$config){
		return $this->view_draw($tabs,$config);
	}
}
?>
