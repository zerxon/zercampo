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
			$message='Bingo! ��ĺ��� '.$from_name.' �ϵ��ˣ�TA���������� '.$to_name;
			
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
			echo '<script>alert("�����ʽ����ȷ");</script>';
			exit;
		}
		
		$sql_insert="insert into member(name,email) values('".$name."','".$email."')";
		$query=$db->query($sql_insert);
		$user_id=mysql_insert_id();
		
		if($query){
			$type=4;
			$link="һ���ǳ�����Ĳ���,�������ɵز����(��)�Ƿ�������,��ĺ�׼��! http://zerxon.info/anlian.php?uid=".$user_id;
			$title="һ���ǳ�����Ĳ���,�������ɵز����(��)�Ƿ�������,��ĺ�׼��!";
			$img="http://ww4.sinaimg.cn/bmiddle/7f639091jw1dvhk6emmlzj.jpg";
			$url="http://zerxon.info/anlian.php?uid=".$user_id;
		}
		else{
			echo '<script>alert("ע��ʧ��");history.go();</script>';
			exit;
		}
		
	}
	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=gbk">

<title>һ���ǳ�����Ĳ���,�������ɵذ���õ����������˵ķ���_Ȥζ��Ϸ</title>
<meta name="keywords" content="�������,Ȥζ,��Ϸ,��ҳ��Ϸ,�罻��Ϸ,С��Ϸ,΢��,Ӧ��,app,app,����,����,����,����,��˿">
<meta name="description" content="��Ϸ,��ҳ��Ϸ,�罻��Ϸ,С��Ϸ,΢��,Ӧ��,app,����,����,����,����,��˿">
<link href="anlian/css.css" type="text/css" rel="stylesheet">
</head>

<body>
<?php if($type==1){ ?>
<div class="yr_content">
	<div class="yr_top"></div>
	<div class="yr_main">
		<form name="form1" action="anlian.php?setup=2" method="post">
		<div class="yr_c1">���Ƿ�������������� </div>
		<div class="yr_c2">	��������һ���ˣ�����֪��TA�Ƿ�ϲ����,�����ȴʼ����������? </div>
		<div class="yr_c3">û��ϵ�����ǰ���! Love�о�С�龭������8��ʱ���19723�����½����˸��ٵ��飬�ܽ����һ����׼�İ�������,Ŀǰ�Ѿ���163245λ����ʹ�ã�����76.67�����û������氮��ɹ�����Ҫ������  </div>
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
			<div class="yr_c5">1.����д�����е���(��)������ <span>(��5��)</span></div>
			<form name="form2" action="anlian.php" method="post">
			<div class="yr_c6">
				<table>
					<tr><td>�������:</td><td><input id="fromname" name="fromname"></td></tr>
					<tr><td>��(��)������:</td><td><input id="toname" name="toname"></td></tr>
			</table>
			</div>
			<div class="yr_c4"><a style="cursor:pointer" onclick="check()"><img src="anlian/step2.gif" /></a></div>
			<div class="yr_c8">ע:�����������д,�����Ӱ����Խ����׼ȷ��</div>
			<input type="hidden" name="setup2">
			<input type="hidden" name="uid" value="<?=@$uid?>">
			</form>
	</div>
	
<script>
function check(){
	var fromname=document.getElementById('fromname').value;
	var toname=document.getElementById('toname').value;
	
	if(fromname=="")
		alert("����д�������");
	else if(toname=="")
		alert("����д��������������");
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
			<div class="yr_d2">�㱻����<?=$user?>����һ����Ц!<br>��ղ�����д�������Ѿ����͵�<?=$user?>����������! </div>
			<div class="yr_d3">�����º��ѣ�����д����ǳƺ������! </div>
			<div class="yr_d4">
				<table align="center">
					<tr><td>����ǳ�:</td><td><input id="name" name="name"></td></tr>
					<tr><td>Email:</td><td><input id="email" name="email"></td></tr>
				</table>
			</div>
			<div class="yr_d5"><input type="submit" onclick="return check()" name="setup3" value="ȷ��" /></div>
		</form>
	</div>
	
<script>
function check(){
	var name=document.getElementById('name').value;
	var email=document.getElementById('email').value;
	var reg=/^[0-9a-z][a-z0-9\._-]{1,}@[a-z0-9-]{1,}[a-z0-9]\.[a-z\.]{1,}[a-z]$/i;
	
 	if(!email.match(reg)){
 		alert("�����ʽ����ȷ");
 		return false;
 	}
	
	if(name==""){
		alert("����д����ǳ�");
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
			<div class="yr_d3">���������!��ת���� </div>
			<div class="yr_d4"><textarea><?=$link?></textarea></div>
			<div class="yr_d3">
				<br><div>����ݵķ������������ͼ��������΢����QQ�ռ䣬�򶹰꼴��</div><br>
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
/*title�Ǳ��⣬rLink���ӣ�summary���ݣ�site������Դ��pic����ͼƬ·��*/
/*����΢��*/
function shareTSina(title,rLink,site,pic){
    window.open('http://service.weibo.com/share/share.php?title='+encodeURIComponent(title)+'&url='+encodeURIComponent(rLink)+'&appkey='+encodeURIComponent(site)+'&pic='+encodeURIComponent(pic),'_blank','scrollbars=no,width=600,height=450,left=75,top=20,status=no,resizable=yes')        
}
/*��Ѷ΢��*/
function shareToWb(title,rLink,site,pic){
    window.open('http://v.t.qq.com/share/share.php?url='+encodeURIComponent(rLink)+'&title='+encodeURI(title)+'&appkey='+encodeURI(site)+'&pic='+encodeURI(pic),'_blank','scrollbars=no,width=600,height=450,left=75,top=20,status=no,resizable=yes')    
}
/*QQ�ռ�*/
function shareQzone(title,rLink,summary,site,pic){
    window.open('http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?title='+encodeURIComponent(title)+'&url='+encodeURIComponent(rLink)+'&summary='+encodeURIComponent(summary)+ '&site='+encodeURIComponent(site)+'&pics='+encodeURIComponent(pic),'_blank','scrollbars=no,width=600,height=450,left=75,top=20,status=no,resizable=yes')
}
/*����*/
function shareDouBan(title,rLink){
    window.open('http://www.douban.com/recommend?title='+encodeURIComponent(title)+'&url='+encodeURIComponent(rLink),'_blank','scrollbars=no,width=600,height=450,left=75,top=20,status=no,resizable=yes')    
}
</script>
<?php } ?>
</body>
</html>