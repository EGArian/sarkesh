<div id="users_reset_password" class="users_reset_password" >
	<script language="javascript" type="text/javascript" src="../plugins/users/scripts/users.js"></script>
	<div id="msg" class="users_reset_password" ></div>
	<form>
		<div class="form-group users_reset">
			<label for="users_reset_code"> <?php echo $label_code;?> </label>
			<input type="text" id="users_reset_code" class="form-control" name="users_reset_code" placeholder="<?php echo $reset_code;?>">
			<br />
			<div><p><?php echo $reset_password_note;?></p></div>
			<input type="button" class="form-control btn-primary" onclick="users_reset_password()" value="<?php echo $reset_password;?>">
		</div>
	</form>
</div>