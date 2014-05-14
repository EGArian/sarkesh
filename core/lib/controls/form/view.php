<?php
class ctr_form_view{
	
	private $raintpl;
	
	function __construct(){
		$this->raintpl = new cls_raintpl;
		$this->raintpl->configure("tpl_dir","./core/lib/controls/form/");
	}
	public function view_draw($e,$config){
		$this->raintpl->assign("e",$e);
		$this->raintpl->assign("size",$config['SIZE']);
		$this->raintpl->assign("inline",$config['INLINE']);
		$this->raintpl->assign("name",$config['NAME']);
		return $this->raintpl->draw("ctr_form",true);
	}
}
?>
