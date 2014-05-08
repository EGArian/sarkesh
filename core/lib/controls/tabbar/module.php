<?php
class ctr_tabbar_module extends ctr_tabbar_view{
	
	function __construct(){
		parent::__construct();
	}
	protected function module_draw($tabs,$config){
		return $this->view_draw($tabs,$config);
	}
}
?>
