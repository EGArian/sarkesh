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
		

		$this->raintpl->assign( "form_name", 11);
		
		echo $this->raintpl->draw('ctr_switch', true );
			
			
	}
}
?>