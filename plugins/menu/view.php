<?php
class menu_view{
	//this is an object of cls_page class
	private $page;
	
	public function __construct(){
		$this->raintpl = new cls_raintpl;
		$this->page = new cls_page;
	      }
	
	//this function use cls_page and raintpl for show hello world message
	public function show_menus($view, $links){
		$this->raintpl->configure("tpl_dir", "plugins/menu/tpl/" );
		//add tag for show messages
		//check nessasary links
		if($links[0]['url'] = '<FRONT>'){
			$links[0]['url'] = '';
		}
		$this->raintpl->assign( "links", $links );
		if($links[0]['m.direction'] == 'v'){
			//select vertical menu template
			$menu = $this->raintpl->draw( 'show_simple_menu_v', true );
		}
		else{
			$menu = $this->raintpl->draw( 'show_simple_menu_h', true );
		}
		//going to find that show header or not
		if($links[0]['m.header'] != ''){
			//show menu in block with menu
			$this->page->show_block(true,  $links[0]['m.header'] , $menu, $view);

		}
		else{
			//going to show without header
			echo $menu;
		}
		return 1;
	}
}
?>