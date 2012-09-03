<?php
require_once '../lib/mysqldb.class.php';
session_start();

$db=new MysqlDB();

if(!isset($_POST['v']) && !isset($_SESSION['user']['username'])){
	echo "error";
	exit(0);
}
 
$sql="select score from user where username='".$_SESSION['user']['username']."'";
$score=$db->get_value($sql);

if($score>$_POST['v'])
	echo "ok";
else
	echo "not_enough";

?>