<?php
if(file_exists("./core/config.php")) {
	//going to run sarkesh!
	

	include_once("./core/config.php");
	# load core class and ...

   include_once("./core/cls/database/database.php");
   include_once("./core/cls/general.php");
   include_once("./core/cls/cookie.php");
   include_once("./core/cls/session.php");   
   include_once("./core/cls/page.php");
   
   #include functions
   include_once("./core/functions/render.php");
   
   #load theme system
	include_once("./load.php");
	}
else {
	// config file not found
	// going to start system setup

	echo("system setup");
}
		
?>