$(function(){
	var ckName=false;
	var ckUpwd=false;
	var ckCpwd=false;
	var ckEmail=false;
	
	$("#name").blur( function(){ ajaxcheck($("#name")); } );
	$("#email").blur( function(){ ajaxcheck($("#email")); } );
	
	$("#pwd").blur( function(){ 
		$("#label_pwd").removeClass();
		var v = $("#pwd").val();
		if(v.length < 6 || v.length > 20)
		{
			$("#label_pwd" ).addClass('error');
			$("#label_pwd").html("密码长度要求在6-20个字符内！");
			ckUpwd=false;
		}
		else
		{
			$("#label_pwd" ).addClass('ok');
			$("#label_pwd").html("符合要求");
			ckUpwd=true;
		}
	} );
	
	$("#cpwd").blur( function(){ 
		$("#label_cpwd").removeClass();
		var v = $("#cpwd").val();
		if(v.length < 6 || v.length > 20)
		{
			$("#label_cpwd" ).addClass('error');
			$("#label_cpwd").html("密码长度要求在6-20个字符内！");
			ckCpwd=false;
			return ;
		}
		if(v != $("#pwd").val())
		{
			$("#label_cpwd" ).addClass('error');
			$("#label_cpwd").html("两次输入的密码不一致！");
			ckCpwd=false;
			return ;
		}
		$("#label_cpwd" ).addClass('ok');
		$("#label_cpwd").html("两次密码一致");
		ckCpwd=true;
	} );
	
	$("#submit").click(function(){
		if($.trim($("#name").val())!="" && $.trim($("#email").val())!="" && $.trim($("#pwd").val())!="" && $.trim($("#cpwd").val())!=""){
			if(ckName && ckUpwd && ckCpwd && ckEmail)
				return true;
			else
				return false;
		}
		else{
			return false;
		}
	});
	
	function ajaxcheck(obj)
	{
		var id = obj.attr("id");
		$("#label_" + id).removeClass();
		$.ajax({
			type: "POST",
			url: "/ajax/regAjax.php",
			data:   "act=" + id + "&v=" + encodeURIComponent(obj.val()),
			beforeSend: function (XMLHttpRequest) {
                    $("#label_" + id).html('正在检测...');
            },
			success: function(msg){
				if(msg == 'ok')
				{
					$("#label_" + id).addClass('ok');
					$("#label_" + id).html('符合要求');
					if(id=='name')
						ckName=true;
					else if(id=='email')
						ckEmail=true;
				}
				else
				{
					$("#label_" + id).addClass('error');
					$("#label_" + id).html(msg);
					if(id=='name')
						ckName=false;
					else if(id=='email')
						ckEmail=false;
				}
			} 
		});
	}
});