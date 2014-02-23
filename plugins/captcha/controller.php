<?php
class captcha_controller{
	private $view;
	private $module;
	
	function __construct(){
		$this->view = new captcha_view;
		$this->module = new captcha_module;
	}
	public function action($action){
		if($action == 'draw_full'){
			
			echo $this->view->captcha_show_full();
		}	
	}
	public function service($service){
		 //show captcha image
		 if($service == 'draw'){
			$this->module->draw();
		 }
		 elseif($service == 'draw_full'){
		 	echo $this->view->captcha_show_full();	
		 }
		 elseif($service == 'solve'){
			if($this->module->solve()){
				echo 1;
			}
			else{
				echo 0;
			}
		 }
	
	}
	
	//this function return captcha panel
	public function get_captcha(){
		return $this->view->captcha_show_full();	
	}
	

}
?>