//setting of pace loading bar
//for more information about this options lock at pace documents on github
paceOptions = {
  restartOnRequestAfter: false,
  minTime: 500
}

//this function jump page to input address
function sys_jump_page(url){
  if(url){
  	window.location = url;
  }
}
