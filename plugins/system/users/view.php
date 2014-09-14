<?php
namespace users;
class view{
	private $settings;
	function __construct($settings){
		$this->settings = $settings;
	}
	public function view_login_block($pos){
		$username = new ctr_textbox();
		$username->configure('NAME','txt_username');
		$username->configure('INLINE',TRUE);
		$username->configure('ADDON','U');
		$username->configure('PLACE_HOLDER',_('Username or e-mail address'));
		$username->configure('HELP',_('Enter your username or email.'));
		
		$password = new ctr_textbox();
		$password->configure('NAME','txt_password');
		$password->configure('INLINE',TRUE);
		$password->configure('LABEL',_('Password:'));
		$password->configure('ADDON','P');
		$password->configure('PLACE_HOLDER',_('Password'));
		$password->configure('PASSWORD',true);
		$password->configure('HELP',_('Enter the password that accompanies your username.'));
		
		$remember = new ctr_checkbox;
		$remember->configure('NAME','ckb_remember');
		$remember->configure('LABEL',_('Remember me!'));
		
		$login = new ctr_button;
		$login->configure('NAME','btn_login');
		$login->configure('LABEL',_('Sign in'));
		$login->configure('P_ONCLICK_PLUGIN','users');
		$login->configure('P_ONCLICK_FUNCTION','btn_login_onclick');
		$login->configure('TYPE','primary');
		
		$forget = new ctr_button;
		$forget->configure('NAME','btn_reset_password');
		$forget->configure('LABEL', _('Reset Password'));
		$forget->configure('HREF',cls_general::create_url(array('plugin','users','action','reset_password')));
		$forget->configure('TYPE','link');
		
		$r = new ctr_row;
		$r->add($login,3);
		$r->add($forget,9);
		
		$form = new ctr_form;
		
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
			$lbl = new ctr_label(_("Don't have account?"));
			$register = new ctr_button;
			$register->configure('NAME','btn_register');
			$register->configure('LABEL', _('Sign up'));
			$register->configure('HREF',cls_general::create_url(array('plugin','users','action','register')));
			$register->configure('TYPE','success');
			$r1 = new ctr_row;
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
		 $form = new ctr_form('USERS_PROFILE_BLOCK');
		 $row = new ctr_row;
		 $avatar = new ctr_image;
		 $avatar->configure('SRC','./plugins/system/users/images/def_avatar_64.png');
		 $avatar->configure('TYPE','img-thumbnail');
		 $avatar->configure('LABEL',_('Hello') . ' ' . $user->username);
		 $row->add($avatar,12);
		 
		 $row1 = new ctr_row;
		 $btn_logout = new ctr_button;
		 $btn_logout->configure('NAME','btn_logout');
		 $btn_logout->configure('LABEL','Sign Out!');
		 $btn_logout->configure('TYPE','info');
		 $btn_logout->configure('P_ONCLICK_PLUGIN','users');
		 $btn_logout->configure('P_ONCLICK_FUNCTION','btn_logout_onclick');
		 $row1->add($btn_logout,6);
		 
		 if($admin){
			$btn_admin = new ctr_button;
			$btn_admin->configure('NAME','JUMP_ADMIN');
			$btn_admin->configure('LABEL',_('Admin panel'));
			$btn_admin->configure('HREF',cls_general::create_url(array('service','1','plugin','core','action','main','p','core','a','dashboard')));
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
		 $form = new ctr_form('USERS_REGISTER');
		 $form->configure('LABEL',_('Register'));
		 
		 $username = new ctr_textbox;
		 $username->configure('NAME','txt_username');
		 $username->configure('LABEL',_('Username:'));
		 $username->configure('ADDON',_('*'));
		 $username->configure('PLACE_HOLDER',_('Username'));
		 $username->configure('HELP',_('Spaces are allowed; punctuation is not allowed except for periods, hyphens, apostrophes, and underscores.'));
		 $username->configure('SIZE',4);
		 
		 $email = new ctr_textbox;
		 $email->configure('NAME','txt_email');
		 $email->configure('LABEL',_('Email:'));
		 $email->configure('ADDON',_('*'));
		 $email->configure('PLACE_HOLDER',_('Email'));
		 $email->configure('HELP',_('A valid e-mail address. All e-mails from the system will be sent to this address. The e-mail address is not made public and will only be used if you wish to receive a new password or wish to receive certain news or notifications by e-mail.'));
		 $email->configure('SIZE',6);
		 
		 $form->add_array(array($username,$email));
		 
		 $password = new ctr_textbox;
		 $password->configure('NAME','txt_password');
		 $password->configure('LABEL',_('Password:'));
		 $password->configure('ADDON',_('*'));
		 $password->configure('PLACE_HOLDER',_('Password'));
		 $password->configure('PASSWORD',true);
		 $password->configure('SIZE',4);
		 
		 $repassword = new ctr_textbox;
		 $repassword->configure('NAME','txt_repassword');
		 $repassword->configure('LABEL',_('Confirm password :'));
		 $repassword->configure('ADDON',_('*'));
		 $repassword->configure('PLACE_HOLDER',_('Password'));
		 $repassword->configure('PASSWORD',true);
		 $repassword->configure('SIZE',4);
		 
		 $signup = new ctr_button;
		 $signup->configure('NAME','btn_signup');
		 $signup->configure('TYPE','primary');
		 $signup->configure('LABEL',_('Create new account'));
		 $signup->configure('P_ONCLICK_PLUGIN','users');
		 $signup->configure('P_ONCLICK_FUNCTION','btn_signup_onclick');
		 
		 $cancel = new ctr_button;
		 $cancel->configure('NAME','btn_cancel');
		 $cancel->configure('TYPE','warning');
		 $cancel->configure('LABEL',_('Cancel'));
		  $cancel->configure('HREF','?');
		 
		 $row = new ctr_row();
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
		  $form = new ctr_form('USERS_RESET_PASSWORD');
		  
		  //create textbox for enter email or username
		  $email = new ctr_textbox;
		  $email->configure('NAME','txt_email');
		  $email->configure('LABEL',_('Username or e-mail address'));
		  $email->configure('HELP',_('Enter your Alternate Email Address or username'));
		  $email->configure('PLACE_HOLDER',_('Username or e-mail address'));
		  $email->configure('ADDON',_('*'));
		  $email->configure('SIZE',8);
		  
		  $reset = new ctr_button;
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
