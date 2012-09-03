<?php
require_once 'lib/pageModel.class.php';
require_once 'lib/pagination.func.php';
require_once 'lib/label.class.php';

class Ask extends PageModel{
	private $locate='ask';
	private $page_size=15;
	private $page_list;
	private $label;
	
	public function __construct(){
		parent::__construct();
		
		$this->label=new Label();
		$this->init();
	}
	
	private function init(){
		$this->tpl->assign('LOCATE',$this->locate);
		
		$this->get_items();
		$this->get_info();
		$this->get_hot();
	}
	
	private function get_items(){
		$sql="select title,author,label,date,score,is_adopt,answer_count,collect_count from ask order by update_time desc";
		
		//调用分页函数
		$cur_page=$this->get('page',1,'/^[0-9]+$/');
		$this->page_list=pagination($sql,$cur_page,$this->page_size,'blog');
		$this->tpl->assign("PAGELIST",$this->page_list);
		
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
	
	//获取热门提问
	private function get_hot(){
		$sql="select title,date from ask order by answer_count desc limit 6";
		$rows=$this->db->get_rows($sql);
		
		$this->tpl->assign('HOTARRAY',$rows);
	}
	
	//获取统计信息
	private function get_info(){
		$tables=array('ask','answer');
		$count_list=$this->get_state($tables);
		$this->tpl->assign('COUNTLIST',$count_list);
	}
	
	public function display(){
		$this->tpl->display('ask.tpl');
	}
}

$ask=new Ask();
$ask->display();
?>