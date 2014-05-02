function test(){
  alert(555);
}
function test1(data){
  alert(data);
}
function mmm(){
	var bb = $(".txt").val();
	$(".ttt").each(function(){
		$(this).html(bb);
		$(this).attr("style","color:red");
	});
}
