<?php
namespace core\control\hidden;
use \core\cls\template as template;
use \core\cls\browser as browser;
class view{
	private $raintpl;
	
	function __construct(){
		$this->raintpl = new template\raintpl;
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
