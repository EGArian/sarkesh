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
	//this function show login page for enter username and password
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
		$this->raintpl->assign( "forget_password", _('Forget your password?') );
		$this->obj_page->show_block( _('User Sign in') , $this->raintpl->draw( 'users_login', true ), $view);
		}
	}
	//this function show user page (like profile)
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
	//this function show forget password page for reset password
	public function show_forget_password_page($view){
	
		if( $cache = $this->raintpl->cache('users_forget_password', 60) ){
			$this->obj_page->show_block( _('Reset password') , $cache, $view);
		}
		else{
			$this->raintpl->assign( "email", _('Email') );
			$this->raintpl->assign( "label_email", _('Email:') );
			$this->raintpl->assign( "reset_password_note", "Enter your email and we send reset password request to your email.");
			$this->raintpl->assign( "send_recover_email", _('Send email') );
			$this->obj_page->show_block( _('Reset password') , $this->raintpl->draw( 'users_forget_password', true ), $view);
		}
	}
	
	public function show_reset_password_page($view){
		if( $cache = $this->raintpl->cache('users_reset_password', 60) ){
			$this->obj_page->show_block( _('Input reset code') , $cache, $view);
		}
		else{
			$this->raintpl->assign( "label_code", _('Code') );
			$this->raintpl->assign( "reset_code", _('Your reset code') );
			$this->raintpl->assign( "reset_password", _('Reset password'));
						$this->raintpl->assign( "reset_password_note", "For reset your password enter code that you get from your email.");
			$this->obj_page->show_block( _('Reset password') , $this->raintpl->draw( 'users_reset_password', true ), $view);
		}
	}
	public function show_register_page(){
		echo '<h1>' . _('Sign Up') . '<h1>';
	}
	public function show_in_box($header, $content, $type = 'warrning'){
		$this->obj_page->show_in_box($header, $content, $type);
	}
}
?>