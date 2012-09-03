$(function(){
	$("#replies .pointer").each(function(i,at){
		$(at).click(function(){
			var array=$(at).attr("id").split("|");
			var order_id=array[0];
			var user=array[1];
			
			$("#textarea")[0].focus();
			$("#textarea")[0].value += order_id+"楼 @"+user+" ";
		})
	});
});