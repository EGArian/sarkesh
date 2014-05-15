<?php
class msg_module extends msg_view{

	function __construct(){
		parent::__construct();
	}
	
	protected function module_404(){
		return $this->view_404();
	}
}
?>
