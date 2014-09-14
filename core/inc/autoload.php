<?php

//this function load class, plugins and ...
function __autoload($class_name){
	$Seperated = explode('\\',$class_name);
	if($Seperated[0] == 'plugin'){
		//going to include plugin
		include_once(AppPath . 'plugins/system/' .$Seperated[1] . '/' . $Seperated[2] . '.php');
	}
	else{
		//going to include some other
		$class_name = str_replace('\\','_',$class_name);
		include_once('./core/lib/cls/' . $class_name . '.php');
	}
}


?>
