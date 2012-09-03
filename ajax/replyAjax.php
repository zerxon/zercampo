<?php
require_once '../lib/global.func.php';
require_once '../lib/reply.class.php';
require_once '../lib/notifications.class.php';
session_start();

if(!isset($_SESSION['user']))
{
	echo 'error';
	exit;
}

if(!isset($_POST['content']) || !isset($_POST['bid']) || !isset($_POST['owner']) || !isset($_POST['type']))
{
	echo 'error';
	exit;
}

if($_POST['type']=='br')
	$type=1;
elseif($_POST['type']=='ar')
	$type=2;
	
$bid=$_POST['bid'];
$date=time();
$name=$_SESSION['user']['username'];
$owner=$_POST['owner'];
$email=gravatar($_SESSION['user']['email']);
$content=iconv("utf-8","gbk",$_POST['content']);
$content=filter($content);

$notification=new Notifications();
if($owner!=$name)
	$notification->add_notification($owner,$date,$type);

if(preg_match('/@\w{3,10}\s/',$content))
	$content=$notification->referer_links($content,$date,3);
	
$reply=new Reply();
$order_id=$reply->add_reply($bid,$name,$content,$type);

//显示回复,不用操作数据库
header("Content-Type:text/html;charset=gbk");
$txt_date="刚刚";
	
$html='<div id="reply">
		<div class="pull-left face"><img class="pic s48" src="http://gravatar.com/avatar/'.$email.'.png?r=G&amp;s=48" /></div>
			<div class="infos">
			<div class="info">
			<span class="author"><a href="/profile/'.$name.'" data-name="">'.$name.'</a></span>
			<span class="date">'.$txt_date.'&nbsp;&nbsp;#'.$order_id.' <span class="pointer" onclick="at(\''.$order_id.'楼 @'.$name.'\')">@</span></span>
			</div>
			<div class="body">
		  		'.$content.'
			</div>
		</div>
	</div>';
	
echo $html;
	
?>