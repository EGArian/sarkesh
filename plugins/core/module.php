<?php
class core_module extends core_view{

	private $user;
	private $msg;
	private $io;
	function __construct(){
		parent::__construct();
		$this->user = new users;
		$this->msg = new msg;
		$this->io = new cls_io;
	}

	
?>
