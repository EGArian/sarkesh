<?php
class email_module{
	private $view;
	
	function __construct(){
		$this->view = new email_view;
	}

}
?>