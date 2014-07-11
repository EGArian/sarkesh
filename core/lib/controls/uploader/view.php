<?php
class ctr_uploader_view{
	
	private $raintpl;
	private $page;
	function __construct(){
		
		$this->raintpl = new cls_raintpl;
		$this->page = new cls_page;
	}
	
	//this function draw control
	protected function view_draw($config){
		//configure raintpl //
		$this->raintpl->configure('tpl_dir','core/lib/controls/uploader/');
		
		//add headers to page//
		cls_page::add_header('<script src="./core/ect/scripts/events/functions.js"></script>');		
		cls_page::add_header('<script src="./core/lib/controls/uploader/ctr_uploader.js"></script>');
		
		if($config['SCRIPT_SRC'] != ''){cls_page::add_header('<script src="' . $config['SCRIPT_SRC'] . '"></script>'); }		
		if($config['CSS_FILE'] != ''){ cls_page::add_header('<link rel="stylesheet" type="text/css" href="' . $config['CSS_FILE']) . '" />';}
	
	
		$this->raintpl->assign( "size", $config['SIZE']);
		$this->raintpl->assign( "class", $config['CLASS']);
		$this->raintpl->assign( "form", $config['FORM']);
		$this->raintpl->assign( "name", $config['NAME']);
		$this->raintpl->assign( "label", $config['LABEL']);
		$this->raintpl->assign( "help", $config['HELP']);
		$this->raintpl->assign( "type", $config['TYPE']);
		$this->raintpl->assign( "txt_file_address", _('File Location'));
		$this->raintpl->assign( "txt_upload", _('Upload'));
		$this->raintpl->assign( "txt_select", _('Select'));
		$this->raintpl->assign( "txt_max_size", _('Max Size'));
		$this->raintpl->assign( "txt_max_size_unit", _('KByte'));
		$this->raintpl->assign( "max_size", _('123'));
		$this->raintpl->assign( "txt_file_types", _('Valid types'));
		$this->raintpl->assign( "file_types", _('jpeg,png'));
	
		//return control
		return $this->raintpl->draw('ctr_uploader',true);
	
	}
	
}
?>
