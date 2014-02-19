<?php
class captcha_madule{
	private $view;
	
	function __construct(){
	
		$this->view = new captcha_view;
		
	}
	//this function draw captcha image and save id in session[captcha]
	//[code]
	public function draw(){
		$captcha = new cls_captcha;
		$_SESSION['captcha'] = $captcha->get_info();
		$captcha->draw();
	
	}
	public function solve(){
		if(isset($_GET['captcha']) && $_GET['captcha'] == $_SESSION['captcha']['code']){
		  return true;
		}
		return false;
	}

}
?>