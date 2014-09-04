<?php
class ctr_image_module extends ctr_image_view{
	
	function __construct(){
		parent::__construct();
	}
	protected function module_draw($e){
		return $this->view_draw($e);
	}
}
?>
