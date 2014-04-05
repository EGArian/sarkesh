<div id="users_login" class="users_login" >
	<script language="javascript" type="text/javascript" src="../plugins/users/scripts/users.js"></script>
	<div id="msg" class="users_forget_password" ></div>
	<form>
		<div class="form-group users_forget">
			<label for="users_email"> <?php echo $label_email;?> </label>
			<input type="text" id="users_email" class="form-control" name="email" placeholder="<?php echo $email;?>">
			<br />
			<div><p><?php echo $reset_password_note;?></p></div>
			<input type="button" class="form-control btn-primary" onclick="users_forget_password()" value="<?php echo $send_recover_email;?>">
		</div>
	</form>
</div>