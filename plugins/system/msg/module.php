<?php
class msg_module extends msg_view{

	function __construct(){
		parent::__construct();
	}
	
	protected function module_404(){
		return $this->view_404();
	}
	
	/*
	 * INPUT:STRING:HEADER
	 * INPUT:STRING:BODY OF MESSAGE
	 * INPUT:STRING:TYPE(success,danger,warrning,info)
	 * This function show custom mesage
	 * OUTPUT:ELEMENTS
	 */
	 public function module_msg($header, $body, $type = 'success'){
		 return $this->view_msg($header,$body,$type);
	 }
}
?>
