<?php
class ctr_radioitem_module extends ctr_radioitem_view{
	
	function __construct(){
		parent::__construct();
	}
	protected function module_draw($c){
		return $this->view_draw($c);
	}
}
?>
