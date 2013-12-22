<?php
class cls_general{
private $settings;

	function __construct(){
		$db = new cls_database;
		$db->do_query("select * from " . TablePrefix . "settings;");
		$this->settings = $db->get_first_row_array();
	}
	#this function return system settings
	public function get_settings(){
		return $this->settings;
	}

	#this function is for refresh page and jump to address
	public function site_refresh($url='0',$inner_url=true , $time=5){
		if($url=='0'){$url= SiteRoot;}
		elseif($inner_url && $url != '0'){ $url= SiteRoot . $url;}
		header("Refresh: $time ; url=$url");
	}
	public function Jump_Page($url,$inner_url=true){
		if(!$inner_url && $url != SiteRoot){ $url= SiteRoot . $url;}
		elseif($url==SiteRoot){ $url= SiteRoot;}
		header("Location:$url");
		/* Make sure that code below does not get executed when we redirect. */
		exit;
	}
	#this function set last page that visited
	
	public function set_last_page($url=''){
		if($url!=''){ $last_url=$url;}
		else{ $last_url = $_SERVER['HTTP_REFERER'];}
		
		if($last_url!=''){
			setcookie('SYS_LAST_PAGE',$last_url);
		}
		else{
			setcookie('SYS_LAST_PAGE',SiteRoot);
		}
	}
	#this function jump page that set by function set_last_visited_page
	
	public function jump_last_page(){
		$obj_io = new sys_io;
		if(isset($_COOKIE['SYS_LAST_PAGE'])){
			header('Location: '. $obj_io->cin('SYS_LAST_PAGE','cookie'));
		}
		else{ 
			header('Location: ' . SiteRoot );
		}
	}	
	#this function return cerrent address of page(cerent url)
	
	public function this_url(){
		return $_SERVER['REQUEST_URI'];	
	}

	
	#this function is for create raundom string
	
	public function get_random_string($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $string = '';    
    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters)-1)];
    }
    return $string;
	}
	

}