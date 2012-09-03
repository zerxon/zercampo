<?php
require_once '../lib/mysqldb.class.php';
session_start();

$db=new MysqlDB();
 
if(!isset($_POST['v']) && !isset($_SESSION['uid']))
 	exit;
 
$sql="select score from user where uid=".$_SESSION['uid'];
$query=mysql_query($sql);
$score=mysql_fetch_row($query);
 
if($score[0]>$_POST['v'])
{
	echo "ok";
}
else
{
	header("Content-Type:text/html;charset=gbk");
	echo "»ý·Ö²»¹»";
}
?>