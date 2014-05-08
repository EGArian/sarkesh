<?php
class ctr_form_view{
	
	private $raintpl;
	
	function __construct(){
		$this->raintpl = new cls_raintpl;
		$this->raintpl->configure("tpl_dir","./core/lib/controls/form/");
	}
	public function view_draw($e){
		$this->raintpl->assign("e",$e);
		return $this->raintpl->draw("ctr_form",true);
	}
}
?>
