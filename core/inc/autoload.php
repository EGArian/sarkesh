<?php

//this function load class, plugins and ...
function __autoload($class_name){
	$Seperated = explode('\\',$class_name);
	if($Seperated[0] == 'core' && $Seperated[1] == 'plugin'){
		
		if(max(array_keys($Seperated)) == 2){
			include_once(AppPath . 'plugins/system/'  . $Seperated[2] . '/controller.php');
		}
		elseif(max(array_keys($Seperated)) == 3){
			
			include_once(AppPath . 'plugins/system/'  . $Seperated[2] . '/' . $Seperated[3] . '.php');
		}
	}
	elseif($Seperated[0] == 'core' && $Seperated[1] == 'control'){
		//going to include control
		if(max(array_keys($Seperated)) == 2){
			include_once(AppPath . 'core/lib/controls/'  . $Seperated[2] . '/controller.php');
		}
		elseif(max(array_keys($Seperated)) == 3){
			
			include_once(AppPath . 'core/lib/controls/'  . $Seperated[2] . '/' . $Seperated[3] . '.php');
		}
		
	}
	else{
		//going to include some other
		$class_name = str_replace('\\','_',$class_name);
		@include_once('./core/lib/cls/' . $class_name . '.php');
	}
}


?>
