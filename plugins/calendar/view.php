<?php
	class calendar_view{

		private $obj_page;
		private $raintpl;
		private $cache;
		function __construct(){
			//config raintpl
			$this->raintpl = new cls_raintpl;
			$this->obj_page = new cls_page;
		}
		
		public function select_date($type='gregorian', $view){
			if($type == 'gregorian'){
				$this->show_gregorian_calendar_selector($view);
			}
			elseif($type == 'shamsi'){
				$this->show_shamsi_calendar_selector($view);
			}
		}
		private function show_shamsi_calendar_selector($view){
			$this->raintpl->configure("tpl_dir", "plugins/calendar/tpl/" );
			$this->cache = $this->raintpl->cache('calendar_shamsi_selector', 60);
			if($this->cache){
				$this->obj_page->show_block( _('Select Date') , $this->cache, $view);
				}
			else{
		
				//add tag for show messages
				$this->raintpl->assign( "label_doctor_name", _('Doctor name:') );

				$this->obj_page->show_block( _('Select Date') , $this->raintpl->draw( 'calendar_shamsi_selector', true ), $view);
			}
			return _('Select Date');
		
		}
		private function show_gregorian_calendar_selector($view){
			$this->raintpl->configure("tpl_dir", "plugins/calendar/tpl/" );
			$this->cache = $this->raintpl->cache('calendar_gregorian_selector', 60);
			if($this->cache){
				$this->obj_page->show_block( _('Select Date') , $this->cache, $view);
				}
			else{
		
				//add tag for show messages
				$this->raintpl->assign( "label_doctor_name", _('Doctor name:') );

				$this->obj_page->show_block( _('Select Date') , $this->raintpl->draw( 'calendar_gregorian_selector', true ), $view);
			}
			return _('Select Date');
		
		}
      
}
?>