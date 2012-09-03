$(function(){
	var  qq=true;
	var weibo=true;
	var url=true;
	
	$("#qq").blur(function(){
		var data=$.trim($("#qq").val());
		if(data!=""){
			if(isNaN(data) || data.length<6){
				qq=false;
				$("#label_qq").text('����д6λ��������');
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
				$("#label_weibo").text('��ʽ����ȷ');
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
				$("#label_url").text('��ʽ����ȷ');
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