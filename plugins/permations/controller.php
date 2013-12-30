<?php
class permations_controller{
	private $view;
	private $madule;
	
	function __construct($madule, $view){
		$this->view = $view;
		$this->madule = $madule;
	}
	
	public function action($action_name){
		echo 'permation plugin';
		

	}


}
?>