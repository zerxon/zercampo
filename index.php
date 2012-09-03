<?php
require_once 'lib/pageModel.class.php';
require_once 'lib/collection.class.php';
require_once 'lib/label.class.php';

class Index extends PageModel{
	private $locate='index';
	private $collection;
	private $label;
	
	public function __construct(){
		parent::__construct();
		
		$this->label=new Label();
		if($this->isLogin)
			$this->collection=new Collection($_SESSION['user']['username'],'share_collect','share');
		
		$this->init();
	}
	
	private function init(){
		$this->tpl->assign('LOCATE',$this->locate);
		
		$this->get_blog('5');
		$this->get_ask('5');
		$this->get_share('5');
		$this->get_info();
	}
	
	private function get_blog($count){
		$sql="select title,label,author,date,view_count,reply_count from blog order by date desc limit ".$count;
		
		$rows=$this->db->get_rows($sql);
		$items_array=array();
		foreach($rows as $row){
			if(!empty($row['label'])){
				$label_array=$this->label->get_label_name($row['label']);
			}
			else{
				$label_array='';
			}
			
			//»ñÈ¡×÷ÕßÐÅÏ¢
			$sql_user="select email from user where username='".$row['author']."'";
			$reslut=$this->db->get_one($sql_user);
			$author=$row['author'];
			$img=gravatar($reslut['email']);
			$date=niceDate($row['date']);
			
			//»ñÈ¡×îºó»Ø¸´ÐÅÏ¢
			$sql_reply="select author,date from review where bid=".$row['date']." order by date desc limit 1";
			$reslut_reply=$this->db->get_one($sql_reply);
			$last_replyer=$reslut_reply['author'];
			$r_date=niceDate($reslut_reply['date']);
			
			$item=array('id'=>$row['date'],'title'=>$row['title'],'author'=>$author,'img'=>$img,'date'=>$date,'label'=>$label_array,'views'=>$row['view_count'],'replies'=>$row['reply_count'],'last_replyer'=>$last_replyer,'r_date'=>$r_date);
			array_push($items_array,$item);
		}
		
		$this->tpl->assign("ITEMS_ARRAY",$items_array);
	}
	
	private function get_ask($count){
		$sql="select title,label,author,date,score,is_adopt,answer_count,collect_count from ask order by date desc limit ".$count;
		$rows=$this->db->get_rows($sql);
		$items_array=array();
		foreach($rows as $row){
			$row['nicedate']=niceDate($row['date']);
			if(!empty($row['label']))
				$row['label']=$this->label->get_label_name($row['label']);
			
			$sql_answer="select author,date from answer where aid=".$row['date']." order by date desc limit 1";
			$reslut_answer=$this->db->get_one($sql_answer);
			$row['last_replyer']=$reslut_answer['author'];
			$row['r_date']=niceDate($reslut_answer['date']);
			$row['answer_date']=niceDate($reslut_answer['date']);
			
			array_push($items_array,$row);
		}
		$this->tpl->assign('ITEMSARRAY',$items_array);
	}
	
	private function get_share($count){
		$sql="select title,author,url,date,collect_count from share order by date desc limit ".$count;
		$rows=$this->db->get_rows($sql);
		
		$item_array=array();
		foreach($rows as $row){
			$row['nicedate']=niceDate($row['date']);
			if($this->isLogin && strstr($this->collection->get_user_collect(),$row['date']))
				$row['mark']=true;
			else
				$row['mark']=false;
			
			$a=explode('//',$row['url']);
			$b=explode('/',$a[1]);
			$row['website']=$b[0];
			
			array_push($item_array,$row);
		}
		
		$this->tpl->assign('ITEMARRAY',$item_array);
	}
	
	private function get_info(){
		$tables=array('user','blog','ask','share');
		$count_list=$this->get_state($tables);
		$this->tpl->assign('COUNTLIST',$count_list);
	}
	
	public function display(){
		$this->tpl->display('index.tpl');	
	}
}

$index=new Index();
$index->display();

?>