//setting of pace loading bar
//for more information about this options lock at pace documents on github
paceOptions = {
  restartOnRequestAfter: false,
  minTime: 500
}
//This variable is for use in circles
var Counter=0;
//this variable store value that return from events from server
var ReturnValue;

//this function jump page to input address
function sys_jump_page(url){
  if(url){
  	window.location = url;
  }
}
