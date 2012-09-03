<?php 
function niceDate($time_stamp)
{
	$time_now=time();
	$time_diff=$time_now-$time_stamp;
	$get_time="大约";
	
	if($time_diff<60)
		$get_time="刚刚";
	else if($time_diff<60*60)
		$get_time.=floor($time_diff/(60))."分钟前";
	else if($time_diff<24*60*60)
		$get_time.=floor($time_diff/(60*60))."小时前";
	else if($time_diff<30*24*60*60)
		$get_time=floor($time_diff/(24*60*60))."天前";
	else if($time_diff<365*24*60*60)
		$get_time=floor($time_diff/(30*24*60*60))."个月前";
	else if($time_diff>365*24*60*60)
		$get_time=floor($time_diff/(365*24*60*60))."年前";
	else
		$get_time="error";
		
	return $get_time;
}

function ordinaryDate($time_stamp,$type=1){
	//$time_stamp=$time_stamp+43200;
	
	if($type==1)
		$date=date("Y-m-d H:i:s",$time_stamp);
	elseif($type==2)
		$date=date("Y年m月d日 H:i:s",$time_stamp);
		
	return $date;
}

function gravatar($email){
	return md5(strtolower(trim($email)));
}

function encode_password($pwd){
	$encode_pwd=md5(md5('zerxon').$pwd);
	return $encode_pwd;
}

function filter($content){
	$search=array("'","<?","?>","<script>","</script>");
	$replace=array("&#039","&lt;?","?&gt;","&lt;script&gt;","&lt;/script&gt;");
	
	$content=str_ireplace($search,$replace,$content);
	
	return $content;
}

function turn_page($page){
	header("location:".$page);
	exit(0);
}

function error_page(){
	header("location:/error");
	exit(0);
}
?>