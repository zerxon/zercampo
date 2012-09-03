$(function(){
	var  qq=true;
	var weibo=true;
	var url=true;
	
	$("#qq").blur(function(){
		var data=$.trim($("#qq").val());
		if(data!=""){
			if(isNaN(data) || data.length<6){
				qq=false;
				$("#label_qq").text('请填写6位以上数字');
			}
			else{
				qq=true;
				$("#label_qq").text('');
			}
		}
		else{
			qq=true;
			$("#label_qq").text('');
		}
	});
	
	$("#weibo").blur(function(){
		var data=$.trim($("#weibo").val());
		if(data!=""){
			var regEx=/^(http|https):\/\/\w.+(.\w+|\w+\/)+$/;
			if(!regEx.test(data)){
				weibo=false;
				$("#label_weibo").text('格式不正确');
			}
			else{
				weibo=true;
				$("#label_weibo").text('');
			}
		}
		else{
			weibo=true;
			$("#label_weibo").text('');
		}
	});
	
	$("#url").blur(function(){
		var data=$.trim($("#url").val());
		if(data!=""){
			var regEx=/^(http|https):\/\/\w.+(.\w+|\w+\/)+$/;
			if(!regEx.test(data)){
				url=false;
				$("#label_url").text('格式不正确');
			}
			else{
				url=true;
				$("#label_url").text('');
			}
		}
		else{
			url=true;
			$("#label_url").text('');
		}
	});
						   
	$("#info_submit").click(function(){
		if(qq && weibo && url)
			return true;
		else
			return false;
	});
});