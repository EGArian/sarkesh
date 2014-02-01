<?php
class languages_controller{
	private $view;
	private $madule;
	private $obj_localize;
	private $obj_io;
	private $service_result;

	function __construct($view, $madule){
		$this->view = $view;
		$this->madule = $madule;
		//-------------
		$this->obj_localize = new cls_localize;
		$this->obj_io = new cls_io;
	}
	//this function control request and show UI
	public function action($action_name, $view){
		if($action_name == 'language_select'){
			//going to show language selection
			$user_language = $this->obj_localize->get_language();
			$languages = $this->madule->get_languages($user_language);
			$this->view->languages_show($languages, $view);
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