<?php
if(file_exists("./core/config.php")) {
	//going to run sarkesh!
	

	include_once("./core/config.php");
	# load core class and ...

   include_once("./core/cls/database/database.php");
   include_once("./core/cls/general.php");
   include_once("./core/cls/theme.php");
	include_once("./load.php");
	}
else {
	// config file not found
	// going to start system setup

	echo("system setup");
}
		
?>