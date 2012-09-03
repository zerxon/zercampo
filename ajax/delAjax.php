<?php 
require_once '../lib/mysqldb.class.php';
session_start();

if(isset($_GET['type']) && $_GET['type']!='notifications'){
	if(!isset($_SESSION['user']) || $_SESSION['user']['authority']==3){
		echo 'error';
		exit(0);
	}
}

if(!isset($_GET['id']) || empty($_GET['id']) || !isset($_GET['type']) || empty($_GET['type'])){
	echo 'error';
	exit(0);
}

$id=$_GET['id'];
$type=$_GET['type'];
$db=new MysqlDB();

$sql='';
$sql_reply='';
switch($type){
	case 'blog':
		$sql="delete from blog where date='".$id."'";
		$sql_reply="delete from review where bid='".$id."'";
		break;
	case 'ask':
		$sql="delete from ask where date='".$id."'";
		$sql_reply="delete from answer where aid='".$id."'";
		break;
	case 'share':
		$sql="delete from share where date='".$id."'";
		break;
	case 'user':
		$sql="delete from user where uid='".$id."'";
		break;
	case 'review':
		$sql="delete from review where date='".$id."'";
		$sql_reply="select bid from review where date='".$id."'";
		break;
	case 'answer':
		$sql="delete from answer where date='".$id."'";
		$sql_reply="select aid from answer where date='".$id."'";
		break;
	case 'notifications':
		$sql="delete from notifications where nid=".$id." and owner='".$_SESSION['user']['username']."'";
		break;
	default:
		echo 'error';
		exit(0);
}

if(!empty($sql_reply)){
	if($type=='review'){
		$bid=$db->get_value($sql_reply);
		$sql_update="update blog set reply_count=reply_count-1 where date='".$bid."'";
		$db->query($sql_update);
	}
	elseif($type=='answer'){
		$aid=$db->get_value($sql_reply);
		$sql_update="update ask set answer_count=answer_count-1 where date='".$aid."'";
		$db->query($sql_update);
	}
	else{
		$db->query($sql_reply);
	}
	
	$sql_del_notice="delete from notifications where tid='".$id."'";
	$db->query($sql_del_notice);
}

$db->query($sql);

echo 'ok';
?>