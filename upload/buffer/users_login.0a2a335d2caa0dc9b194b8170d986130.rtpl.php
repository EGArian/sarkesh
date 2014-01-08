<div id="users_login" class="users_login" >
	<script language="javascript" type="text/javascript" src="../plugins/users/scripts/users.js"></script>
	<div id="msg" class="users_login_msg" ></div>
	<form>
		<div class="form-group">
			<label for="username"> <?php echo $label_username;?> </label>
			<input type="text" id="username" class="form-control" name="username" placeholder=" <?php echo $username;?>">
			<label for="password"> <?php echo $label_password;?> </label>
			<input type="password" id="password" class="form-control" name="password" placeholder="******">
			<div class="checkbox">
				<input type="checkbox" id="remember" class="form-control" name="remember" value="yes">
			<label class="lcb>"><?php echo $remember_me;?></label>
			</div>
			<input type="button" class="form-control btn btn-primary" data-loading-text="Loading..." onclick="users_login()" value="<?php echo $sign_in;?>">
			<a href=".?plugin=users&action=forget_password" ><?php echo $forget_password;?></a>
		</div>
	</form>
</div>