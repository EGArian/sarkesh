<?php
class ctr_row_module extends ctr_row_view{
	
	function __construct(){
		parent::__construct();
	}
	protected function module_draw($e, $config){
		return $this->view_draw($e, $config);
	}
}
?>
