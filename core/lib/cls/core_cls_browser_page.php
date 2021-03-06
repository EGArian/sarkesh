<?php
#this class show website and replace blocks
namespace core\cls\browser;
use core\cls\db as db;
use core\cls\core as core;
class page{
	//settings will be saved in this varible
	private static $localize_settings;
	private static $settings ;
	private static $page_tittle;
	private static $blocks;
	private static $plugin;
	
	//this varible store headers of page
	static private $header_tags;
	
	function __construct(){
		
	}
	
	#if active language is RTL this function return true else return false
	
	static public function is_rtl(){
		
		if(self::$localize_settings['direction']=='RTL') {
			return true;
		}
		else {
			return false;
		}
	}

	static function difault_headers () {
		
		if(is_null(self::$settings)){
			$registry =new core\registry;
			self::$settings = $registry->get_plugin('administrator');
			$obj_localize = new core\localize;
			self::$localize_settings = $obj_localize->get_localize();
			self::$page_tittle = self::$localize_settings['name'];
		}
		if(is_null(self::$header_tags)){
			self::$header_tags = array();
		}
		$default_headers = array();
		#LOAD HEEFAL GENERATOR META TAG
		array_push($default_headers, '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />');
		array_push($default_headers, '<meta name="generator" content=" Sarkesh CMS! - Open Source Content Management" />');
		//cache control
		array_push($default_headers, '<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">') ;
		#load jquery
		if(self::$settings['jquery'] == '1'){
			array_push($default_headers, '<script src="./core/ect/scripts/jquery.js"></script>');
			array_push($default_headers, '<script src="./core/ect/scripts/bootstrap.min.js"></script>');
			array_push($default_headers, '<script src="./core/ect/scripts/bootstrap-dialog.js"></script>');
			array_push($default_headers, '<script src="./core/ect/scripts/pace.min.js"></script>');
			array_push($default_headers, '<link rel="stylesheet" type="text/css" href="./core/ect/styles/bootstrap.min.css" />');
			array_push($default_headers, '<link rel="stylesheet" type="text/css" href="./core/ect/styles/default.css" />');
			#load rtl bootstrap
			if (self::is_rtl()){ 
				array_push($default_headers, '<link rel="stylesheet" type="text/css" href="./core/ect/styles/bootstrap-rtl.min.css" />');
			}
			array_push($default_headers, '<link rel="stylesheet" type="text/css" href="./core/ect/styles/bootstrap-dialog.css" />');
			//for more information about normalize project see http://necolas.github.io/normalize.css/
			array_push($default_headers, '<link rel="stylesheet" type="text/css" href="./core/ect/styles/normalize.css" />');
			//get pace(loading in ajax theme
			if(self::$settings['pace_theme'] != '0'){
				array_push($default_headers, '<link rel="stylesheet" type="text/css" href="./core/ect/styles/pace/' . self::$settings['pace_theme'] . '.css" />');
			}
			
			array_push($default_headers, '<meta name="viewport" content="width=device-width, initial-scale=1.0">');
		}
		#load style sheet pages (css)
		$theme_name = self::$settings['active_theme'];
		array_push($default_headers, '<link rel="stylesheet" type="text/css" href="./themes/'  . $theme_name . '/style.css" />');
		#load rtl stylesheets
		if (self::is_rtl()){ 
			array_push($default_headers, '<link rel="stylesheet" type="text/css" href="./themes/'  . $theme_name . '/rtl-style.css" />');
		}

		#load favicon
		if(file_exists("./themes/"  . $theme_name . "/favicon.ico")){ 
			array_push($default_headers, '<link rel="shortcut icon" href="./themes/'. $theme_name .'/favicon.ico" type="image/x-icon">');
			array_push($default_headers, '<link rel="icon" href="./themes/'.$theme_name .'/favicon.ico" type="image/x-icon">');
		}
		
		//load first bootstrap skin
		if(self::$settings['1st_template'] != '0'){
			array_push($default_headers, '<link rel="stylesheet" type="text/css" href="./core/ect/styles/' . self::$settings['1st_template'] . '.min.css" />');
		}
		#load nessasery java script functions
		array_push($default_headers, '<script src="./core/ect/scripts/functions.js"></script>');
		
		self::$header_tags = $default_headers + self::$header_tags;
		
	}
	//this function add headers to page
	static public function add_header($header){
		if(is_null(self::$header_tags)){
			self::$header_tags = array();
		}
		if(!array_key_exists($header, self::$header_tags)){
			self::$header_tags[$header] = $header;
		}
		
		
	}
	
	static function load_headers($show=true){
	      self::difault_headers();
	      #show header tags
		if($show){
			foreach(self::$header_tags as $header){
			      echo $header . "\n";
			}
		}
		else{
			//return $header_tags
			$str_header = '';
			foreach(self::$header_tags as $header){
			      $str_header .=  $header . "\n";
			}
			return $str_header;
		}
	}
	//this function add recived string to page title
	static public function set_page_tittle($tittle = ''){
		//get site name in localize selected
		if(is_null(self::$localize_settings)){
			$obj_localize = new core\localize;
			self::$localize_settings = $obj_localize->get_localize();
			self::$page_tittle = self::$localize_settings['name'];
		}
		self::$page_tittle = self::$localize_settings['name'] . ' | ' . $tittle;
		return self::$page_tittle;
		//now we want to send title to render function.
	}
	//this function return page title usually for runder.php
	static public function get_page_tittle(){
	
		return self::$page_tittle;
	}
	//this function atteche some tags to blocks and show that.
	static public function show_block($header, $body, $view='NONE' ,$type = null, $result = 0){
		$content = '';
		//create special value for access to that
		if($view == 'BLOCK'){
			$content .=  '<div class="panel panel-default panel-small">';
				$content .=  '<div class="panel-heading">';
					$content .=  '<h3 class="panel-title">';
					      //block header show in here
					      $content .=  $header;
					$content .=  '</h3>';
				$content .=  '</div>';
				$content .=  '<div class="panel-body">';
				      //block content show in here
				      $content .=  $body;
				$content .=  '</div>';
			$content .=  '</div>';

		}
		elseif($view == 'MAIN'){
			$content .=  '<div class="">';
				$content .=  '<div class="panel-heading">';
					$content .=  '<h2 class="panel-title">';
					      //block header show in here
					      $content .=  $header;
					$content .=  '</h2>';
				$content .=  '</div>';
				$content .=  '<div class="panel-body">';
				      //block content show in here
				      $content .=  $body;
				$content .=  '</div>';
				
			$content .=  '</div>';
		}
		elseif($view == 'MSG'){
				$content .=  '<div class="alert alert-' . $type . '"> ';
				$content .=  '  <a class="close" data-dismiss="alert">×</a>';
				$content .=  '<strong>'; 
 					//block header show in here
					$content .=  $header;
				$content .=  '</strong>';  
				//block content show in here
				$content .=  $body;
			$content .=  '</div>';
		}
		elseif($view == 'NONE'){;  
			//this type do not support title and ect.
			$content .=  $body;

		}
		elseif($view == 'MODAL'){
			//else it's modal
			$content .=  '<?xml version="1.0"?>' . "\n";
				$content .=  '<message>' . "\n";
					$content .=  '<result>';
						$content .=  $result;
					$content .=  '</result>' . "\n";
					$content .=  '<type>';
						$content .=  $type;
					$content .=  '</type>' . "\n";
					$content .=  '<header>';
						$content .=  $header;
					$content .=  '</header>' . "\n";
					$content .=  '<content>';
						$content .=  $body;
					$content .=  '</content>' . "\n";
					$content .=  '<btn-ok>';
						$content .=  _('Ok');
					$content .=  '</btn-ok>' . "\n";
					$content .=  '<btn-back>';
						$content .=  _('Back');
					$content .=  '</btn-back>' . "\n";
					$content .=  '<btn-cancel>';
						$content .=  _('Cancel');
					$content .=  '</btn-cancel>' . "\n";
				$content .=  '</message>' . "\n";

		}

		return html_entity_decode($content);
	}
	//this function set and show blocks
	static public function set_position($position){
		if(self::$blocks == null){
			//load all blocks data from database
			$db = new db\mysql;
			$query_string = "SELECT b.name AS 'b.name',";
			$query_string .= "b.position AS 'b.position', b.permissions AS 'b.permissions', ";
			$query_string .= "b.pages AS 'b.pages', b.show_header AS 'b.show_header', b.plugin AS 'b.plugin', p.id AS 'p.id', p.name AS 'p.name', b.rank FROM blocks b INNER JOIN plugins p ON b.plugin = p.id ORDER BY b.rank DESC;";
			$db->do_query($query_string);
			self::$blocks = $db->get_array();
			self::$plugin = new core\plugin;

		}
		
		
		//search blocks for position matched
		//if add 'MAIN' to cls_router::show_content that's show like main content that come with url
		//and if add 'BLOCK' tag , sarkesh show that content like block
		//and if Send 'NONE' sarkesh do not show that(just run without view
		foreach( self::$blocks as $block){
		
			if($block['b.position'] == $position){
				//going to process block
				if($block['p.name'] == 'administrator'){
					//going to show content;
					$obj_router = new core\router;
					$obj_router->show_content();
				}
				else{
					//checking that plugin is enabled
					if(self::$plugin->is_enabled($block['p.name'])){
						$ClassName = '\\core\\plugin\\' . $block['p.name'] ;
						$plugin = new $ClassName;
						//run action method for show block
						//all blocks name should be like  'blk_blockname'
						
						$content = call_user_func(array($plugin, $block['b.name']),$position);
						echo self::show_block($content[0], $content[1], 'BLOCK');
					}
				}
			
			}
		
		}
	}
	
	//this function return content for show in custombox for show on page
	static public function show_in_box($header, $content, $type = 'warning', $result = '0'){
		$type = 'type-' . $type;
		self::show_block(true, $header,$content,'MODAL', $type, $result);
	
	}
	static public function show_message($header, $content, $type = 'warning', $result = '0'){
		self::show_block(true, $header,$content,'MSG', $type, $result);
	
	}
	
}
