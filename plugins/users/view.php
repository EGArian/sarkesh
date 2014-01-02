<?php
class users_view{
	private $obj_page;
	
	function __construct(){
		$this->obj_page = new cls_page;
	}
	
	public function show_login_page($view){
		//add tag for show messages
		$form  = '<div id="users_login" class="users_login" >';
		$form .= '<script language="javascript" type="text/javascript" src="./plugins/users/scripts/users_login.js"></script>';

		$form .= '<div id="msg" class="users_login_msg" ></div>';
		$form .= '<form>';
		//first attech plugin and action
		$form .= '<input type="hidden" name="plugin" value="users" />';
		$form .= '<input type="hidden" name="action" value="login" />';
		$form .= '<p>' . _('Username:') . '</p><div><input type="text" id="username" name="username" value="' . _('Username') .'"></div>';
		$form .= '<p>' . _('Password:') . '</p><div><input type="password" id="password" name="password" value="123456"></div>';
		$form .= '<div><input type="checkbox" id="remember" name="remember" value="yes"> ' . _('Remember me!') . '</div>';
		$form .= '<div><input type="button" class="users_button_login" onclick="users_login()" value="Sign in"></div>';
		$form .= '</form></div>';
		$this->obj_page->show_block(_('User Sign in') , $form, $view);
	}
	
	public function show_user_page($view){
		$form  = '<div id="users_page" class="users_page" >';
		$form .= '<script language="javascript" type="text/javascript" src="./plugins/users/scripts/users_page.js"></script>';
		$form .= '<div id="msg" class="users_page_msg" ></div>';
		$form .=  _('Hello!') . ' ' . 'User    <a onclick="users_logout()">' . _('Log out') . ' </a></div>';
		$this->obj_page->show_block(_('User State') , $form, $view);

	}
	public function show_register_page(){
		echo '<h1>' . _('Sign Up') . '<h1>';
	}
	public function show_in_box($header, $content, $show_close = true){
		$this->obj_page->show_in_box($header, $content, $show_close);
	}
}
?>