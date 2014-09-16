<?php
namespace plugin\languages;
class view{

	private $raintpl;
	function __construct(){
		//config raintpl
		$this->raintpl = new \template\raintpl;
		$this->raintpl->configure("tpl_dir", "plugins/languages/tpl/" );
	}
	
	public function view_select_lang($languages){
		//$form = new \control\form('languages');
		$lang = new \control\combobox;
		$lang->configure('NAME','lang');
		$lang->configure('LABEL','');
		$lang->configure('TABLE',$languages);
		$lang->configure('SIZE',12);
		$lang->configure('COLUMN_LABELS','language_name');
		$lang->configure('COLUMN_VALUES','language');
		$lang->configure('SCRIPT_SRC',"./plugins/languages/scripts/languages.js");
		$lang->configure('J_AFTER_ONCHANGE','languages_check_change');
		$lang->configure('P_ONCHANGE_PLUGIN','languages');
		$lang->configure('P_ONCHANGE_FUNCTION','languages_onchange');
		//$form->add($lang);
		return array(_('Languages'), $lang->draw());
		
	}
	
}
?>
