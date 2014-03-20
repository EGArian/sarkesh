<?php
class content_view{

	private $page;
	private $raintpl;
	//this varible is for use calendar plugin
	private $calendar;
	//this varible store all settings of this plugin
	private $settings;
	private $registry;
	//this varible is an object from users_module
	private $users;
	function __construct(){
		//config raintpl
		$this->raintpl = new cls_raintpl;
		$this->users = new users_module;
		$this->page = new cls_page;
		$this->calendar = new calendar_module;
		$this->registry = new cls_registry;
		$this->settings = $this->registry->get_plugin('content');
	}
	
	//this function show single content
	public function show_page_content($content, $view){
		$this->raintpl->configure("tpl_dir", "plugins/content/tpl/" );

		if($content == null){
			//page not found show 404 msg
			echo '404 not found!!!';
		}
		else{
			//check permation to show
			// WARRNING : UNDER DEVELOPMENT
			if(1==1){
				//user has permation
				//going to show content
				$this->raintpl->assign( "by", _('by'));
				//get date of post
				$this->raintpl->assign( "post_date", $this->calendar->sdate($this->settings['date_format'],$content[0][0]['date_publish']));
				//get user info
				$user = $this->users->get_user_info($content[0][0]['user'] , 'id');
				$this->raintpl->assign( "post_author", $user['username']);
				$this->raintpl->assign( "post_author_profile", cls_general::create_url(array('plugin','users','action','user_profile','username','morrning')));
				//assign fields
				$this->raintpl->assign( "post_content", $content[1]);
				
				$this->page->show_block(true,  $content[0][0]['tittle'] , $this->raintpl->draw( 'page_content', true ), $view);
			}
			else{
				//access denied
				echo 'you do not has permation to see this page';
			
			}
			
		
		}
	
	}
	
	
}
?>