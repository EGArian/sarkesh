<?php
class ctr_button_view{
	
	private $raintpl;
	private $page;
	function __construct(){
		$this->page = new cls_page;
		$this->raintpl = new cls_raintpl;
	}
	
	public function view_draw($config){
		//configure raintpl 
		$this->raintpl->configure('tpl_dir','core/lib/controls/button/tpl/');
		
		//add headers to page
		cls_page::add_header('<script src="./core/lib/controls/button/scripts/ctr_button.js"></script>');
		cls_page::add_header($config['J_ONCLICK_SRC']);
		//cls_page::add_header($config['']);
		$this->raintpl->assign( "id", $config['NAME']);
		$this->raintpl->assign( "label", $config['LABLE']);
		$this->raintpl->assign( "type", $config['TYPE']);
		$this->raintpl->assign( "class", $config['CLASS']);
		$this->raintpl->assign( "j_click", $config['J_ONCLICK_FUNCTION']);
		$this->raintpl->assign( "p_click_f", $config['P_ONCLICK_FUNCTION']);
		$this->raintpl->assign( "p_click_p", $config['P_ONCLICK_PLUGIN']);
		$this->raintpl->assign( "j_afterclick", $config['J_AFTERCLICK_FUNCTION']);
		
		
		if($config['DISABLE']){
			$this->raintpl->assign( "disabled", 'disabled');
		}
		else{
			$this->raintpl->assign( "disabled", 'enabled');
		}
		
		echo $this->raintpl->draw('ctr_button', true );
			
			
	}
}
?>