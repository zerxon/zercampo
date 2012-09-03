<?php
require_once 'lib/pageModel.class.php';
require_once 'lib/collection.class.php';
require_once 'lib/label.class.php';

class Asktopic extends PageModel{
	private $locate='ask';
	private $display_page='asktopic';
	private $collection;
	private $label;
	
	public function __construct(){
		parent::__construct();
		
		$this->label=new Label();
		if($this->isLogin)
			$this->collection=new Collection($_SESSION['user']['username'],'ask_collect','ask');
		
		$this->init();
	}
	
	private function init(){
		$this->tpl->assign('LOCATE',$this->locate);
		
		$aid=$this->get('id','','/^\d{10}$/');
		if(!empty($aid)){
			$type=$this->get('type','');
			$rid=$this->get('rid','','/^\d+$/');
			
			$flag=true;
			if($this->isLogin){
				if(!empty($type)){
					if($type=='pick' && $rid){
						$this->answer_adopt($aid,$rid);
					}
					elseif($type=="edit"){
						$flag=false;
						$this->display_page='newask';
						$this->edit_topic($aid);
					}
					else{
						error_page();
					}
				}
			}
			
			if($flag)
				$this->get_topic($aid);
		}
		else{
			error_page();
		}
	}
	
	private function get_topic($aid){
		$sql="select title,date,author,content,label,score,is_adopt,last_edit_time,answer_count,collect_count 
		from ask where date='".$aid."'";
		$ask=$this->db->get_one($sql);
		if(empty($ask))
			error_page();
		
		$ask['nicedate']=niceDate($ask['date']);
		if($ask['last_edit_time'])
			$ask['last_edit_time']=niceDate($ask['last_edit_time']);
		
		if($this->isLogin && strstr($this->collection->get_user_collect(),$aid))
			$ask['mark']=true;
		else
			$ask['mark']=false;
		
		$label_lib=$ask['label'];
		if(!empty($label_lib))
			$ask['label']=$this->label->get_label_name($label_lib);
		
		$this->tpl->assign('ASK',$ask);
		
		//获取回答
		$answer_array=$this->get_answer($aid);
		$this->tpl->assign('ANSWERARRAY',$answer_array);
		
		//获取相关问题
		$alike_array=$this->get_alike($label_lib,$aid,'ask');
		$this->tpl->assign('SIMILAR',$alike_array);
	}
	
	private function edit_topic($aid){
		if(!$this->check_authority($aid))
			error_page();
		
		//更新文章
		if(isset($_POST['submit'])){
			$title=$this->post('title','');
			$label=$this->post('label','');
			$score=$this->post('score','/^[0-9]+$/');
			$content=$this->post('wmd-html','');
			
			if($title && $content){
				$last_edit_time=time();
				
				if($score>0){
					$update_sql="update user set score=score-".$score." where username='".$_SESSION['user']['username']."'";
					$this->db->query($update_sql);
				}
				
				if(!empty($label))
					$label=$this->label->label_to_lid($label,2); //第二个参数1表示是博客区的标签
				
				$sql="update ask set title='".$title."',label='".$label."',content='".$content."',score=score+".$score.",last_edit_time='".$last_edit_time."' where date='".$aid."'";
				$this->db->query($sql);
				
				turn_page('/asktopic/'.$aid);
			}
			else{
				error_page();
			}
		}
		
		//根据ID获取文章
		$sql="select title,content,date,label,score from ask where date='".$aid."'";
		$ask=$this->db->get_one($sql);
		if(empty($ask))
			error_page();
		
		if(!empty($ask['label'])){
			$label_array=$this->label->get_label_name($ask['label']);
			$str='';
			foreach($label_array as $label){
				$str.=$label."|";
			}
			
			$ask['label']=substr($str,0,-1);
		}
		
		$this->tpl->assign('ASK',$ask);
	}
	
	private function check_authority($aid){
		$flag=false;
		
		if($_SESSION['user']['authority']<3){
			$flag=true;
		}
		else{
			$sql="select author from ask where date='".$aid."'";
			$author=$this->db->get_value($sql);
			if(!empty($author) && $_SESSION['user']['username']==$author)
				$flag=true;
		}
		
		return $flag;
	}
	
	private function get_answer($aid){
		$sql_answer="select author,order_id,answer_content,be_adopt,date,last_edit_time from answer where aid='".$aid."'";
		$rows=$this->db->get_rows($sql_answer);
		$answer_array=array();
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
			array_push($answer_array,$row);
		}
		
		return $answer_array;
	}
	
	private function get_alike($label,$aid,$table){
		$aid_array=$this->label->get_bid_array($label,$aid,'ask');
		
		$alike_array=array();
		foreach ($aid_array as $date){
			$sql_similar="select title,date from ".$table." where date='".$date."'";
			$rows=$this->db->get_rows($sql_similar);
			foreach($rows as $row)
				array_push($alike_array,$row);
		}
		
		return $alike_array;
	}
	
	private function answer_adopt($aid,$rid){
		//检测是否是提问者
		$sql="select author from ask where date='".$aid."'";
		$author=$this->db->get_value($sql);
		
		if($author!=$_SESSION['user']['username'])
			error_page();
		
		//设置该提问已选最佳答案	
		$sql="update answer set be_adopt=1 where date='".$rid."'";
		$this->db->query($sql);
		
		//设置该答案为最佳答案
		$sql="update ask set is_adopt=1 where date='".$aid."'";
		$this->db->query($sql);
		
		//为回答者加分
		$sql="select author from answer where date='".$rid."'";
		$author=$this->db->get_value($sql);
		
		$sql="select score from ask where date='".$aid."'";
		$score=$this->db->get_value($sql);
		if(!empty($author))
			$sql="update user set score=score+".$score." where username='".$author."'";
		else
			error_page();
	}
	
	public function display(){
		$this->tpl->display($this->display_page.'.tpl');
	}
}

$asktopic=new Asktopic();
$asktopic->display();
?>