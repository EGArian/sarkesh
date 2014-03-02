<?php
class calendar_module{
	private $view;
	
	function __construct(){
		$this->view = new calendar_view;
	}
	
	public function get_calendar_name(){
	
		$localize = new cls_localize;
		$local = $localize->get_localize();
		return $local['calendar'];
	}

}
?>