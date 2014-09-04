//this function send service to page and if get 1 .relode page and not , show message.
function languages_check_change(res){
	if(res =='1'){
		window.location.reload();
	}
	else{
		SysShowModal(res);
	}
}
