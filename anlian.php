<?php
require_once 'lib/mysqldb.class.php';

if(isset($_GET['setup']) && $_GET['setup']==2){
	$type=2;
}
else{
	$type=1;
}

if(isset($_REQUEST['uid']) && preg_match('/^\d+$/',$_REQUEST['uid'])){
	$uid=$_REQUEST['uid'];
}
else{
	$uid=0;
}

$db=new MysqlDB();

$user="xenon";

if(isset($_POST['setup2'])){
	if(trim($_POST['fromname'])!="" && trim($_POST['toname'])!=""){
		$from_name=htmlspecialchars(trim($_POST['fromname']),ENT_QUOTES);
		$to_name=htmlspecialchars(trim($_POST['toname']),ENT_QUOTES);
		$date=time();
		$sql="insert into relation(from_name,to_name,date) values('".$from_name."','".$to_name."','".$date."')";
		
		$query=$db->query($sql);
		
		if($query){
			$type=3;
			
			if($uid!=0){
				$sql_member="select name,email from member where id=".$uid;
				$row=$db->get_one($sql_member);
				$user=$row['name'];
				$email=$row['email'];
				
				if($email=="")
					$email="297773034@qq.com";
			}
			else{
				$email="297773034@qq.com";
			}
			
			$to=$email;
			$subject='From anlian';
			$message='Bingo! 你的好友 '.$from_name.' 上当了，TA的心上人是 '.$to_name;
			
			mail($to,$subject,$message);
		}
		
	}
	else{
		echo 'error';
	}
	
}
elseif(isset($_POST['setup3'])){
	if(trim($_POST['name'])!="" && trim($_POST['email'])!=""){
		$name=htmlspecialchars(trim($_POST['name']),ENT_QUOTES);
		$email=trim($_POST['email']);
		
		if(!preg_match('/^[0-9a-z][a-z0-9\._-]{1,}@[a-z0-9-]{1,}[a-z0-9]\.[a-z\.]{1,}[a-z]$/i',$email)){
			echo '<script>alert("邮箱格式不正确");</script>';
			exit;
		}
		
		$sql_insert="insert into member(name,email) values('".$name."','".$email."')";
		$query=$db->query($sql_insert);
		$user_id=mysql_insert_id();
		
		if($query){
			$type=4;
			$link="一个非常神奇的测试,可以轻松地测得她(他)是否爱上了你,真的好准啊! http://zerxon.info/anlian.php?uid=".$user_id;
			$title="一个非常神奇的测试,可以轻松地测得她(他)是否爱上了你,真的好准啊!";
			$img="http://ww4.sinaimg.cn/bmiddle/7f639091jw1dvhk6emmlzj.jpg";
			$url="http://zerxon.info/anlian.php?uid=".$user_id;
		}
		else{
			echo '<script>alert("注册失败");history.go();</script>';
			exit;
		}
		
	}
	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=gbk">

<title>一个非常神奇的测试,可以轻松地帮你得到你所爱的人的芳心_趣味游戏</title>
<meta name="keywords" content="心理测试,趣味,游戏,网页游戏,社交游戏,小游戏,微博,应用,app,app,明星,名人,娱乐,红人,粉丝">
<meta name="description" content="游戏,网页游戏,社交游戏,小游戏,微博,应用,app,明星,名人,娱乐,红人,粉丝">
<link href="anlian/css.css" type="text/css" rel="stylesheet">
</head>

<body>
<?php if($type==1){ ?>
<div class="yr_content">
	<div class="yr_top"></div>
	<div class="yr_main">
		<form name="form1" action="anlian.php?setup=2" method="post">
		<div class="yr_c1">你是否有这样的情况： </div>
		<div class="yr_c2">	你正暗恋一个人，但不知道TA是否喜欢你,因此你却始终难于启口? </div>
		<div class="yr_c3">没关系，我们帮你! Love研究小组经过长达8年时间对19723对情侣进行了跟踪调查，总结出了一个超准的暗恋测试,目前已经有163245位网友使用，其中76.67％的用户已宣告爱情成功，你要试试吗？  </div>
		<div class="yr_c4"><a style="cursor:pointer" onclick="document.form1.submit()"><img src="anlian/yr_btn.gif"></a></div>
		<input type="hidden" name="uid" value="<?=@$uid?>">
		</form>
		<div style="text-align:center;padding:10px">
		</div>
	</div>
</div>
<?php }elseif($type==2){ ?>
<div class="yr_content">
	<div class="yr_top"></div>
	<div class="yr_main">
			<div class="yr_c5">1.请填写你心中的她(他)的姓名 <span>(共5题)</span></div>
			<form name="form2" action="anlian.php" method="post">
			<div class="yr_c6">
				<table>
					<tr><td>你的姓名:</td><td><input id="fromname" name="fromname"></td></tr>
					<tr><td>她(他)的姓名:</td><td><input id="toname" name="toname"></td></tr>
			</table>
			</div>
			<div class="yr_c4"><a style="cursor:pointer" onclick="check()"><img src="anlian/step2.gif" /></a></div>
			<div class="yr_c8">注:请务必认真填写,否则会影响测试结果的准确性</div>
			<input type="hidden" name="setup2">
			<input type="hidden" name="uid" value="<?=@$uid?>">
			</form>
	</div>
	
<script>
function check(){
	var fromname=document.getElementById('fromname').value;
	var toname=document.getElementById('toname').value;
	
	if(fromname=="")
		alert("请填写你的姓名");
	else if(toname=="")
		alert("请填写他（她）的姓名");
	else
		document.form2.submit();
}
</script>
<?php }elseif($type==3){ ?>
<div class="yr_content">
	<div class="yr_top"></div>
	<div class="yr_main">
		<form name="form3" action="anlian.php" method="post">
			<div class="yr_d1"><img src="anlian/shangdang.gif"></div>
			<div class="yr_d2">你被好友<?=$user?>开了一个玩笑!<br>你刚才所填写的内容已经发送到<?=$user?>的邮箱里了! </div>
			<div class="yr_d3">想恶搞下好友？快填写你的昵称和邮箱吧! </div>
			<div class="yr_d4">
				<table align="center">
					<tr><td>你的昵称:</td><td><input id="name" name="name"></td></tr>
					<tr><td>Email:</td><td><input id="email" name="email"></td></tr>
				</table>
			</div>
			<div class="yr_d5"><input type="submit" onclick="return check()" name="setup3" value="确定" /></div>
		</form>
	</div>
	
<script>
function check(){
	var name=document.getElementById('name').value;
	var email=document.getElementById('email').value;
	var reg=/^[0-9a-z][a-z0-9\._-]{1,}@[a-z0-9-]{1,}[a-z0-9]\.[a-z\.]{1,}[a-z]$/i;
	
 	if(!email.match(reg)){
 		alert("邮箱格式不正确");
 		return false;
 	}
	
	if(name==""){
		alert("请填写你的昵称");
		return false;
	}
	
	return true;
}
</script>
<?php }elseif($type==4){ ?>
<style type="text/css">
.icon{
	height:24px;
	width:24px;
	float:left;
	margin-right:5px;
	background:url(anlian/shareicons.jpg) no-repeat;
	display:block;
}

.icon.{
	background-position:0 0;
}

.icon.xlwb{
	background-position:-30px 0;
}

.icon.tcwb{
	background-position:-90px 0;
}

.icon.db{
	background-position:-120px 0;
}
</style>

<div class="yr_content">
	<div class="yr_top"></div>
	<div class="yr_main">
			<div class="yr_d1"></div>
			<div class="yr_d2"></div>
			<div class="yr_d3">已设置完成!快转发吧 </div>
			<div class="yr_d4"><textarea><?=$link?></textarea></div>
			<div class="yr_d3">
				<br><div>更快捷的方法：点击以下图标分享到你的微博，QQ空间，或豆瓣即可</div><br>
				<div style="width:126px;line-height:24px;margin:0 auto;height:30px;">
						<a class="icon xlwb" style="cursor:pointer" onClick="shareTSina('<?=$title?>','<?=$url?>','','<?=$img?>');"></a>
	      		<a class="icon tcwb" style="cursor:pointer" onClick="shareToWb('<?=$title?>','<?=$url?>','','<?=$img?>');"></a>
	      		<a class="icon tcqz" style="cursor:pointer" onClick="shareQzone('<?=$title?>','<?=$url?>','','','<?=$img?>');"></a>
	      		<a class="icon db" style="cursor:pointer" onClick="shareDouBan('<?=$title?>','<?=$url?>');"></a>
      		<div>
			</div>
	</div>
	
<script type="text/javascript">
function showLayers(){
    if(!document.getElementById("shareLayer")) return false;
    if(!document.getElementById("l_box")) return false;
    var layerId = document.getElementById("shareLayer");
    var lBoxId = document.getElementById("l_box");
    if(layerId.offsetWidth == 30){
        layerId.style.width = "180px"
        lBoxId.style.display = "block";
    }else{
        layerId.style.width = "30px"
        lBoxId.style.display = "none";
    }
}
/*title是标题，rLink链接，summary内容，site分享来源，pic分享图片路径*/
/*新浪微博*/
function shareTSina(title,rLink,site,pic){
    window.open('http://service.weibo.com/share/share.php?title='+encodeURIComponent(title)+'&url='+encodeURIComponent(rLink)+'&appkey='+encodeURIComponent(site)+'&pic='+encodeURIComponent(pic),'_blank','scrollbars=no,width=600,height=450,left=75,top=20,status=no,resizable=yes')        
}
/*腾讯微博*/
function shareToWb(title,rLink,site,pic){
    window.open('http://v.t.qq.com/share/share.php?url='+encodeURIComponent(rLink)+'&title='+encodeURI(title)+'&appkey='+encodeURI(site)+'&pic='+encodeURI(pic),'_blank','scrollbars=no,width=600,height=450,left=75,top=20,status=no,resizable=yes')    
}
/*QQ空间*/
function shareQzone(title,rLink,summary,site,pic){
    window.open('http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?title='+encodeURIComponent(title)+'&url='+encodeURIComponent(rLink)+'&summary='+encodeURIComponent(summary)+ '&site='+encodeURIComponent(site)+'&pics='+encodeURIComponent(pic),'_blank','scrollbars=no,width=600,height=450,left=75,top=20,status=no,resizable=yes')
}
/*豆瓣*/
function shareDouBan(title,rLink){
    window.open('http://www.douban.com/recommend?title='+encodeURIComponent(title)+'&url='+encodeURIComponent(rLink),'_blank','scrollbars=no,width=600,height=450,left=75,top=20,status=no,resizable=yes')    
}
</script>
<?php } ?>
</body>
</html>