<?php
/*
	this class is a module for working with upload files
	
*/
class ctr_switch_module extends ctr_switch_view{
	
	function __construct(){
		 parent::__construct();
	}
	
	protected function module_draw($config){
		$this->view_draw($config);
	}
}