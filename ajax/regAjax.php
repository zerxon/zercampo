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
if(empty($value)) showmessage('����Ϊ�գ�');

if(!preg_match($rule,$value))
{
	if($obj=='username')
		showmessage('�û�������Ӣ�ġ����֡��»��ߣ�3-10�ַ���');
	elseif($obj=='email')
		showmessage('��ʽ����ȷ��');
}
else if(in_array($value,$objlist))
{
	if($obj=='username')
		showmessage('���û����ѱ�ע�ᣡ');
	elseif($obj=='email')
		showmessage('�������ѱ�ע�ᣡ');
}
echo 'ok';

 function showmessage($message)
{
	header("Content-Type:text/html;charset=gbk");
	echo $message;
	exit();
}
?>