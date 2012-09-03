$(function(){
	$("#mark").click(function(){
		var arr=$("#mark").attr("name").split("|");
		var table=arr[0];
		var id=arr[1];
		
		var state=$("#mark").text();
		
		if(id=="" || table=="" || state=="")
			return;
		
		if(state=="�ղ�")
			process(id,"mark",table);
		else if(state=="���ղ�")
			process(id,"cancel",table);
	});
	
	function process(id,type,table){
		$.ajax({
			type: "GET",
			url: "/ajax/markAjax.php",
			data: "id="+id+"&type="+type+"&table="+table,
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
						$("#mark").text("���ղ�");
					else if(arr[0]=="no")
						$("#mark").text("�ղ�");
						
					if(arr[1]=="0")
						$("#collect_total").text('');
					else
						$("#collect_total").text(arr[1]+"���ղ�");
					
					$("#loading").css("visibility","hidden");
				}
			}
		});
	}
	
});