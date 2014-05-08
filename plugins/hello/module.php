<?php
class hello_module extends hello_view{
	
	function __construct(){
		parent::__construct();
	}
	
	public function module_test_button(){
		return $this->view_test_button();
	}
	public function module_test_textbox(){
		return $this->view_test_textbox();
	}
	public function module_test_combobox(){
		return $this->view_test_combobox();
	}

}
?>
