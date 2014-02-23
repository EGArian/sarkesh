<?php
//this plugins say hello to world
class hello_controller{

	public function action($action_name){
	      
	      if($action_name == 'say'){
			$vv = new cls_cookie;
			$vv->set('ali' , 10);
			if($vv->is_set('ali')){
				echo $vv->get('ali');
			}
	      }
	      elseif($action_name == 'go'){
	     echo 'fucking day';
	     }
	
	}
	
	public function service($service_name){
		
		if($service_name == 'say'){
		
		echo 'fucking man! do not try this';
		}
	}
	

}

?>