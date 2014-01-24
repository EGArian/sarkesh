<div id="users_register" class="users_register" >
	<script language="javascript" type="text/javascript" src="../plugins/users/scripts/users.js"></script>
	<div id="msg" class="users_register_msg" ></div>
	<form>
		<div class="form-group users_register">
			<label for="users_username"> Username: </label>
			<input type="text" id="users_username" class="form-control" name="users_username" placeholder=" Username" onblur="is_registered();">
			<label for="users_username"> Email: </label>
			<input type="text" id="users_email" class="form-control" name="users_email" placeholder=" Email">
			<label for="users_password"> Password: </label>
			<input type="password" id="users_password" class="form-control" name="users_password" placeholder="******">
			<label for="users_repassword"> Re Password </label>
			<input type="password" id="users_repassword" class="form-control" name="users_repassword" placeholder="******">
			<br />
			<div class="alert alert-warning">
				By clicking submit you are agreeing to the Terms and Conditions.
			</div>
			<br>
			<button type="button" class="btn btn-primary" data-loading-text="Loading..." onclick="users_register()" >Sign up</button>
			<button type="button" class="btn btn-default" onclick="users_cancel_register()">Cancel</button>

		</div>
	</form>
</div>