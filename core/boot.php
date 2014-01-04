<?php
function __autoload($class_name){
	@include_once(dirname(__FILE__) . '/cls/' . $class_name . '.php');
}
//start session system
$sess_id = session_id();
if(empty($sess_id)){ session_start();}
echo $sess_id;

if(file_exists("./config.php")) {
	//going to run sarkesh!
	include_once("./config.php");
	//this part is for config template engine
	//base url add to all src attrebiutes
	cls_raintpl::configure("base_url", "." );
	//base folder that tpl files stored on that
	cls_raintpl::configure("tpl_dir", "tpl/" );
	//path for store temp files
	cls_raintpl::configure("cache_dir", "upload/buffer/" );
	//LOAD INC Files
	include_once(AppPath . 'core/inc/localize.php');
	$sys_page = new cls_page;
	#include functions
	include_once("./core/functions/render.php");  
	//check for that want work with services or normal use
	if(isset($_GET['service'])){
		#run system in service mode
		$obj_router = new cls_router;
		$obj_router->run_service();
	}
	else{
		#load system in gui mode
		include_once("./core/inc/load.php");
	}
}
else {
	// config file not found
	// going to start system setup

	echo("system setup...");
}
		
?>