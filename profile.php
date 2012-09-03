<?php
require_once 'lib/pageModel.class.php';

class Profile extends PageModel{
	
	public function __construct(){
		parent::__construct();

		$this->init();
	}
	
	private function init(){
		$flag=false;
		
		if($username=$this->get('type','','/^\w+$/')){
			$this->get_userinfo($username);
			$this->get_info($username);
			$flag=true;
		}
		elseif($this->isLogin){
			$this->get_userinfo('');
			$username=$_SESSION['user']['username'];
			$this->get_info($username);
			$flag=true;
		}
		else{
			error_page();
		}
		
		//获取最近发帖
		if($flag){
			$this->get_recent_article($username);
			$this->get_recent_reply($username);
		}
	}
	
	private function get_userinfo($username){
		if(empty($username))
			$username=$_SESSION['user']['username'];
			
		$sql="select uid,username,email,join_time,lastlogin_time,score,authority,web_url,qq,weibo,description from user 
		where username='".$username."'";
		$user=$this->db->get_one($sql);
		if(empty($user))
			error_page();
		
		$user['gravatar']=gravatar($user['email']);
		$user['join_time']=ordinaryDate($user['join_time']);
		$user['lastlogin_time']=ordinaryDate($user['lastlogin_time']);
		
		$this->tpl->assign('USER',$user);
	}
	
	private function get_recent_article($username){
		$sql="select title,date,'topic' as type from blog where author='".$username."' 
		union select title,date,'asktopic' as type from ask where author='".$username."' 
		order by date desc limit 10";
		$rows=$this->db->get_rows($sql);
		
		$art_list=array();
		foreach($rows as $row){
			$row['nicedate']=niceDate($row['date']);
			
			array_push($art_list,$row);
		}
		
		$this->tpl->assign('ARTLIST',$art_list);
	}
	
	private function get_recent_reply($username){
		$sql="select bid as id,date,'topic' as type from review where author='".$username."' 
		union select aid as id,date,'asktopic' as type from answer where author='".$username."' 
		order by date desc limit 10";
		$rows=$this->db->get_rows($sql);
		
		$reply_list=array();
		foreach($rows as $row){
			if($row['type']=='topic')
				$table='blog';
			else
				$table='ask';
			
			$sql_select="select title,date,'".$row['type']."' as type from ".$table." 
			where date='".$row['id']."'";
			$result=$this->db->get_one($sql_select);
			if(!empty($result)){
				$result['reply_date']=niceDate($row['date']);
				array_push($reply_list,$result);
			}
		}
		
		$this->tpl->assign('REPLYLIST',$reply_list);
	}
	
	//获取统计信息
	private function get_info($username){
		$tables=array('blog','ask','share');
		$condition="where author='".$username."'";
		$count_list=$this->get_state($tables,$condition);
		
		$this->tpl->assign('COUNTLIST',$count_list);
	}
	
	public function display(){
		$this->tpl->display('profile.tpl');
	}
}

$profile=new Profile();
$profile->display();
?>