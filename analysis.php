<?php
require_once 'lib/mysqldb.class.php';
session_start();

if(isset($_SESSION['user']) && $_SESSION['user']['authority']<3){
	$db=new MysqlDB();
	
	$sql_relation="select * from relation";
	$rows_relation=$db->get_rows($sql_relation);
	
	$sql_member="select * from member";
	$rows_member=$db->get_rows($sql_member);
}
else{
	echo 'permission denied';
	exit;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=gbk">

<title>一个非常神奇的测试,可以轻松地帮你得到你所爱的人的芳心_趣味游戏</title>
<meta name="keywords" content="心理测试,趣味,游戏,网页游戏,社交游戏,小游戏,微博,应用,app,app,明星,名人,娱乐,红人,粉丝">
<meta name="description" content="游戏,网页游戏,社交游戏,小游戏,微博,应用,app,明星,名人,娱乐,红人,粉丝">
<link href="anlian/css.css" type="text/css" rel="stylesheet">
<style>
body{
	font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;
	font-size:16px;
}
</style>
</head>

<body>
<br>
<div style="width:100%;text-align:center;font-size:36px;font-weight:blod;">Relation</div>
<table border="1" width="60%" align="center" style="text-align:center">
	<tr><th width="10%">ID</th><th width="30%">From</th><th width="30%">To</th><th width="30%">Date</th></tr>
	<?php
	$index=0;
	foreach($rows_relation as $relation){
		$index++;
		$relation['date']=$relation['date']+8*3600;
		$date=date("Y-m-d H:i:s",$relation['date']);
		
		echo '<tr><td>'.$index.'</td><td>'.$relation['from_name'].'</td><td>'.$relation['to_name'].'</td><td>'.$date.'</td></tr>';
	}
	?>
</table>
<br>
<br>
<br>
<div style="width:100%;text-align:center;font-size:36px;font-weight:blod;">Member</div>
<table border="1" width="60%" align="center" style="text-align:center">
	<tr><th width="10%">ID</th><th width="45%">Name</th><th width="45%">Email</th></tr>
	<?php
	$index=0;
	foreach($rows_member as $member){
		$index++;
		echo '<tr><td>'.$index.'</td><td>'.$member['name'].'</td><td>'.$member['email'].'</td></tr>';
	}
	?>
</table>
<br>
<br>
<br>
</body>
</html>