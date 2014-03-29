<?php
/*
	this class is a module for working with upload files
	
*/
class ctr_uploader_module extends ctr_uploader_view{
	
	function __construct(){
		 parent::__construct();
	}
	
	protected function draw_module($uploader){
		$this->view_draw($uploader);
	}
	protected function invalid_file_msg(){
		if(isset($_REQUEST['msg']) && $_REQUEST['msg'] != ''){
			$msg = $_REQUEST['msg'];
		}
		$msg = 'invalid_type_size';
		$this->view_show_msg($msg);
	}
	//this function get value by request and then return back unit of that
	protected function get_unit($value,$show=true){
		if($value < 1024){
				$unit = _('Byte');
				$factor = 1;
		}
		elseif ($value >= 1024 && $value <= 1048576) {
				$unit = _('KiloByte');
				$factor = 1024;
		}
		else{
				$unit = _('MegaByte');
				$factor = 1048576;
		}
		if($show){
			echo $unit . ',' . $factor;
		}
		return array($unit,$factor);
	}
	
}