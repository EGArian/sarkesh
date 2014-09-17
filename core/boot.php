<?php

//this include file has autoload function
require_once('./core/inc/autoload.php');

//start session system
$sess_id = session_id();
if(empty($sess_id)){ session_start();}

if(file_exists("./config.php")) {
	//going to run sarkesh!
	include_once("./config.php");
	//LOAD INC Files
	
	//set error reporting
	// ERROR_REPORTING defined in config file
	error_reporting(ERROR_REPORTING);
	
	//include core difines
	require_once( AppPath . 'core/defines.php');
	require_once(AppPath . 'core/inc/localize.php');
	
	#include functions
	require_once("./core/functions/render.php");  
	
	// config and setup cls_orm // RedBeanphp
	\core\cls\db\orm::run();
	
	//check for that want work with services or normal use
	if(isset($_REQUEST['service'])){
		#run system in service mode
		$obj_router = new \core\cls\core\router();
		$obj_router->run_service();
	}
	//check for that want work with controls
	elseif(isset($_REQUEST['control'])){
		#run system in service mode
		$obj_router = new \core\cls\core\router;
		$obj_router->run_control();
	}
	else{
		#load system in gui normal mode
		require_once("./core/inc/load.php");
	}
}
else {
	// configure file not found
	// going to start system setup

	echo("system setup...");
}
		
?>
