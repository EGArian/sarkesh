<?php
class ctr_tabbar_view{
	
	private $raintpl;
	
	function __construct(){
		$this->raintpl = new cls_raintpl;
		$this->raintpl->configure("tpl_dir","./core/lib/controls/tabbar/");
	}
	public function view_draw($tabs,$config){
		$this->raintpl->assign("tabs",$tabs);
		$this->raintpl->assign("id",$config['NAME']);
		$this->raintpl->assign("active_tab",$config['ACTIVE_TAB']);
		return $this->raintpl->draw("ctr_tabbar",true);
	}
}
?>
