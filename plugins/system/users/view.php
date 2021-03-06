<?php
namespace core\plugin\users;
use \core\cls\template as template;
use \core\cls\browser as browser;
use \core\cls\core as core;

use \core\control as control;
class view{
	private $settings;
	function __construct($settings){
		$this->settings = $settings;
	}
	public function view_login_block($pos){
		$username = new control\textbox();
		$username->configure('NAME','txt_username');
		$username->configure('INLINE',TRUE);
		$username->configure('ADDON','U');
		$username->configure('PLACE_HOLDER',_('Username or e-mail address'));
		$username->configure('HELP',_('Enter your username or email.'));
		
		$password = new control\textbox();
		$password->configure('NAME','txt_password');
		$password->configure('INLINE',TRUE);
		$password->configure('LABEL',_('Password:'));
		$password->configure('ADDON','P');
		$password->configure('PLACE_HOLDER',_('Password'));
		$password->configure('PASSWORD',true);
		$password->configure('HELP',_('Enter the password that accompanies your username.'));
		
		$remember = new control\checkbox;
		$remember->configure('NAME','ckb_remember');
		$remember->configure('LABEL',_('Remember me!'));
		
		$login = new control\button;
		$login->configure('NAME','btn_login');
		$login->configure('LABEL',_('Sign in'));
		$login->configure('P_ONCLICK_PLUGIN','users');
		$login->configure('P_ONCLICK_FUNCTION','btn_login_onclick');
		$login->configure('TYPE','primary');
		
		$forget = new control\button;
		$forget->configure('NAME','btn_reset_password');
		$forget->configure('LABEL', _('Reset Password'));
		$forget->configure('HREF',core\general::create_url(array('plugin','users','action','reset_password')));
		$forget->configure('TYPE','link');
		
		$r = new control\row;
		$r->add($login,3);
		$r->add($forget,9);
		
		$form = new control\form;
		
		if($pos == 'block'){
			$form->configure('NAME','users_login_block');
		}
		else{
			$form->configure('NAME','users_login');
		}
		$form->add_array(array($username,$password,$remember,$r));
		
		//users can register?
		if($this->settings['register'] == '1'){
			$form->add_spc();
			$lbl = new control\label(_("Don't have account?"));
			$register = new control\button;
			$register->configure('NAME','btn_register');
			$register->configure('LABEL', _('Sign up'));
			$register->configure('HREF',core\general::create_url(array('plugin','users','action','register')));
			$register->configure('TYPE','success');
			$r1 = new control\row;
			$r1->add($lbl,7);
			$r1->add($register,5);
			$form->add($r1);
		}
		
		return array(_('Sign in'),$form->draw());
	}
	
	/*
	 * INPUT: Object >redbeanphp user info
	 * INPUT: boolean > Admin permission
	 * 
	 * This function show user profile in block mode and content mode
	 * block mode draw with small information about user
	 * content mode draw all information about user
	 * OUTPUT:form
	 */
	 protected function view_profile_block($user,$admin){
		 $form = new control\form('USERS_PROFILE_BLOCK');
		 $row = new control\row;
		 $avatar = new control\image;
		 $avatar->configure('SRC','./plugins/system/users/images/def_avatar_64.png');
		 $avatar->configure('TYPE','img-thumbnail');
		 $avatar->configure('LABEL',_('Hello') . ' ' . $user->username);
		 $row->add($avatar,12);
		 
		 $row1 = new control\row;
		 $btn_logout = new control\button;
		 $btn_logout->configure('NAME','btn_logout');
		 $btn_logout->configure('LABEL','Sign Out!');
		 $btn_logout->configure('TYPE','info');
		 $btn_logout->configure('P_ONCLICK_PLUGIN','users');
		 $btn_logout->configure('P_ONCLICK_FUNCTION','btn_logout_onclick');
		 $row1->add($btn_logout,6);
		 
		 if($admin){
			$btn_admin = new control\button;
			$btn_admin->configure('NAME','JUMP_ADMIN');
			$btn_admin->configure('LABEL',_('Admin panel'));
			$btn_admin->configure('HREF',core\general::create_url(array('service','1','plugin','administrator','action','main','p','administrator','a','dashboard')));
			$row1->add($btn_admin,6);
		 }
		 
		 $form->add_array(array($row,$row1));
		 return array(_('User Profile'),$form->draw());
	 }
	 
	 /*
	 * OUTPUT:HTML ELEMENTS
	 * Tis function show register form 
	 */
	 protected function view_register(){
		 $form = new control\form('USERS_REGISTER');
		 $form->configure('LABEL',_('Register'));
		 
		 $username = new control\textbox;
		 $username->configure('NAME','txt_username');
		 $username->configure('LABEL',_('Username:'));
		 $username->configure('ADDON',_('*'));
		 $username->configure('PLACE_HOLDER',_('Username'));
		 $username->configure('HELP',_('Spaces are allowed; punctuation is not allowed except for periods, hyphens, apostrophes, and underscores.'));
		 $username->configure('SIZE',4);
		 
		 $email = new control\textbox;
		 $email->configure('NAME','txt_email');
		 $email->configure('LABEL',_('Email:'));
		 $email->configure('ADDON',_('*'));
		 $email->configure('PLACE_HOLDER',_('Email'));
		 $email->configure('HELP',_('A valid e-mail address. All e-mails from the system will be sent to this address. The e-mail address is not made public and will only be used if you wish to receive a new password or wish to receive certain news or notifications by e-mail.'));
		 $email->configure('SIZE',6);
		 
		 $form->add_array(array($username,$email));
		 
		 $password = new control\textbox;
		 $password->configure('NAME','txt_password');
		 $password->configure('LABEL',_('Password:'));
		 $password->configure('ADDON',_('*'));
		 $password->configure('PLACE_HOLDER',_('Password'));
		 $password->configure('PASSWORD',true);
		 $password->configure('SIZE',4);
		 
		 $repassword = new control\textbox;
		 $repassword->configure('NAME','txt_repassword');
		 $repassword->configure('LABEL',_('Confirm password :'));
		 $repassword->configure('ADDON',_('*'));
		 $repassword->configure('PLACE_HOLDER',_('Password'));
		 $repassword->configure('PASSWORD',true);
		 $repassword->configure('SIZE',4);
		 
		 $signup = new control\button;
		 $signup->configure('NAME','btn_signup');
		 $signup->configure('TYPE','primary');
		 $signup->configure('LABEL',_('Create new account'));
		 $signup->configure('P_ONCLICK_PLUGIN','users');
		 $signup->configure('P_ONCLICK_FUNCTION','btn_signup_onclick');
		 
		 $cancel = new control\button;
		 $cancel->configure('NAME','btn_cancel');
		 $cancel->configure('TYPE','warning');
		 $cancel->configure('LABEL',_('Cancel'));
		  $cancel->configure('HREF','?');
		 
		 $row = new control\row();
		 $row->add($signup,3);
		 $row->add($cancel,2);
		 
		 $form->add_array(array($password,$repassword));
		 $form->add_spc();
		 $form->add($row);
		 
		 return array(_('Sign up'),$form->draw());
	 }
	 
	 /*
	  * This function draw reset password form and return back that
	  * OUTPUT: elements
	  */
	  protected function view_reset_password(){
		  $form = new control\form('USERS_RESET_PASSWORD');
		  
		  //create textbox for enter email or username
		  $email = new control\textbox;
		  $email->configure('NAME','txt_email');
		  $email->configure('LABEL',_('Username or e-mail address'));
		  $email->configure('HELP',_('Enter your Alternate Email Address or username'));
		  $email->configure('PLACE_HOLDER',_('Username or e-mail address'));
		  $email->configure('ADDON',_('*'));
		  $email->configure('SIZE',8);
		  
		  $reset = new control\button;
		  $reset->configure('NAME','btn_reset');
		  $reset->configure('LABEL',_('Email new password'));
		  $reset->configure('P_ONCLICK_PLUGIN','users');
		  $reset->configure('P_ONCLICK_FUNCTION','btn_reset_password_onclick');
		  $reset->configure('TYPE','primary');		  
		  $form->add_array(array($email, $reset));
		  
		  return array(_('Request new password'),$form->draw());
		  
	  }

}
?>
