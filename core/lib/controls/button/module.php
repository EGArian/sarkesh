<?php
/*
	this class is a module for working with button
	
*/
class ctr_button_module extends ctr_button_view{
	
	function __construct(){
		 parent::__construct();
	}
	
	protected function module_draw($config){
		return $this->view_draw($config);
	}
}
