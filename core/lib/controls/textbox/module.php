<?php
/*
	this class is a module for working with textbox
	
*/
class ctr_textbox_module extends ctr_textbox_view{
	
	function __construct(){
		 parent::__construct();
	}
	
	protected function module_draw($config, $show){
		return $this->view_draw($config, $show);
	}
	
}
