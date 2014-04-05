function ctr_uploader_file_selected(obj, id){
	//checking that user select one file
	if (obj.files[0].name != "") {
		//get file format
		var file_name_array = new Array();
		file_name_array = obj.files[0].name.split(".");
		
		//checking file type
		//get file valid file types
		//convert string to array
		var file_types = $("#" + id + "_uploader_file_types").val();
		var file_size = $("#" + id + "_uploader_max_file_size").val();
		var file_types_array = new Array();
		file_types_array = file_types.split(",");
		//check file types
		var type_valid = false;	
		//get file format
		var file_name_array = new Array();
		var file_name_array = obj.files[0].name.split(".");
		var this_file_type = file_name_array[file_name_array.length-1];
		//start checking
		for(var i=0; i<file_types_array.length; i++){
			//get file format
			if(this_file_type == file_types_array[i]){
				type_valid = true;
				break; // Jump out of loop
			}
		}
		//check size of file
		var size_valid = true;
		if(parseInt(file_size) < parseInt(obj.files[0].size)){
			size_valid = false;
		}
		if(type_valid && size_valid){
			//file type and file size is valid
			//set_file info
			var temp = $('span#' + id + '_uploader_this_file_name').text();
			$('span#' + id + '_uploader_this_file_name').text(temp + obj.files[0].name);
			var temp = $('span#' + id + '_uploader_this_file_size').text();
			$.get('?control=1&plugin=uploader&action=get_unit&value=' + obj.files[0].size, 
				function(data){
					//split unit and factor
					var uf = new Array();
					uf = data.split(",");
					file_size = Math.round(parseInt(obj.files[0].size)/parseInt(uf[1]));
					
					$('span#' + id + '_uploader_this_file_size').text(file_size);
					$('span#' + id + '_uploader_this_file_size_unit').text(uf[0]);
				}
			);
			//show file if that's image
			if(obj.files[0].type.match('image/*')){
			    var input = event.target;
			    var reader = new FileReader();
			    reader.onload = function(event){
			      $("img#" + id + "_uploader_image_preview").removeClass('hide');
			      var dataURL = event.target.result;
			      var output = document.getElementById(id + '_uploader_image_preview');
			      output.src = dataURL;			      
			    };
			   reader.readAsDataURL(input.files[0]);
			}
			else{
				//show default icon
				var output = document.getElementById(id + '_uploader_image_preview');
			      output.src = "./core/lib/controls/uploader/images/folder_64.png";

			}
				
			//show upload button
			$("button#" + id + "_uploader_start_upload").removeClass('hide');
			$("div#" + id + "_uploader_this_file_info").removeClass('hide');
		}
		else{
			//hide start upload button if that's showing
			$("button#" + id + "_uploader_start_upload").addClass('hide');
			$("div#" + id + "_uploader_this_file_info").addClass('hide');

			//show message in modal mode
			url = "?control=1&plugin=uploader&action=invalid_file";
			$.get(url ,
				function(data){
					xmlDoc = $.parseXML( data ),
					$xml = $( xmlDoc ),
					$header = $xml.find( "header" );
					$content = $xml.find( "content" );
					$type = $xml.find( "type" );
					$btnback = $xml.find( "btn-back" );
					BootstrapDialog.show({
						type: $type.text(),
						title: $header.text(),
						message: $content.text(),
						buttons: [{
							label: $btnback.text(),	       
							action: function(dialogItself){dialogItself.close(); }		       
						}]
					});
				}
			);      
		}
		
		
		
	}
}

//this function upload file with progressbar
function ctr_uploader_upload_file(id){
	//remove hide class from progress bar
	$("div#" + id + "_uploader_progressbar_block").removeClass('hide');
	
	//send file to server
      var fd = new FormData();
      fd.append( 'control', '1' );
      fd.append( 'plugin', 'uploader' );
      fd.append( 'action', 'upload' );
      fd.append( 'id', id );
      fd.append( 'max_file_size', $('input#' + id + '_uploader_max_file_size').val() );
      fd.append( 'file_types', $('input#' + id + '_uploader_file_types').val() );
      
      var file = document.getElementById(id + '_uploader_select_file').files[0];
      var file_name_array = file.name.split(".");
      var type = file_name_array[file_name_array.length-1];
      fd.append( 'type', type );
      fd.append( id + '_uploader', file);		
      $.ajax({
		  url: 'index.php',
		  data: fd,
		  processData: false,
		  contentType: false,
		  type: 'POST',
		  success: function(data){
		  		//show modal message
		  		xmlDoc = $.parseXML( data ),
				$xml = $( xmlDoc ),
				$header = $xml.find( "header" );
				$content = $xml.find( "content" );
				$res = $xml.find( "result" );
				//set file id on page
		 		$('input#' + id + '_uploader_file_id').attr('value', $res.text());
				$type = $xml.find( "type" );
				$btnback = $xml.find( "btn-back" );
				BootstrapDialog.show({
					type: $type.text(),
					title: $header.text(),
					message: $content.text(),
					buttons: [{
						label: $btnback.text(),	       
						action: function(dialogItself){dialogItself.close(); }		       
					}]
				});	
		 
		  
		  
		  
		  
		  		if($res != '0'){
		  			//disable buttons
		  			$('button#' + id + '_uploader_open_file_selector').addClass('hide');
		  			$('button#' + id + '_uploader_start_upload').addClass('hide');
		  			//show complete butoon
		  			$('div#' + id + '_uploader_complete_icon').removeClass('hide');
		  			//hide progress bar
		  			$("div#" + id + "_uploader_progressbar_block").addClass('hide');

		  			//change type of uploader style
		  			$("div#" + id + "_uploader").removeClass('panel-default');
		  			$("div#" + id + "_uploader").addClass('panel-success');
		  			
		  		}
		  }
	});
}
