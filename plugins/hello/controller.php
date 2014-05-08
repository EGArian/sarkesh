<?php
class hello_controller extends hello_module{
	
	function __construct(){
		parent::__construct();
	}
	public function action($action){
		if($action == "test_testbox"){
			return $this->module_test_textbox();
		}
		elseif($action == "test_button"){
			return $this->module_test_button();
		}
		elseif($action == "test_checkbox"){
			$a = new ctr_checkbox;
			$a->configure("LABEL","SAMPLE TEXT");
			$a->configure("DISABLE",FALSE);
			$a->draw(true);
		}
		elseif($action == "test_tabbar"){
			$a = new ctr_tabbar;
			
			echo $a->draw(true);
		}
	}
	public function roydad($e){
		$e['M']['label'] = "TEST TEST JUST TEST!";
		return $e;
	}
}
?>
