<?php
class ctr_uploader_view{
	
	private $raintpl;
	private $page;
	function __construct(){
		$this->page = new cls_page;
		$this->raintpl = new cls_raintpl;
	}
	#this control support 4 type
	#single => simple single file uploader
	#p_single => pro single file uploader
	#multiple => simple multiple file uploader
	#p_multiple =>pro multiple file uploader
	
	#$name it's id of main block of this control
	#$name use for access javascript codes to this element
	# WARNING : $name most be unique 
	public function view_draw($uploader){
		//configure raintpl 
		$this->raintpl->configure('tpl_dir','core/lib/controls/uploader/tpl/');
		//set variables	
		$this->raintpl->assign( "name", $uploader['NAME']);
		$this->raintpl->assign( "type", $uploader['TYPE']);
		$this->raintpl->assign( "file_types", $uploader['FILE_TYPES']);
		$this->raintpl->assign( "max_file_size", $uploader['MAX_FILE_SIZE']);
		$this->raintpl->assign( "description", $uploader['DES']);
		$this->raintpl->assign( "type", $uploader['TYPE']);
		$this->raintpl->assign( "title", $uploader['LABLE']);
		$this->raintpl->assign( "php_progressbar_request", 'ini_get("session.upload_progress.name")');
		$this->raintpl->assign( "label_select_file", _('Select File'));
		//checking unit
		//echo $uploader['MAX_FILE_SIZE'];
		if($uploader['MAX_FILE_SIZE'] < 1024){
				$this->raintpl->assign( "label_size_unit", _('Byte'));
				$this->raintpl->assign( "label_calculated_file_size", $uploader['MAX_FILE_SIZE'] );
		}
		elseif ($uploader['MAX_FILE_SIZE'] >= 1024 && $uploader['MAX_FILE_SIZE'] <= 1048576) {
				$this->raintpl->assign( "label_size_unit", _('KiloByte'));
				$this->raintpl->assign( "label_calculated_file_size", round($uploader['MAX_FILE_SIZE']/1024, 1) );
		}
		else{
				$this->raintpl->assign( "label_size_unit", _('MegaByte'));
				$this->raintpl->assign( "label_calculated_file_size", round($uploader['MAX_FILE_SIZE']/1048576, 1) );
		}

		$this->raintpl->assign( "label_file_size", _('Maximum File Size'));
		$this->raintpl->assign( "label_file_types", _('File Types'));
		$this->raintpl->assign( "label_this_file_name", _('File name :'));
		$this->raintpl->assign( "label_this_file_size", _('File size :'));
		$this->raintpl->assign( "label_this_file_types", _('File Type:'));
		$this->raintpl->assign( "label_start_upload", _('Start Upload'));
		
		
		if($uploader['TYPE'] == 'single'){
			echo $this->raintpl->draw('ctr_uploader_single_uploader', true );
			
		}		
	}

	//this function show messages
	protected function view_show_msg($msg_code){
		if($msg_code == 'invalid_type_size'){
			$msg = _('Size or type of selected file is invalid!');
			$msg_type = 'warning';
		}
		
		//going to show message in modal mode
		$this->page->show_in_box(_('File upload'), $msg, $msg_type);
	}
}
?>