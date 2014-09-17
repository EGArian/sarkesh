<?php
namespace core\control\form;
use \core\cls\template as template;
use \core\cls\browser as browser;
class view{
	
	private $raintpl;
	
	function __construct(){
		$this->raintpl = new template\raintpl;
		$this->raintpl->configure("tpl_dir","./core/lib/controls/form/");
	}
	public function view_draw($e,$config){
		$this->raintpl->assign("e",$e);
		$this->raintpl->assign("size",$config['SIZE']);
		$this->raintpl->assign("inline",$config['INLINE']);
		$this->raintpl->assign("name",$config['NAME']);
		$this->raintpl->assign("panel",$config['PANEL']);
		$this->raintpl->assign("label",$config['LABEL']);
		$this->raintpl->assign("type",$config['TYPE']);
		return $this->raintpl->draw("ctr_form",true);
	}
}
?>
