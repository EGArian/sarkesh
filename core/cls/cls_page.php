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

	public function load_headers () {
	
		#LOAD HEEFAL GENERATOR META TAG
		$header_tags = '<meta name="generator" content=" Sarkesh CMS! - Open Source Content Management" />' ."\n";
		//cache controll
		$header_tags .= '<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">' . "\n";
		#load jquery
		if($this->settings['jquery'] == '1'){
			$header_tags .= "\n" . '<script src="./core/ect/scripts/jquery.js"></script>';
			$header_tags .= "\n" . '<script src="./core/ect/scripts/bootstrap.min.js"></script>';
			$header_tags .= "\n" . '<script src="./core/ect/scripts/bootstrap-dialog.js"></script>';
			$header_tags .= "\n" . '<link rel="stylesheet" type="text/css" href="./core/ect/styles/bootstrap.min.css" />';
			$header_tags .= "\n" . '<link rel="stylesheet" type="text/css" href="./core/ect/styles/bootstrap-dialog.css" />';
			$header_tags .= "\n" . '<link rel="stylesheet" type="text/css" href="./core/ect/styles/bootstrap-theme.min.css" />';
			$header_tags .= "\n" . '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
			$header_tags .= "\n" . '<!-- HTML5 shim for IE backwards compatibility -->';
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
		#load nessasery java script functions
		$header_tags .= "\n" . '<script src="./core/ect/scripts/functions.js"></script>';

		

		#show header tags
		echo $header_tags;
	}
	//this function add recived string to page tittle
	public function set_page_tittle($tittle = ''){
		//get site name in localize selected
		$this->page_tittle = $this->localize_settings['name'] . ' | ' . $tittle;
		return $this->page_tittle;
		//now we wand to send tittle to render.
	}
	//this fuction return page tittle usually for runder.php
	public function get_page_tittle(){
	
		return $this->page_tittle;
	}
	//this function atteche some tags to blocks and show that.
	public function show_block($header, $content, $view ,$type = null){
		if($view == 'BLOCK'){
			echo '<div id="block" class="block">';
				echo '<div id="block-header" class="block-header">';
				      //block header show in here
				      echo $header;
				echo '</div>';
				echo '<div id="block-content" class="block-content">';
				      //block content show in here
				      echo $content;
				echo '</div>';
			echo '</div>';
		}
		elseif($view == 'MAIN'){
			echo '<div id="content" class="content">';
				echo '<div id="content-header" class="content-header">';
				      //block header show in here
				      echo $header;
			      echo '</div>';
			      //block content show in here
			      echo $content;
			echo '</div>';
		}
		else{
			//else it's modal
			echo '<?xml version="1.0"?>' . "\n";
				echo '<message>' . "\n";
					echo '<type>';
						echo $type;
					echo '</type>' . "\n";
					echo '<header>';
						echo $header;
					echo '</header>' . "\n";
					echo '<content>';
						echo $content;
					echo '</content>' . "\n";
					echo '<btn-ok>';
						echo _('Ok');
					echo '</btn-ok>' . "\n";
					echo '<btn-back>';
						echo _('Back');
					echo '</btn-back>' . "\n";
					echo '<btn-cancel>';
						echo _('Cancel');
					echo '</btn-cancel>' . "\n";
				echo '</message>' . "\n";

		}
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
					$obj_plugin = new cls_plugin;
					$plugin = $obj_plugin->get_object($block['p.name']);
					//run action metod for show block
					//all blocks name shoud be like  'blk_blockname'
					$plugin->action($block['b.name'], 'BLOCK');
				}
			
			}
		
		}
	}
	
	//this function return content for show in custombox for show on page
	public function show_in_box($header, $content, $type = 'warning'){
		$type = 'type-' . $type;
		$this->show_block($header,$content,'MODAL', $type);
	
	}
}
