<?php
class ctr_switch_view{
	
	private $raintpl;
	private $page;
	function __construct(){
		$this->page = new cls_page;
		$this->raintpl = new cls_raintpl;
	}
	
	public function view_draw($config){
		//configure raintpl 
		$this->raintpl->configure('tpl_dir','core/lib/controls/switch/tpl/');
		
		//add headers to page
		cls_page::add_header('<link rel="stylesheet" type="text/css" href="./core/lib/controls/switch/bootstrap-switch.css" />');
		cls_page::add_header('<script src="./core/lib/controls/switch/scripts/bootstrap-switch.min.js"></script>');
		cls_page::add_header('<script src="./core/lib/controls/switch/scripts/ctr_switch.js"></script>');
		//ASSIGN VALUES
		$this->raintpl->assign( "name", $config['ID']);
		$this->raintpl->assign( "on_text", $config['ON_LABLE']);
		$this->raintpl->assign( "off_text", $config['OFF_LABLE']);
		$this->raintpl->assign( "on_color", $config['ON_COLOR']);
		$this->raintpl->assign( "off_color", $config['OFF_COLOR']);
		$this->raintpl->assign( "center_text", $config['CENTER_LABLE']);
		$this->raintpl->assign( "size", $config['SIZE']);

		
		if($config['DISABLED']){
			$this->raintpl->assign( "disabled", 'TRUE');
		}
		else{
			$this->raintpl->assign( "disabled", 'FALSE');
		}
		
		if($config['READ_ONLY']){
			$this->raintpl->assign( "read_only", 'TRUE');
		}
		else{
			$this->raintpl->assign( "read_only", 'FALSE');
		}
		
		
		if($config['STATE']){
			$this->raintpl->assign( "state", 'TRUE');
		}
		else{
			$this->raintpl->assign( "state", 'FALSE');
		}
		return $this->raintpl->draw('ctr_switch', true );
			
			
	}
}
?>