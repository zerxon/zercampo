var del;

$(document).ready(function(){
	del=function(id,type){
		var result=confirm("ȷ��Ҫɾ����");
		
		if(result)
			process(id,type);
		else
			return false;
	}
	
	function process(id,type){
	$.ajax({
			type: "GET",
			url: "/ajax/delAjax.php",
			data: "id="+id+"&type="+type,
			success: function(cont){
				if(cont=='ok'){
					$("#"+id).slideUp();
				}
				else{
					$("#label_error").slideDown();
					$("#error_txt").text('ɾ��ʧ��');
				}
			}
		});
	}
	
	$("#close").click(function(){
		$("#label_error").slideUp();
	});
});