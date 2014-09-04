function ctr_uploader_select(obj){

	$("#ctr_uploader_" + obj).click();
    $( "#btn_ctr_uploader_" + obj ).prop( "disabled", false );
}

function ctr_uploader_onchange( files, obj){
	
	 var reader = new FileReader(); // instance of the FileReader
     reader.onload = function(e) {
					
					
					//first check for type and size of file
					var filename = files[0];
					
					//get max size
					var max_size = $('#' + obj + '_size').val();
					
					if(filename.size < max_size){
							//CHECK FOR FILE TYPE
							var types = $('#' + obj + '_types').val();
							var array_types = types.split(',');
							var valid_type = false;
							for(i=0;i<array_types.length;i++){
								
								if(array_types[i] == filename.type){
									valid_type = true;
								}
								
							}
							
							if(valid_type){
							   $('#' + obj + '_img').attr('src', e.target.result);
							   $("#" + obj + "_txt").val(filename.name);
						   }
						   else{
							   //FILE TYPE IS INVALID
								url = "?service=1&plugin=files&action=invalid_type" ;
								url = encodeURI(url);
								$.get(url ,
									function(data){
										SysShowModal(data);
									});
						   }
					   
				   }
				   else{
					    //FILE IS BIG 
						url = "?service=1&plugin=files&action=invalid_size" ;
						url = encodeURI(url);
							$.get(url ,
								function(data){
									SysShowModal(data);
								}
							);
				   }
                   
                 
     }
    if(files.length != 0){
     reader.readAsDataURL(files[0]);
	}
}

function ctr_uploader_upload(obj){
   
    var fileSelect = document.getElementById('ctr_uploader_' + obj);
    var files = fileSelect.files;
    
    // Create a new FormData object.
    var formData = new FormData();
    var file = files[0];

  

    // Add the file to the request.
    formData.append('uploads', file, file.name);
    
     $.ajax({
            url: 'index.php?service=1&plugin=files&action=do_upload',
            type: 'POST',
            data: formData,
            cache: false,
            dataType: 'html',
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function(data, textStatus, jqXHR){
                 if(data != '-1'){
                    //upload was successfull
                    //set number in input element
                    $('#id_ctr_uploader_' + obj).val(data);
                    
                    //disable control
                    $('.body_ctr_uploader_' + obj).prop('disabled',true);
                    alert(obj);
                    
                 }
                 else{
                    //error in upload file
                    //FILE IS BIG 
    					url = "?service=1&plugin=files&action=upload_error" ;
    					url = encodeURI(url);
    					   $.get(url ,
                               function(data){
    									SysShowModal(data);
    					       }
    					);
                 }
            }
        
    });
    
    
    
	
	
}
