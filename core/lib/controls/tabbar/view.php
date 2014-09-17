<?php
namespace core\control\tabbar;
use \core\cls\template as template;
use \core\cls\browser as browser;
class view{	
	private $raintpl;
	function __construct(){
		$this->raintpl = new template\raintpl;
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
