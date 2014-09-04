<?php
class ctr_radiobuttons_module extends ctr_radiobuttons_view{
	
	private $body;
	function __construct(){
		parent::__construct();
		$this->body = [];
	}
	protected function module_draw($e,$c){
		foreach( $e as $element){
			$body['body'] = $element->draw();
			array_push($this->body,$body );
		}
		return $this->view_draw($this->body,$c);
	}
}
?>
