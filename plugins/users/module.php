<?php
class users_module extends users_view{
	private $registry;
	private $settings;
	function __construct(){
		$this->registry = new cls_registry;
		$this->settings = $this->registry->get_plugin('users');
		parent::__construct($this->settings);

	}
	
	public function module_login(){
		return $this->view_login();
	}
	
}
?>
