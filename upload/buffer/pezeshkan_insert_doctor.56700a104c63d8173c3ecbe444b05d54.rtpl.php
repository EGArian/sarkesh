<div id="pezeshkan_insert_doctor" class="pezeshkan_insert_doctor." >
	<script language="javascript" type="text/javascript" src="../plugins/pezeshkan/scripts/pezeshkan.js"></script>
	<div id="msg" class="pezeshkan_insert_doctor_msg" ></div>
	<form>
		<div class="form-group pezeshkan_insert_doctor.">
			<label for="pezeshkan_doctor_name"> <?php echo $label_doctor_name;?> </label>
			<input type="text" id="pezeshkan_doctor_name" class="form-control" name="pezeshkan_doctor_name" placeholder=" <?php echo $doctor_name;?>" onblur="">
			<label for="pezeshkan_doctor_specialty"> <?php echo $label_doctor_specialty;?> </label>
			<input type="text" id="pezeshkan_doctor_specialty" class="form-control" name="pezeshkan_doctor_specialty" placeholder=" <?php echo $doctor_specialty;?>" onblur="">
			
			<label class="checkbox-inline">
				<input type="checkbox" id="pezeshkan_doctor_days" value="0"> 
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" id="pezeshkan_doctor_days" value="1"> 
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" id="pezeshkan_doctor_days" value="2"> 
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" id="pezeshkan_doctor_days" value="3"> 
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" id="pezeshkan_doctor_days" value="4"> 
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" id="pezeshkan_doctor_days" value="5"> 
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" id="pezeshkan_doctor_days" value="6"> 
			</label>

			
			
			<br>
			<button type="button" class="btn btn-primary" data-loading-text="Loading..." onclick="" ><?php echo $save;?></button>
			<button type="button" class="btn btn-default" onclick=""><?php echo $Cancel;?></button>

		</div>
	</form>
</div>

