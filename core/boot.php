<?php

//this function load class, plugins and ...
function __autoload($class_name){
	 $result = explode('_', $class_name ,2);
	 $exists = false;
	 $reference = '';
	 //it's system classes going to attech that
	 if($result[0] == 'ctr'){
		 if(file_exists(dirname(__FILE__) . '/lib/controls/' . $result[1] . '/controller.php') ){
			 include_once(dirname(__FILE__) . '/lib/controls/' . $result[1] . '/controller.php');
		 }
		 else{
			 $ctr_split = explode('_', $result[1] ,2);
			 if(file_exists(dirname(__FILE__) . '/lib/controls/' . $ctr_split[0] . '/' . $ctr_split[1] .'.php')){
				require_once(dirname(__FILE__) . '/lib/controls/' . $ctr_split[0] . '/' . $ctr_split[1] .'.php');
				$exists = true;
			}
		 }
		 $reference = _('control') . ' ' . $result[1];
	 }
	 elseif($result[0] == 'cls'){
		 if(file_exists(dirname(__FILE__) . '/lib/cls/' . $class_name . '.php')){
			include_once(dirname(__FILE__) . '/lib/cls/' . $class_name . '.php');
			$exists = true;
		 }
		  $reference = _('class') . ' ' . $class_name;
	 }
	 elseif(@$result[1] == 'module' || @$result[1] == 'view'){
		 if(file_exists(AppPath . '/plugins/system/' . $result[0] . '/' . $result[1] . '.php') || file_exists(AppPath . '/plugins/defined/' . $result[0] . '/' . $result[1] . '.php')){
			 @include_once(AppPath . '/plugins/system/' . $result[0] . '/' . $result[1] . '.php');
			 @include_once(AppPath . '/plugins/defined/' . $result[0] . '/' . $result[1] . '.php');
			 $exists = true;
		 }
		 $reference = _('plugin') . ' ' . $result[0] ;
	 }
	 else{
		//going to include plugin
		if(file_exists(AppPath . '/plugins/system/' . $result[0] . '/controller.php') || file_exists(AppPath . '/plugins/defined/' . $result[0] . '/controller.php')){
			@include_once(AppPath . '/plugins/system/' . $result[0] . '/controller.php');
			@include_once(AppPath . '/plugins/defined/' . $result[0] . '/controller.php');
			$exists = true;
		}
		$reference = _('plugin') . ' ' . $result[0];
	 }
	 //check for found state of objects
	 if($exists = false){
		 exit(_('Request for %s was fail',$reference));
		 
	 }
}

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
	cls_orm::run();
	
	//check for that want work with services or normal use
	if(isset($_REQUEST['service'])){
		#run system in service mode
		$obj_router = new cls_router();
		$obj_router->run_service();
	}
	//check for that want work with controls
	elseif(isset($_REQUEST['control'])){
		#run system in service mode
		$obj_router = new cls_router;
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
