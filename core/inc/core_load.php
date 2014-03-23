<?php
/*	this file is perpare application of user for start working
	in this file set functions for start and use in themes
*/
ob_start("sys_render");
		//going to admin panel
		//set plugin varible
		if(isset($_GET['plugin'])){
			$plugin = $_GET['plugin'];
		}
		else{
			$plugin = 'default';
		}
		//set action varible
		if(isset($_GET['action'])){
			$action = $_GET['action'];
		}
		else{
			$action = 'default';
		}
		$admin = new core_controller;
		$admin->core_controller($plugin, $action);
ob_end_flush();
?>


