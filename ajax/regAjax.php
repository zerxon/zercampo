<?php
require_once '../lib/mysqldb.class.php';

$db=new MysqlDB();

if(!isset($_POST['act']) || !isset($_POST['v']))
	exit(0);

if($_POST['act']=='name'){
	$obj='username';
	$rule='/^\w{3,10}$/';
}
else if($_POST['act']='email'){
	$obj='email';
	$rule='/^\w+([\-\+\.]\w+)*@\w+([\-]\w+)*\w+([\-\.]\w{2,})*$/i';
}
else{
	exit(0);
}

$sql="select ".$obj." from user";
$query=mysql_query($sql);
$objlist=array();
while($row=mysql_fetch_row($query))
{
	array_push($objlist,$row[0]);
}

$action = $_POST['act'];
$value = $_POST['v'];
if(empty($value)) showmessage('不能为空！');

if(!preg_match($rule,$value))
{
	if($obj=='username')
		showmessage('用户名仅限英文、数字、下划线，3-10字符！');
	elseif($obj=='email')
		showmessage('格式不正确！');
}
else if(in_array($value,$objlist))
{
	if($obj=='username')
		showmessage('此用户名已被注册！');
	elseif($obj=='email')
		showmessage('此邮箱已被注册！');
}
echo 'ok';

 function showmessage($message)
{
	header("Content-Type:text/html;charset=gbk");
	echo $message;
	exit();
}
?>