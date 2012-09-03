$(function(){
	var ckScore=true;
		   
	$("#select").change(function(){
		$("#label_select").removeClass();
		$.ajax({
			type: "POST",
			url: "/ajax/scoreAjax.php",
			data:   "v=" + encodeURIComponent($("#select").val()),
			beforeSend: function (XMLHttpRequest) {
                    $("#label_select").html('���ڼ��...');
            },
			success: function(msg){
				if(msg == 'ok')
				{
					$("#label_select").addClass('ok');
					$("#label_select").html('�����㹻');
					ckScore=true;
				}
				else if(msg=="not_enough")
				{
					$("#label_select").addClass('error');
					$("#label_select").html("���ֲ���");
					ckScore=false;
				}
				else
				{
					$("#label_select").addClass('error');
					$("#label_select").html("��������");
					ckScore=false;
				}
			} 
		});
	});
	
	$("#close").click(function(){
		$("#label_error").slideUp();
	});
	
	$("#submit").click(function(){
		if(!$.trim($("#title").val()))
		{
			$("#label_error").slideDown();
			$("#error_txt").text('���ⲻ��Ϊ��');
			return false;
		}
		else if(!ckScore)
		{
			return false;
		}
		else if(!$.trim($("#textarea").val()))
		{
			$("#label_error").slideDown();
			$("#error_txt").text('���Ĳ���Ϊ��');
			return false;
		}
		else
		{
			return true;
		}
	});
});