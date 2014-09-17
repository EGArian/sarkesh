<?php
namespace core\control\captcha;
class module extends view{
	
	function __construct(){
		parent::__construct();
	}
	protected function module_draw($e){
		return $this->view_draw($e);
	}
}
?>
