var collect;

$(function(){
	collect=function(id){
		var type=$("#"+id).text();
		if(type=="�ղ�")
			process(id,'mark');
		else if(type=="���ղ�")
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
						$("#"+id).text("���ղ�");
					else if(arr[0]=="no")
						$("#"+id).text("�ղ�");
						
					$("#"+id+"_count").text(arr[1]);
					$("#loading").css("visibility","hidden");
				}
			}
		});
	}
});