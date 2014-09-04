<?php
class ctr_table_module extends ctr_table_view{
	
	function __construct(){
		parent::__construct();
	}
	protected function module_draw($config){
		return $this->view_draw($config);
	}
}

?>
