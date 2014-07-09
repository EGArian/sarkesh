<?php
class ctr_uploader_module extends ctr_uploader_view{
	function __construct(){
		parent::__construct();
	}
	
	protected function module_draw($config){
		return $this->view_draw($config);
	}
	
}
?>
