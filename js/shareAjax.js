var collect;

$(function(){
	collect=function(id){
		var type=$("#"+id).text();
		if(type=="收藏")
			process(id,'mark');
		else if(type=="已收藏")
			process(id,'cancel');
	}
	
	function process(id,type){
	$.ajax({
			type: "GET",
			url: "/ajax/markAjax.php",
			data: "id="+id+"&type="+type+"&table=share",
			beforeSend: function () {
                    $("#loading").css("visibility","visible");
            },
			success: function(cont){
				if(cont == 'error'){
					document.location.href="/error";
				}
				else{
					var arr=cont.split("|");
					if(arr[0]=="yes")
						$("#"+id).text("已收藏");
					else if(arr[0]=="no")
						$("#"+id).text("收藏");
						
					$("#"+id+"_count").text(arr[1]);
					$("#loading").css("visibility","hidden");
				}
			}
		});
	}
});