<?php
require_once 'lib/pageModel.class.php';
require_once 'lib/collection.class.php';
require_once 'lib/label.class.php';

class Topic extends PageModel{
	private $locate='blog';
	private $display_page='topic';
	private $collection;
	private $label;
		
	public function __construct(){
		parent::__construct();
		
		$this->label=new Label();
		if($this->isLogin)
			$this->collection=new Collection($_SESSION['user']['username'],'blog_collect','blog');
		
		$this->init();
	}
	
	private function init(){
		$this->tpl->assign('LOCATE',$this->locate);
		
		$bid=$this->get('id','','/^\d{10}$/');
		if(empty($bid)){
			error_page();
		}
		else{
			$type=$this->get('type','');
			if(!empty($type)){
				if($this->isLogin && $type=='edit'){
					$this->display_page='newtopic';
					$this->edit_topic($bid);
				}
				else{
					error_page();
				}
			}
			else{
				$this->get_tpoic($bid);
			}
		}
	}
	
	//获取文章
	private function get_tpoic($bid){
		$this->update_viewcount($bid);
		
		$sql="select title,author,content,date,last_edit_time,label,collect_count,view_count,reply_count from blog where date='".$bid."'";
		$topic=$this->db->get_one($sql);
		if(empty($topic))
			error_page();
		
		$topic['nicedate']=niceDate($topic['date']);
		
		if($this->isLogin && strstr($this->collection->get_user_collect(),$bid))
			$topic['mark']=true;
		else
			$topic['mark']=false;
			
		$label_lib=$topic['label'];
		if(!empty($label_lib))
			$topic['label']=$this->label->get_label_name($label_lib);
		
		if(!empty($topic['last_edit_time']))
			$topic['last_edit_time']=niceDate($topic['last_edit_time']);
		
		$this->tpl->assign("TOPIC",$topic);
		
		//获取相关文章
		if(!empty($label_lib)){
			$alike_array=$this->get_alike($label_lib,$bid);
			$this->tpl->assign("SIMILAR",$alike_array);
		}
		
		//获取回复
		$reply_array=$this->get_reply($bid);
		$this->tpl->assign('REPLYARRAY',$reply_array);
	}
	
	//更新文章浏览量
	private function update_viewcount($bid){
		$flag=false;
		if(!isset($_SESSION['topiclist'])){
			$flag=true;
			$_SESSION['topiclist']=$bid;
		}
		elseif(!strstr($_SESSION['topiclist'],$bid)){
			$flag=true;
			$_SESSION['topiclist']=$_SESSION['topiclist']."|".$bid;
		}
		
		if($flag){
			$sql="update blog set view_count=view_count+1 where date='".$bid."'";
			$this->db->query($sql);
		}
	}
	
	private function edit_topic($bid){
		if(!$this->check_authority($bid))
			error_page();
		
		//更新文章
		if(isset($_POST['submit'])){
			$title=$this->post('title','');
			$label=$this->post('label','');
			$content=$this->post('wmd-html','');
			
			if($title && $content){
				$last_edit_time=time();
				
				if(!empty($label))
					$label=$this->label->label_to_lid($label,1); //第二个参数1表示是博客区的标签
				
				$sql="update blog set title='".$title."',label='".$label."',content='".$content."',last_edit_time='".$last_edit_time."' where date='".$bid."'";
				$this->db->query($sql);
				
				turn_page('/topic/'.$bid);
			}
			else{
				error_page();
			}
		}
		
		//根据ID获取文章
		$sql="select title,content,date,label from blog where date='".$bid."'";
		$topic=$this->db->get_one($sql);
		if(empty($topic))
			error_page();
		
		if(!empty($topic['label'])){
			$label_array=$this->label->get_label_name($topic['label']);
			$str='';
			foreach($label_array as $label){
				$str.=$label."|";
			}
			
			$topic['label']=substr($str,0,-1);
		}
		
		$this->tpl->assign('TOPIC',$topic);
	}
	
	//检测是否拥有文章编辑的权限
	private function check_authority($bid){
		$flag=false;
		
		if($_SESSION['user']['authority']<3){
			$flag=true;
		}
		else{
			$sql="select author from blog where date='".$bid."'";
			$author=$this->db->get_value($sql);
			if(!empty($author) && $_SESSION['user']['username']==$author)
				$flag=true;
		}
		
		return $flag;
	}
	
	//获取回复
	private function get_reply($bid){
		$sql_reply="select author,order_id,reply_content,date,last_edit_time from review where bid=".$bid;
		$rows=$this->db->get_rows($sql_reply);
		$reply_array=array();
		foreach ($rows as $row){
			$row['nicedate']=niceDate($row['date']);
			if(!empty($row['last_edit_time']))
				$row['last_edit_time']=niceDate($row['last_edit_time']);
			
			//获取回复者的email
			$sql_email="select email from user where username='".$row['author']."'";
			$user_row=$this->db->get_one($sql_email);
			$email=$user_row['email'];
			$img=gravatar($email);
			$row['img']=$img;
			array_push($reply_array,$row);
		}
		
		return $reply_array;
	}
	
	//获取相关文章
	private function get_alike($label,$bid){
		$bid_array=$this->label->get_bid_array($label,$bid,'blog');
		
		$alike_array=array();
		foreach ($bid_array as $date){
			$sql_similar="select title,date from blog where date='".$date."'";
			$rows=$this->db->get_rows($sql_similar);
			foreach($rows as $row)
				array_push($alike_array,$row);
		}
		
		return $alike_array;
	}
	
	public function display(){
		$this->tpl->display($this->display_page.'.tpl');	
	}
}

$topic=new Topic();
$topic->display();
?>