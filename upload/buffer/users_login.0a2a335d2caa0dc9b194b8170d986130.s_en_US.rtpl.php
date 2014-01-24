<div id="users_login" class="users_login" >
	<script language="javascript" type="text/javascript" src="../plugins/users/scripts/users.js"></script>
	<div id="msg" class="users_login_msg" ></div>
	<form id="users_login">
		<div class="form-group users_login">
			<label for="users_username"> Username: </label>
			<input type="text" id="users_username" class="form-control" name="users_username" placeholder="Username">
			<label for="users_password"> Password: </label>
			<input type="password" id="users_password" class="form-control" name="users_password" placeholder="******">
			<div class="checkbox">
				<label>
					<input type="checkbox" id="users_remember" name="users_remember" value="yes">
					Remember me!
				</label>
			</div>
			<input type="button" class="form-control btn btn-primary" data-loading-text="Loading..." onclick="users_login()" value="Sign in">
			<a href=".?plugin=users&action=forget_password" >Forget your password?</a>
			<br />
			
				
				<br />
				<div>
					<p>Don't have account? <a href=".?plugin=users&action=register" class="btn btn-primary btn-sm" role="button"> Sign up </a></p>
				</div>
			
		</div>
	</form>
</div>