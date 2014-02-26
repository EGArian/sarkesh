<?php
	class pezeshkan_view{
	
		private $obj_page;
		private $raintpl;
		private $cache;
		function __construct(){
			//config raintpl
			$this->raintpl = new cls_raintpl;
			$this->obj_page = new cls_page;
		}
		
		public function show_insert_doctor($view){
		$this->raintpl->configure("tpl_dir", "plugins/pezeshkan/tpl/" );
		$this->cache = $this->raintpl->cache('pezeshkan_insert_doctor', 60);
		if($this->cache){
			$this->obj_page->show_block( _('Add new doctor') , $this->cache, $view);
			}
		else{
	
		//add tag for show messages
		$this->raintpl->assign( "label_doctor_name", _('Doctor name:') );
		$this->raintpl->assign( "doctor_name", _("Doctor name") );
		$this->raintpl->assign( "label_doctor_specialty", _('Specialty:') );
		$this->raintpl->assign( "doctor_specialty", _('Specialty') );
		$this->raintpl->assign( "save", _('Save') );
		$this->raintpl->assign( "Cancel", _('Cancel') );
		$this->obj_page->show_block( _('Add new doctor') , $this->raintpl->draw( 'pezeshkan_insert_doctor', true ), $view);
		}
		return _('Users Login');
	}
	}
?>