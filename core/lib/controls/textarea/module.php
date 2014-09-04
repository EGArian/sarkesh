<?php
class ctr_textarea_module extends ctr_textarea_view{
	function __construct(){
		parent::__construct();
	}
	protected function module_draw($config){
		return $this->view_draw($config);
	}
}
?>
