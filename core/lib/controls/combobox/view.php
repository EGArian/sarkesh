<?php
class ctr_combobox_view{
	
	private $raintpl;
	private $page;
	function __construct(){
		$this->page = new cls_page;
		$this->raintpl = new cls_raintpl;
	}
	
	public function view_draw($config, $show){
		//configure raintpl //
		$this->raintpl->configure('tpl_dir','core/lib/controls/combobox/tpl/');
		
		//add headers to page//
		cls_page::add_header('<script src="./core/ect/scripts/events/functions.js"></script>');		
		if($config['SCRIPT_SRC'] != ''){cls_page::add_header('<script src="' . $config['SCRIPT_SRC'] . '"></script>'); }		
		if($config['CSS_FILE'] != ''){ cls_page::add_header('<link rel="stylesheet" type="text/css" href="' . $config['CSS_FILE']) . '" />';}
		
		//Assign variables
		$this->raintpl->assign( "id", $config['NAME']);
		$this->raintpl->assign( "form", $config['FORM']);
		$this->raintpl->assign( "value", $config['VALUE']);
		$this->raintpl->assign( "label", $config['LABEL']);
		
		$elements = [];
		
		if($config['COLUMN_LABELS'] == ''){
			//WANT TO SHOW SIMPLE ARRAY
			$indexes = array_keys($config['SOURCE']);
			foreach($config['SOURCE'] as $keys => $source){
				$elements[$keys]['label'] = $source;
				$elements[$keys]['value'] = $source;
			}
		}
		else{
			//want to bind control to table
			foreach($config['TABLE'] as $keys => $source){
				$elements[$keys]['label'] = $source[$config['COLUMN_LABELS']];
				$elements[$keys]['value'] = $source[$config['COLUMN_VALUES']];
			}
		} 
		
		$this->raintpl->assign( "source", $elements);
		$this->raintpl->assign( "size", $config['SIZE']);
		$this->raintpl->assign( "help", $config['HELP']);
		$this->raintpl->assign( "bs_control", $config['BS_CONTROL']);
		$this->raintpl->assign( "inline", $config['INLINE']);
		$this->raintpl->assign( "styles", $config['STYLE']);
		$this->raintpl->assign( "class", $config['CLASS']);
		$this->raintpl->assign( "j_onchange", $config['J_ONCHANGE']);
		$this->raintpl->assign( "p_onchange_f", $config['P_ONCHANGE_FUNCTION']);
		$this->raintpl->assign( "p_onchange_p", $config['P_ONCHANGE_PLUGIN']);
		$this->raintpl->assign( "j_after_onchange", $config['J_AFTER_ONCHANGE']);
		
		if($config['DISABLE']){
			$this->raintpl->assign( "disabled", 'disabled');
		}
		else{
			$this->raintpl->assign( "disabled", 'enabled');
		}
		
		
		//return control
		$ctr = $this->raintpl->draw('ctr_combobox', true );
		if($show){
			echo $ctr;
		}	
		return $ctr;
			
	}
}
?>
