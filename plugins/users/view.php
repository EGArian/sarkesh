<?php
class users_view{
	private $obj_page;
	
	function __construct(){
		$this->obj_page = new cls_page;
	}
	
	public function show_login_page($view){
		$form  = '<script language="javascript" type="text/javascript" src="./plugins/users/scripts/login.js"></script>';
		$form .= '<form action=""  metod="get">';
		//first attech plugin and action
		$form .= '<input type="hidden" name="plugin" value="users" />';
		$form .= '<input type="hidden" name="action" value="login" />';
		$form .= '<p>' . _('Username:') . '</p><div><input type="text" name="username" value="Your Username"></div>';
		$form .= '<p>' . _('Password:') . '</p><div><input type="password" name="password" value="123456"></div>';
		$form .= '<div><input type="checkbox" name="remember" value="yes"> Remember me! </div>';
		$form .= '<div><input type="submit" value="Sign in"></div>';
		$form .= '</form>';
		$this->obj_page->show_block(_('User Sign in') , $form, $view);
	}
	
	public function show_profile_page(){
		echo '<h1>' . _('User Profile') . '<h1>';
	}
	public function show_register_page(){
		echo '<h1>' . _('Sign Up') . '<h1>';
	}
}
?>