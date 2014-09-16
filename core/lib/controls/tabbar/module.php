<?php
namespace control\tabbar;
class module extends \control\tabbar\view{
	
	function __construct(){
		parent::__construct();
	}
	protected function module_draw($tabs,$config){
		return $this->view_draw($tabs,$config);
	}
}
?>
