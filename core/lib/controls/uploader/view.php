<?php
namespace control\uploader;
class view{
	
	private $raintpl;
	private $page;
	function __construct(){
		
		$this->raintpl = new \template\raintpl;
		$this->page = new browser\page;
	}
	
	//this function draw control
	protected function view_draw($config){
		//configure raintpl //
		$this->raintpl->configure('tpl_dir','core/lib/controls/uploader/');
		
		//add headers to page//
		cls_page::add_header('<script src="./core/ect/scripts/events/functions.js"></script>');		
		cls_page::add_header('<script src="./core/lib/controls/uploader/ctr_uploader.js"></script>');
		cls_page::add_header('<link rel="stylesheet" type="text/css" href="./core/lib/controls/uploader/ctr_uploader.css" />');
		
		if($config['SCRIPT_SRC'] != ''){cls_page::add_header('<script src="' . $config['SCRIPT_SRC'] . '"></script>'); }		
		if($config['CSS_FILE'] != ''){ cls_page::add_header('<link rel="stylesheet" type="text/css" href="' . $config['CSS_FILE']) . '" />';}
	
	
		$this->raintpl->assign( "size", $config['SIZE']);
		$this->raintpl->assign( "class", $config['CLASS']);
		$this->raintpl->assign( "form", $config['FORM']);
		$this->raintpl->assign( "name", $config['NAME']);
		$this->raintpl->assign( "label", $config['LABEL']);
		$this->raintpl->assign( "help", $config['HELP']);
		$this->raintpl->assign( "type", $config['TYPE']);
		$this->raintpl->assign( "txt_file_address", _('File name'));
		$this->raintpl->assign( "txt_upload", _('Upload'));
		$this->raintpl->assign( "txt_select", _('Select'));
		$this->raintpl->assign( "txt_max_size", _('Max Size'));
		$this->raintpl->assign( "txt_max_size_unit", $config['FILE_UNIT']);
		$this->raintpl->assign( "max_size",$config['MAX_FILE_SIZE']);
		$this->raintpl->assign( "max_size_unit",$config['MAX_FILE_SIZE_UNIT']);
		$this->raintpl->assign( "txt_file_types", _('Valid types'));
		$this->raintpl->assign( "file_types", $config['FILE_TYPES']);
		$this->raintpl->assign( "preview", $config['PREVIEW']);
	
		//return control
		return $this->raintpl->draw('ctr_uploader',true);
	
	}
	
}
?>
