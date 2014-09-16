<?php
namespace control\uploader;
class module extends \control\uploader\view{
	function __construct(){
		parent::__construct();
	}
	
	protected function module_draw($config){
		//set file size unit
		if($config['MAX_FILE_SIZE'] < 1023){
			$config['FILE_UNIT'] = _('Byte');
			$config['MAX_FILE_SIZE_UNIT'] = $config['MAX_FILE_SIZE'];
		}
		elseif($config['MAX_FILE_SIZE'] < 1048576){
			$config['FILE_UNIT'] = _('KByte');
			$config['MAX_FILE_SIZE_UNIT'] = round($config['MAX_FILE_SIZE']/1024);
		}
		else{ 
			$config['FILE_UNIT'] = _('MByte');
			$config['MAX_FILE_SIZE_UNIT'] = round($config['MAX_FILE_SIZE']/1048576);
			}
		return $this->view_draw($config);
	}
	
}
?>
