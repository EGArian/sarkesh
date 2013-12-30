<?php
function __autoload($class_name){
	@include_once(dirname(__FILE__) . '/cls/' . $class_name . '.php');
}
//start session system
session_start();
//create an object from page class for use in theme


if(file_exists("./config.php")) {
	//going to run sarkesh!
	include_once("./config.php");
	//LOAD INC Files
	include_once(AppPath . 'core/inc/localize.php');
	$sys_page = new cls_page;
	$aa = new cls_router;
	#include functions
	include_once("./core/functions/render.php");  
	#load theme system
	include_once("./core/inc/load.php");
	}
else {
	// config file not found
	// going to start system setup

	echo("system setup");
}
		
?>