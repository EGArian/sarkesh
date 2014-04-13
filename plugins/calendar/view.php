<?php
	class calendar_view{

		private $raintpl;
		private $cache;
		function __construct(){
			//config raintpl
			$this->raintpl = new cls_raintpl;
		}
		
		public function select_date($type='', $view, $show = true){

			if($type == 'gregorian'){
				return $this->show_gregorian_calendar_selector($view, $show);
			}
			elseif($type == 'jallali'){
				return $this->show_shamsi_calendar_selector($view, $show);
			}	
		}
		private function show_shamsi_calendar_selector($view , $show = true){
					
			$this->raintpl->configure("tpl_dir", "plugins/calendar/tpl/" );
			$this->cache = $this->raintpl->cache('calendar_jallali_selector', 60);
			if($this->cache){
				if($show){
					cls_page::show_block(false,  _('Select Date') , $this->cache, $view);
				}
				else{
				
					return $this->cache;
				}
			}
			else{
		
				//add tag for show messages
				if($show){
					cls_page::show_block(false,  _('Select Date') , $this->raintpl->draw( 'calendar_jallali_selector', true ), $view);				}
				else{
					return $this->raintpl->draw( 'calendar_jallali_selector', true );
				}
				
			}
			return _('Select Date');
		
		}
		private function show_gregorian_calendar_selector($view, $show = true){
		
			$this->raintpl->configure("tpl_dir", "plugins/calendar/tpl/" );
			$this->cache = $this->raintpl->cache('calendar_gregorian_selector', 60);
			if($this->cache){
				if($show){
					cls_page::show_block(false,  _('Select Date') , $this->cache, $view);
				}
				else{
				
					return $this->cache;
				}
			}
			else{
		
				//add tag for show messages
				if($show){
					cls_page::show_block(false,  _('Select Date') , $this->raintpl->draw( 'calendar_gregorian_selector', true ), $view);				}
				else{
					return $this->raintpl->draw( 'calendar_gregorian_selector', true );
				}
				
			}
			return _('Select Date');
		
		}
      
}
?>