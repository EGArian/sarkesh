<?php
class ctr_hidden_module extends ctr_hidden_view{
	function __construct(){
		parent::__construct();
	}
	
	public function module_draw($config){
		return $this->view_draw($config);
	}
}
?>
