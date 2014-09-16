<?php
namespace control\combobox;
/*
	this class is a module for working with button
	
*/
class module extends \control\combobox\view{
	
	function __construct(){
		 parent::__construct();
	}
	
	protected function module_draw($config, $show){
		return $this->view_draw($config, $show);
	}
	
}
