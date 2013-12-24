<?php

if(file_exists("./config.php")) {
	//going to run sarkesh!
	

   include_once("./config.php");
	# load core class and ...
   include_once("./core/cls/io.php");	
   include_once("./core/cls/database/database.php");
   include_once("./core/cls/general.php");
   include_once("./core/cls/cookie.php");
   include_once("./core/cls/session.php"); 
   include_once("./core/cls/validator.php");  
   include_once("./core/cls/localize.php");   
   include_once("./core/cls/page.php");
   include_once("./core/cls/router.php");
   include_once("./core/cls/plugin.php");

   
   #include functions
   include_once("./core/functions/render.php");
   
   #include ect
   include_once("./core/inc/localize.php");
   
   
   #load theme system
	include_once("./core/inc/load.php");
	}
else {
	// config file not found
	// going to start system setup

	echo("system setup");
}
		
?>