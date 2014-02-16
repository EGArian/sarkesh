<?php
class users_view{
	private $obj_page;
	private $raintpl;
	private $cache;
	function __construct(){
		//config raintpl
		//cls_raintpl::configure("tpl_dir", "plugins/users/tpl/" );
		$this->raintpl = new cls_raintpl;
		$this->raintpl->configure("tpl_dir", "plugins/users/tpl/" );
		$this->obj_page = new cls_page;
		
	}
	//this function show login page for enter username and password
	public function show_login_page($view){
		 $this->cache = $this->raintpl->cache('users_login', 60);
		if($this->cache){
			$this->obj_page->show_block( _('User Sign in') , $this->cache, $view);
			}
		else{
		// can register
		$registery = new cls_registry;
		$this->raintpl->assign( "can_register", $registery->get('users', 'register') );
		//add tag for show messages
		$this->raintpl->assign( "label_username", _('Username:') );
		$this->raintpl->assign( "dont_have_account", _("Don't have account?") );
		$this->raintpl->assign( "signup", _('Sign up') );
		$this->raintpl->assign( "label_password", _('Password:') );
		$this->raintpl->assign( "username", _('Username') );
		$this->raintpl->assign( "remember_me", _('Remember me!') );
		$this->raintpl->assign( "sign_in", _('Sign in') );
		$this->raintpl->assign( "forget_password", _('Forget your password?') );
		$this->obj_page->show_block( _('User Sign in') , $this->raintpl->draw( 'users_login', true ), $view);
		}
		return _('Users Login');
	}
	//this function show user page (like profile)
	//warrning this function do not show username cerrectly
	public function show_user_page($view){
		$this->cache = $this->raintpl->cache('users_page', 60);
		if( $this->cache){
			$this->obj_page->show_block( _('User State') , $this->cache, $view);
		}
		else{
			$this->raintpl->assign( "hello", _('Hello!') );
			$this->raintpl->assign( "username", '$username' );
			$this->raintpl->assign( "logout", _('Log out') );
			$this->obj_page->show_block( _('User State') , $this->raintpl->draw( 'users_page', true ), $view);
		}
	}
	//this function show forget password page for reset password
	public function show_forget_password_page($view){
		$this->cache = $this->raintpl->cache('users_forget_password', 60);
		if( $this->cache){
			$this->obj_page->show_block( _('Reset password') , $this->cache, $view);
		}
		else{
			$this->raintpl->assign( "email", _('Email') );
			$this->raintpl->assign( "label_email", _('Email:') );
			$this->raintpl->assign( "reset_password_note", "Enter your email and we send reset password request to your email.");
			$this->raintpl->assign( "send_recover_email", _('Send email') );
			$this->obj_page->show_block( _('Reset password') , $this->raintpl->draw( 'users_forget_password', true ), $view);
		}
		return _('Reset password');
	}
	
	public function show_reset_password_page($view){
		$this->cache == $this->raintpl->cache('users_reset_password', 60);
		if( $this->cache){
			$this->obj_page->show_block( _('Input reset code') , $this->cache, $view);
		}
		else{
			$this->raintpl->assign( "label_code", _('Code') );
			$this->raintpl->assign( "reset_code", _('Your reset code') );
			$this->raintpl->assign( "reset_password", _('Reset password'));
			$this->raintpl->assign( "reset_password_note", "For reset your password enter code that you get from your email.");
			$this->obj_page->show_block( _('Reset password') , $this->raintpl->draw( 'users_reset_password', true ), $view);
		}
	}
	public function show_register_page($view){
		$this->cache == $this->raintpl->cache('users_register', 60);
		if( $this->cache){
			$this->obj_page->show_block( _('Register') , $this->cache, $view);
		}
		else{
			$this->raintpl->assign( "label_username", _('Username:') );
			$this->raintpl->assign( "Cancel", _('Cancel') );
			$this->raintpl->assign( "username", _('Username') );
			$this->raintpl->assign( "label_email", _('Email:'));
			$this->raintpl->assign( "email", "Email");
			$this->raintpl->assign( "label_password", _('Password:'));
			$this->raintpl->assign( "label_repassword", _('Re Password'));
			$this->raintpl->assign( "sign_up", _('Sign up') );
			$this->raintpl->assign( "agree_terms", _('By clicking submit you are agreeing to the Terms and Conditions.') );
			
			$this->obj_page->show_block( _('Reset password') , $this->raintpl->draw( 'users_reset_password', true ), $view);
		}	
		return _('Register');
	}
	public function show_register_active_page($view){
		$this->cache == $this->raintpl->cache('register_active', 60);
		if( $this->cache ){
			$this->obj_page->show_block( _('Active account') , $this->cache, $view);
		}
		else{
			$this->raintpl->assign( "label_code", _('Active code:') );
			$this->raintpl->assign( "users_register_active_code", _('Active code') );
			$this->raintpl->assign( "users_register_active_note", _('Enter code that you recived by email to active your account.') );
			$this->raintpl->assign( "active_account", _('Active account'));
			$this->obj_page->show_block( _('Active account') , $this->raintpl->draw( 'register_active', true ), $view);
		}	
		return _('Register');
	}
	
	
	
	public function show_in_box($header, $content, $type = 'warning'){
		$this->obj_page->show_in_box($header, $content, $type);
	}
	public function show_message($header, $content, $type = 'warning'){
		$this->obj_page->show_message($header, $content, $type);
	}
}
?>