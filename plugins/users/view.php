<?php
class users_view{
	private $obj_page;
	private $raintpl;
	
	function __construct(){
		//config raintpl
		cls_raintpl::configure("tpl_dir", "plugins/users/tpl/" );
		$this->raintpl = new cls_raintpl;
		$this->obj_page = new cls_page;
		
	}
	
	public function show_login_page($view){
	
	
		if( $cache = $this->raintpl->cache('users_login', 60) ){
			$this->obj_page->show_block( _('User Sign in') , $cache, $view);
			}
		else{
		//add tag for show messages
		$this->raintpl->assign( "label_username", _('Username:') );
		$this->raintpl->assign( "label_password", _('Password:') );
		$this->raintpl->assign( "username", _('Username') );
		$this->raintpl->assign( "remember_me", _('Remember me!') );
		$this->raintpl->assign( "sign_in", _('Sign in') );
		$this->obj_page->show_block( _('User Sign in') , $this->raintpl->draw( 'users_login', true ), $view);
		}
	}
	
	public function show_user_page($view){
		if( $cache = $this->raintpl->cache('users_page', 60) ){
			$this->obj_page->show_block( _('User State') , $cache, $view);
		}
		else{
			$this->raintpl->assign( "hello", _('Hello!') );
			$this->raintpl->assign( "username", "babak" );
			$this->raintpl->assign( "logout", _('Log out') );
			$this->obj_page->show_block( _('User State') , $this->raintpl->draw( 'users_page', true ), $view);
		}
	}
	public function show_register_page(){
		echo '<h1>' . _('Sign Up') . '<h1>';
	}
	public function show_in_box($header, $content, $show_close = true){
		$this->obj_page->show_in_box($header, $content, $show_close);
	}
}
?>