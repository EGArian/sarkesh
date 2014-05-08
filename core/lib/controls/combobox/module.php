<?php
/*
	this class is a module for working with button
	
*/
class ctr_combobox_module extends ctr_combobox_view{
	
	function __construct(){
		 parent::__construct();
	}
	
	protected function module_draw($config, $show){
		return $this->view_draw($config, $show);
	}
	
}
