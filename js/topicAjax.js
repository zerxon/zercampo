$(function(){
	var ckScore=true;
		   
	$("#select").change(function(){
		$("#label_select").removeClass();
		$.ajax({
			type: "POST",
			url: "/ajax/scoreAjax.php",
			data:   "v=" + encodeURIComponent($("#select").val()),
			beforeSend: function (XMLHttpRequest) {
                    $("#label_select").html('正在检测...');
            },
			success: function(msg){
				if(msg == 'ok')
				{
					$("#label_select").addClass('ok');
					$("#label_select").html('积分足够');
					ckScore=true;
				}
				else if(msg=="not_enough")
				{
					$("#label_select").addClass('error');
					$("#label_select").html("积分不够");
					ckScore=false;
				}
				else
				{
					$("#label_select").addClass('error');
					$("#label_select").html("发生错误");
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
			$("#error_txt").text('标题不能为空');
			return false;
		}
		else if(!ckScore)
		{
			return false;
		}
		else if(!$.trim($("#textarea").val()))
		{
			$("#label_error").slideDown();
			$("#error_txt").text('正文不能为空');
			return false;
		}
		else
		{
			return true;
		}
	});
});