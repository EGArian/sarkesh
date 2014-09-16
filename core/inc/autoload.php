<?php

//this function load class, plugins and ...
function __autoload($class_name){
	$Seperated = explode('\\',$class_name);
	if($Seperated[0] == 'plugin'){
		
		if(max(array_keys($Seperated)) == 1){
			include_once(AppPath . 'plugins/system/'  . $Seperated[1] . '/controller.php');
		}
		elseif(max(array_keys($Seperated)) == 2){
			
			include_once(AppPath . 'plugins/system/'  . $Seperated[1] . '/' . $Seperated[2] . '.php');
		}
	}
	elseif($Seperated[0] == 'control'){
		//going to include control
		if(max(array_keys($Seperated)) == 1){
			include_once(AppPath . 'core/lib/controls/'  . $Seperated[1] . '/controller.php');
		}
		elseif(max(array_keys($Seperated)) == 2){
			
			include_once(AppPath . 'core/lib/controls/'  . $Seperated[1] . '/' . $Seperated[2] . '.php');
		}
		
	}
	else{
		//going to include some other
		$class_name = str_replace('\\','_',$class_name);
		@include_once('./core/lib/cls/' . $class_name . '.php');
	}
}


?>
