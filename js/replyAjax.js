$(function(){
	$("#submit").click(function(){
		$("#label_error").html('');
		
		var data=$("#wmd-html").val();
		if($.trim(data)=="")
		{
			$("#label_error").html('回复不能为空');
			return;
		}
		
		$.ajax({
			type: "POST",
			url: "/ajax/replyAjax.php",
			data: "content=" + data + "&bid=" + $("#bid").val() + "&owner=" + $("#owner").val() + "&type=" + $("#tp").val(),
			beforeSend: function (XMLHttpRequest) {
                    $("#loading").css("visibility","visible");
            },
			success: function(cont){
				if(cont=='notlogin')
				{
					$("#textarea").val('');
					$("#label_error").html('尚未登录,不能执行该操作');
				}
				else if(cont == 'error')
				{
					$("#label_error").html('回复失败');
				}
				else
				{
					$("#textarea").val('');
					$("#wmd-preview").html('');
					$("#replies").append(cont);
					$("#loading").css("visibility","hidden");
				}
			}
		});
	});
});