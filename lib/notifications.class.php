<?php
require_once 'mysqldb.class.php';

define('REVIEW',1);
define('ANSWER',2);
define('REVIEW_AT',3);
define('ANSWER_AT',4);
define('BLOG',5);
define('ASK',6);

class Notifications{
	private $db;

	public function __construct(){
		
	 	$this->db=new MysqlDB();
	}
	 
	public function add_notification($owner,$tid,$type){
		$sql="insert into notifications(owner,tid,type) values('".$owner."','".$tid."',".$type.")";
		$this->db->query($sql);
	}
	
	public function get_notifications($owner){
		$sql="select nid,tid,is_read,type from notifications where owner='".$owner."' order by tid desc";
		$tid_array=$this->db->get_rows($sql);
		
		$notification_array=array();
		foreach($tid_array as $tid){
			if($tid['type']==REVIEW || $tid['type']==REVIEW_AT){
				$select_sql="select bid as id,author,reply_content as content,date from review where date='".$tid['tid']."'";
				$title_sql="select title from blog where date='";
			}
			elseif($tid['type']==ANSWER || $tid['type']==ANSWER_AT){
				$select_sql="select aid as id,author,answer_content as content,date from answer where date='".$tid['tid']."'";
				$title_sql="select title from ask where date='";	
			}
			elseif($tid['type']==BLOG){
				$select_sql="select title,author,label,date from blog where date='".$tid['tid']."'";
			}
			elseif($tid['type']==ASK){
				$select_sql="select title,author,label,date from ask where date='".$tid['tid']."'";
			}
			
			$row=$this->db->get_one($select_sql);
	 		if(!empty($row)){
		 		if($tid['type']==BLOG || $tid['type']==ASK){
		 			$email_sql="select email from user where username='".$row['author']."'";
			 		$email=$this->db->get_value($email_sql);
			 		$img=gravatar($email);
		 			
			 		if(!empty($email)){
			 			$row['img']=$img;
			 			$row['nicedate']=niceDate($row['date']);
			 			$row['type']=$tid['type'];
			 			$row['id']=$row['date'];
			 			$row['nid']=$tid['nid'];
			 			$row['is_read']=$tid['is_read'];
			 			
			 			array_push($notification_array,$row);
			 		}
		 		}
		 		else{
			 		$title=$this->db->get_value($title_sql.$row['id']."'");
			 		$email_sql="select email from user where username='".$row['author']."'";
			 		$email=$this->db->get_value($email_sql);
			 		$img=gravatar($email);
			 		
			 		if(!empty($title) && !empty($email)){
			 			$row['nid']=$tid['nid'];
				 		$row['title']=$title;
				 		$row['img']=$img;
				 		$row['type']=$tid['type'];
				 		$row['nicedate']=niceDate($row['date']);
				 		$row['is_read']=$tid['is_read'];
				 		
				 		array_push($notification_array,$row);
			 		}
		 		}
	 		}
	 		else{
	 			$this->del_notification($tid['nid'],$owner);
	 		}
	 	}
	 	
	 	$this->clear_unread_count($owner);
	 	
	 	return $notification_array;
	}
	
	public function referer_links($content,$tid,$type){
		preg_match_all('/@\w{3,10}\s/',$content,$matches);
		
		$ref_array=array();
		foreach($matches[0] as $match){
			$user=substr(trim($match),1);
			$sql="select username from user where username='".$user."'";
			$result=$this->db->get_value($sql);
			if(!empty($result)){
				
				if(!in_array($result,$ref_array)){
					$this->add_notification($user,$tid,$type);
					array_push($ref_array,$result);
				}
				
				$str='<a href="/profile/'.$user.'">@'.$user.'</a> ';
				$content=str_replace($match,$str,$content);
			}
		}
		
		return $content;
	}
	
	public function del_notification($nid,$owner){
		$sql="delete from notifications where owner='".$owner."' and nid=".$nid;
		$this->db->query($sql);
	}
 	
 	public function clear_unread_count($owner){
 		$sql="update notifications set is_read=1 where is_read=0 and owner='".$owner."'";
 		$this->db->query($sql);
 	}
}
?>