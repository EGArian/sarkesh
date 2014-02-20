<?php
class captcha_controller{
	private $view;
	private $madule;
	
	function __construct(){
		$this->view = new captcha_view;
		$this->madule = new captcha_madule;
	}
	public function action($action){
		if($action == 'draw_full'){
			
			$this->view->captcha_show_full();
		}	
	}
	public function service($service){
		 //show captcha image
		 if($service == 'draw'){
			$this->madule->draw();
		 }
		 elseif($service == 'draw_full'){
		 	echo $this->view->captcha_show_full();	
		 }
		 elseif($service == 'solve'){
			if($this->madule->solve()){
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