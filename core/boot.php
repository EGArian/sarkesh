<?php
//set error reporting
error_reporting(E_ALL);

function __autoload($class_name){
	 $result = explode('_', $class_name ,2);
	 //it's system classes going to attech that
	 if($result[0] == 'ctr'){
		 @include_once(dirname(__FILE__) . '/lib/controls/' . $result[1] . '/controller.php');
		 $ctr_split = explode('_', $result[1] ,2);
		 @include_once(dirname(__FILE__) . '/lib/controls/' . $ctr_split[0] . '/' . $ctr_split[1] .'.php');

	 }
	 elseif($result[0] == 'cls'){
		 @include_once(dirname(__FILE__) . '/lib/cls/' . $class_name . '.php');
	 }
	 elseif(@$result[1] == 'module' || @$result[1] == 'view'){
		 @include_once(AppPath . '/plugins/' . $result[0] . '/' . $result[1] . '.php');
	 }
	 else{
		//going to include plugin
		@include_once(AppPath . '/plugins/' . $result[0] . '/controller.php');
	 }
}

//start session system
$sess_id = session_id();
if(empty($sess_id)){ session_start();}

if(file_exists("./config.php")) {
	//going to run sarkesh!
	include_once("./config.php");
	//LOAD INC Files
	//include core difines
	include_once( AppPath . 'core/defines.php');
	include_once(AppPath . 'core/inc/localize.php');
	#include functions
	include_once("./core/functions/render.php");  
	// config and setup cls_orm // RedBeanphp
	cls_orm::run();
	//check for that want work with services or normal use
	if(isset($_REQUEST['service'])){
		#run system in service mode
		$obj_router = new cls_router;
		$obj_router->run_service();
	}
	//check for that want work with controls
	elseif(isset($_REQUEST['control'])){
		#run system in service mode
		$obj_router = new cls_router;
		$obj_router->run_control();
	}
	//this part is for working with administrator area
	elseif(isset($_REQUEST['panel']) && $_REQUEST['panel'] == 'admin'){
		#load core
		include_once("./core/inc/core_load.php");	
	}
	else{
		#load system in gui normal mode
		include_once("./core/inc/load.php");
	}
}
else {
	// configure file not found
	// going to start system setup

	echo("system setup...");
}
		
?>
