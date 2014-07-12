function ctr_uploader_select(obj){

	$("#" + obj).click();
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
							   $('#' + obj + '_img').show()
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
	
	 
	
	
}
