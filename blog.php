<?php
require_once 'lib/pageModel.class.php';
require_once 'lib/pagination.func.php';
require_once 'lib/label.class.php';

class Blog extends PageModel{
	
	private $page_size=10;
	private $page_list;
	private $label;
	
	public function __construct(){
		parent::__construct();
		
		$this->init();
	}
	
	private function init(){
		$locate='blog';
		$this->tpl->assign('LOCATE',$locate);
		$this->label=new Label();
		
		$this->get_items();
		$this->get_hot();
		$this->get_info();
	}
	
	private function get_items(){
		$sql="select title,author,date,label,view_count,reply_count from blog order by update_time desc";
		
		//调用分页函数
		$cur_page=$this->get('page',1,'/^[0-9]+$/');
		$this->page_list=pagination($sql,$cur_page,$this->page_size,'blog');
		$this->tpl->assign("PAGELIST",$this->page_list);
		
		$rows=$this->db->get_rows($sql);
		$items_array=array();
		foreach($rows as $row){
			if(!empty($row['label'])){
				$label_array=$this->label->get_label_name($row['label']);
			}
			else{
				$label_array='';
			}
			
			//获取作者信息
			$sql_user="select email from user where username='".$row['author']."'";
			$reslut=$this->db->get_one($sql_user);
			$author=$row['author'];
			$img=gravatar($reslut['email']);
			$date=niceDate($row['date']);
			
			//获取最后回复信息
			$sql_reply="select author,date from review where bid=".$row['date']." order by date desc limit 1";
			$reslut_reply=$this->db->get_one($sql_reply);
			$last_replyer=$reslut_reply['author'];
			$r_date=niceDate($reslut_reply['date']);
			
			$item=array('id'=>$row['date'],'title'=>$row['title'],'author'=>$author,'img'=>$img,'date'=>$date,'label'=>$label_array,'views'=>$row['view_count'],'replies'=>$row['reply_count'],'last_replyer'=>$last_replyer,'r_date'=>$r_date);
			array_push($items_array,$item);
		}
		
		$this->tpl->assign("ITEMS_ARRAY",$items_array);
	}
	
	//获取热门文章
	private function get_hot(){
		$sql="select title,date from blog order by (view_count+0.6*reply_count) desc limit 6";
		$rows=$this->db->get_rows($sql);
		
		$this->tpl->assign('HOTARRAY',$rows);
	}
	
	//获取统计信息
	private function get_info(){
		$tables=array('blog','review');
		$count_list=$this->get_state($tables);
		$this->tpl->assign('COUNTLIST',$count_list);
	}
	
	public function display(){
		$this->tpl->display('blog.tpl');	
	}
}

$blog=new Blog();
$blog->display();
?>