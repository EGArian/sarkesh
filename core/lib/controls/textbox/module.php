<?php
namespace control\textbox;
/*
	this class is a module for working with textbox
	
*/
class module extends \control\textbox\view{
	
	function __construct(){
		 parent::__construct();
	}
	
	protected function module_draw($config, $show){
		return $this->view_draw($config, $show);
	}
	
}
