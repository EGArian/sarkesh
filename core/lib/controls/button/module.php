<?php
namespace control\button;
/*
	this class is a module for working with button
	
*/
class module extends \control\button\view{
	
	function __construct(){
		 parent::__construct();
	}
	
	protected function module_draw($config){
		return $this->view_draw($config);
	}
}
