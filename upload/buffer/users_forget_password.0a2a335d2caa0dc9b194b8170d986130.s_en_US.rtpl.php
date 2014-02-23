<div id="users_login" class="users_login" >
	<script language="javascript" type="text/javascript" src="../plugins/users/scripts/users.js"></script>
	<div id="msg" class="users_forget_password" ></div>
	<form>
		<div class="form-group users_forget">
			<label for="users_email"> Email: </label>
			<input type="text" id="users_email" class="form-control" name="email" placeholder="Email">
			<br />
			<div><p>Enter your email and we send reset password request to your email.</p></div>
			<input type="button" class="form-control btn-primary" onclick="users_forget_password()" value="Send email">
		</div>
	</form>
</div>