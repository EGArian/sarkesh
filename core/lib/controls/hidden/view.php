<?php
class ctr_hidden_view{
	private $raintpl;
	
	function __construct(){
		$this->raintpl = new cls_raintpl;
		$this->raintpl->configure("tpl_dir",'./core/lib/controls/hidden/');
	}
	public function view_draw($e){
		$this->raintpl->assign("name",$e['NAME']);
		$this->raintpl->assign("value",$e['VALUE']);
		$this->raintpl->assign("form",$e['FORM']);
		return $this->raintpl->draw("ctr_hidden",true);
	}
}
?>
