<?php
class captcha_controller{
	private $view;
	private $madule;
	
	function __construct(){
		$this->view = new captcha_view;
		$this->madule = new captcha_madule;
	}
	
	public function service($service){
		 //show captcha image
		 if($service == 'draw'){
			$this->madule->draw();
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
	//this function control actions for show pages to viewer
	public function action($action){
		echo $this->add_email_template('body of message','subject');
	
	}
	
	public function add_email_template($body, $subject){
		//this function just return content with template
		return $this->view->add_template($body, $subject);
	}


}
?>