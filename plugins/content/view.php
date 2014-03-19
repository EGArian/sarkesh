<?php
class content_view{

	private $obj_page;
	private $raintpl;
	function __construct(){
		//config raintpl
		$this->raintpl = new cls_raintpl;
		$this->obj_page = new cls_page;
	}
	
	
}
?>