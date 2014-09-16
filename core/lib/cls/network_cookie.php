<?php
#REQ = IO
#this class is for control cookies
namespace network;
class cookie{
	private $obj_io;
	function __construct(){
		$this->obj_io = new \network\io;
	}
	public function is_set($cookie_name){

		if(isset($_COOKIE[$cookie_name])){return true;}
		return false;
	}
	public function set($cookie_name, $cookie_value){
		$boj_registry = new \core\registry;
		$settings = $boj_registry->get_plugin('core');
		setcookie($cookie_name,$cookie_value,time() + $settings['cookie_max_time']);
		return true;
	}
	public function get($cookie_name){
		if(isset($_COOKIE[$cookie_name])){ 
			return $this->obj_io->cin($cookie_name,'cookie');	
		}
		
	}
}

?>
