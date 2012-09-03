$(document).ready(function(){
	$("#turn").click(function(){
		var page=$.trim($("#page").val());
		var location=$("#turn").attr("name");
		if(page)
			window.location.href=location+".php?page="+page;
		else
			return false;
	});
});