<?php
class hello_module{
	private $view;
	
	function __construct(){
		$this->view = new hello_view;
	}
	public function sample(){
		return $this->view->sample();
	}

}
?>
