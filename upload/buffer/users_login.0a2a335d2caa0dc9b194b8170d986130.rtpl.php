

<div id="users_login" class="users_login" >
	<script language="javascript" type="text/javascript" src="../plugins/users/scripts/users_login.js"></script>
	<div id="msg" class="users_login_msg" ></div>
	<form>
		<input type="hidden" name="plugin" value="users" />
		<input type="hidden" name="action" value="login" />
		<p> <?php echo $label_username;?> </p><div><input type="text" id="username" name="username" value=" <?php echo $username;?>"></div>
		<p> <?php echo $label_password;?> </p><div><input type="password" id="password" name="password" value="123456"></div>
		<div><input type="checkbox" id="remember" name="remember" value="yes"> <?php echo $remember_me;?></div>
		<div><input type="button" class="users_button_login" onclick="users_login()" value="<?php echo $sign_in;?>"></div>
	</form>
</div>