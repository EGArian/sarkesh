<?php
//this plugins say hello to world
class hello_controller{

	public function action($action_name){
	      
	      if($action_name == 'say'){
		echo 'hello world';
	      }
	  
	}
	
	public function service($service_name){
		
		if($service_name == 'say'){
		echo 'Hello world';
		}
	}
	

}

?>