<?php
class email_controller{
	private $view;
	private $madule;
	
	function __construct(){
		$this->view = new email_view;
		$this->madule = new email_madule;
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