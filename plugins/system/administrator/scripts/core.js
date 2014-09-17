function core_plugins_changestate(id,value){
		var url = url = "?service=1&plugin=core&action=plugins_changestate&value=" + value;
		$.get(url ,
			function(data){
					if(data == '1'){
						//operation complete
						//going to refresh plugins list
						url = "?service=1&plugin=core&action=plugins_admin_panel";
						$.get(url ,
							function(data){
								 $("div.core_main_content").html(data);
							}
						);
					}
					else{
						//error in complete request
						//error msg most show in MODAL view
						  xmlDoc = $.parseXML( data ),
						  $xml = $( xmlDoc ),
						  $header = $xml.find( "header" );
						  $content = $xml.find( "content" );
						  $btnback = $xml.find( "btn-back" );
						  BootstrapDialog.show({
						  type: BootstrapDialog.TYPE_WARNING,
						  title: $header.text(),
						  message: $content.text(),
						  onshow: function(){},
						  buttons: [{
						      label: $btnback.text(),	       
						      action: function(dialogItself){dialogItself.close(); }		       
						      }]
						  });     
						
					}
				
			}
		); 
  
}