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
		elseif($action == "test_table"){
			$a = new ctr_table;
			$b = new ctr_button;
			$a->configure('HEADERS',array(1,2,3));
			$a->add_source(array(array(9,9,9),array('v','v',$b->draw())));
			$a->add_row(array(4,5,6));
			$a->add_row(array(7,8,9));
			echo $a->draw();
		}
	}
	public function roydad($e){
		$e['M']['label'] = "TEST TEST JUST TEST!";
		return $e;
	}
}
?>
