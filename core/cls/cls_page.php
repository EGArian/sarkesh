<?php
#this class show website and replace blocks

class cls_page{
	//settings will be saved in this varible
	private $localize_settings;
	private $settings ;
	private $page_tittle;
	private $blocks;
	private $db;
	private $registry;
	function __construct(){
		$this->registry =new cls_registry;
		$this->settings = $this->registry->get_plugin('core');
		$obj_localize = new cls_localize;
		$this->localize_settings = $obj_localize->get_localize();
		$this->page_tittle = $this->localize_settings['name'];
		//load all blocks data from database
		$this->db = new cls_database;
		$query_string = "SELECT b.name AS 'b.name',";
		$query_string .= "b.position AS 'b.position', b.permations AS 'b.permations', ";
		$query_string .= "b.pages AS 'b.pages', b.show_header AS 'b.show_header', b.plugin AS 'b.plugin', p.id AS 'p.id', p.name AS 'p.name', b.rank FROM " . TablePrefix . "blocks b INNER JOIN plugins p ON b.plugin = p.id ORDER BY b.rank DESC;";
		
		$this->db->do_query($query_string);
		$this->blocks = $this->db->get_array();

	}
	
	#if active language is RTL this function return true else return false
	
	public function is_rtl(){
		
		if($this->localize_settings['direction']=='RTL') {
			return true;}
		else {
			return false;}
	}

	public function load_headers ($show = true) {
	
		#LOAD HEEFAL GENERATOR META TAG
		$header_tags = '<meta name="generator" content=" Sarkesh CMS! - Open Source Content Management" />' ."\n";
		//cache controll
		$header_tags .= '<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">' . "\n";
		#load jquery
		if($this->settings['jquery'] == '1'){
			$header_tags .= "\n" . '<script src="./core/ect/scripts/jquery.js"></script>';
			$header_tags .= "\n" . '<script src="./core/ect/scripts/bootstrap.min.js"></script>';
			$header_tags .= "\n" . '<script src="./core/ect/scripts/bootstrap-dialog.js"></script>';
			$header_tags .= "\n" . '<script src="./core/ect/scripts/pace.min.js"></script>';
			$header_tags .= "\n" . '<link rel="stylesheet" type="text/css" href="./core/ect/styles/bootstrap.min.css" />';
			$header_tags .= "\n" . '<link rel="stylesheet" type="text/css" href="./core/ect/styles/bootstrap-dialog.css" />';
			//for more information about normalize project see http://necolas.github.io/normalize.css/
			$header_tags .= "\n" . '<link rel="stylesheet" type="text/css" href="./core/ect/styles/normalize.css" />';
			//get bootstrap theme
			$header_tags .= "\n" . '<link rel="stylesheet" type="text/css" href="./core/ect/styles/bootstrap/' . $this->settings['bootstrap_theme'] . '.min.css" />';
			//get pace(loading in ajax theme
			if($this->settings['pace_theme'] != '0'){
				$header_tags .= "\n" . '<link rel="stylesheet" type="text/css" href="./core/ect/styles/pace/' . $this->settings['pace_theme'] . '.css" />';
			}
			$header_tags .= "\n" . '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
		}
		#load style sheet pages (css)
		$header_tags .= '<link rel="stylesheet" type="text/css" href="./themes/'  . $this->localize_settings['theme'] . '/style.css" />' . "\n";
		#load rtl stylesheets
		if ($this->is_rtl()){ 
			$header_tags .= '<link rel="stylesheet" type="text/css" href="./themes/'  . $this->localize_settings['theme'] . '/rtl-style.css" />' . "\n";
		}

		#load favicon
		if(file_exists("./themes/"  . $this->localize_settings['theme'] . "/favicon.ico")){ 
			$header_tags .= '<link rel="shortcut icon" href="./themes/'.$this->localize_settings['theme'] .'/favicon.ico" type="image/x-icon">';
			$header_tags .= "\n" . '<link rel="icon" href="./themes/'.$this->localize_settings['theme'] .'/favicon.ico" type="image/x-icon">';
		}
		//enable texteditor if that's enabled from registery
		//for enable editor textarea tag should has class with 'editor' name

		if($this->settings['editor'] == '1'){
			$obj_localize = new cls_localize;
			$header_tags .= "\n" . '<script src="./core/ect/scripts/tinymce/tinymce.min.js"></script>';
			$header_tags .= "\n" . "<script> tinymce.init({selector:'textarea.editor',directionality: " . '"' . $this->localize_settings['direction'] . '",language: "' . $obj_localize->convert_language_code($this->localize_settings['language']) .'"});</script>';

                         
		}
		#load nessasery java script functions
		$header_tags .= "\n" . '<script src="./core/ect/scripts/functions.js"></script>';
	      
		

		#show header tags
		if($show){
			echo $header_tags;
		}
		else{
			//return $header_tags
			return $header_tags;
		}
	}
	//this function add recived string to page tittle
	public function set_page_tittle($tittle = ''){
		//get site name in localize selected
		//$this->page_tittle = $this->localize_settings['name'] . ' | ' . $tittle;
		return $this->page_tittle;
		//now we wand to send tittle to render.
	}
	//this fuction return page tittle usually for runder.php
	public function get_page_tittle(){
	
		return $this->page_tittle;
	}
	//this function atteche some tags to blocks and show that.
	public function show_block($show, $header, $body, $view ,$type = null, $result = 0){
		$content = '';
		//create special value for access to that
		if($view == 'BLOCK'){
			$content .=  '<div class="panel panel-default">';
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
			$content .=  '<div class="well well-sm">';
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
			//this type do not support tittle and ect.
			$content .=  $body;

		}
		else{
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
						$content .=  $content;
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
		if($show){
			echo $content;
		}
		return $content;
	}
	//this function set and show blocks
	public function set_position($position){
		//search blocks for position matched
		//if add 'MAIN' to cls_router::show_content that's show like main content that come with url
		//and if add 'BLOCK' tag , sarkesh show that content like block
		//and if Send 'NONE' sarkesh do not show that(just run without view
		foreach( $this->blocks as $block){
		
			if($block['b.position'] == $position){
				//going to proccess block
				if($block['p.name'] == 'core'){
					//going to show content;
					$obj_router = new cls_router;
					$obj_router->show_content();
				}
				else{
					$plugin_name = $block['p.name'] . '_controller';
					$plugin = new $plugin_name;
					//run action metod for show block
					//all blocks name shoud be like  'blk_blockname'
					 // create local domain
					bindtextdomain($this->localize_settings['language'], './plugins/' . $block['p.name'] .'/languages/');
					$plugin->action($block['b.name'], 'BLOCK', $position);
					//back localize to theme
					bindtextdomain($this->localize_settings['language'], './themes/' . $this->localize_settings['theme'] .'/languages/');
					  
					
				}
			
			}
		
		}
	}
	
	//this function return content for show in custombox for show on page
	public function show_in_box($header, $content, $type = 'warning', $result = '0'){
		$type = 'type-' . $type;
		$this->show_block($header,$content,'MODAL', $type, $result);
	
	}
	public function show_message($header, $content, $type = 'warning', $result = '0'){
		$this->show_block($header,$content,'MSG', $type, $result);
	
	}
	
}
