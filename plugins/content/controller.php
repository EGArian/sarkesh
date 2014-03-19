<?php
class content_controller{
	private $view;
	private $module;
	private $obj_localize;
	private $obj_io;
	private $service_result;

	function __construct(){
		$this->view = new content_view;
		$this->module = new content_module;
		//-------------
		$this->obj_localize = new cls_localize;
		$this->obj_io = new cls_io;
	}
	//this function control request and show UI
	public function action($action_name, $view){
		if($action_name == 'show'){
			//seperate between show catalogy or page
			if(isset($_GET['id'])){
				//going to show page
				$this->module->show_page_content();
			}
			elseif(isset($_GET['catalog'])){
				//going to show catalogy
				$this->module->show_catalog_content();
			}
		}

	}
	//service do not has any user interface
	//it just return text
	public function service($service_name){
		if($service_name == 'change'){
			//going to change localize
			if(isset($_GET['lang'])){
				//change language
				$lang = $this->obj_io->cin('lang', 'get');
				$this->obj_localize->set_language($lang);
				//change successfull return 1
				$this->service_result = 1;
			}
			else{
				//changing language system has some problem
				$this->view->show_in_box(_('message'), _('changing language has some problem! Please try again later.'), true);
			}
		}
	
	//show result of service
	echo $this->service_result;
	}
	


}
?>