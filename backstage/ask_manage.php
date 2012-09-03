<?php
require_once '../lib/adminModel.class.php';
require_once '../lib/pagination.class.php';

class AskManage extends AdminModel{
	private $locate='ask_manage';
	private $display_page='ask_manage';
	private $pagination;
	private $page_size=30;
	
	public function __construct(){
		parent::__construct();
		
		$this->pagination=new Pagination($this->page_size);
		$this->init();
	}
	
	private function init(){
		$this->tpl->assign('LOCATE',$this->locate);
		
		$page=$this->get('page',1,'/^\d+$/');
		$type=$this->get('type','');
		
		if(!empty($type)){
			$aid=$this->get('aid','','/^\d{10}$/');
			
			if($type=='answer' && !empty($aid))
				$this->get_answer_list($aid,$page);
			else
				error_page();
		}
		else{
			$this->get_ask_list($page);
		}
	}
	
	private function get_ask_list($page){
		$sql="select title,author,date,is_adopt,answer_count from ask order by date desc";
		
		$ask_list=$this->pagination->paging($page,$sql,'ask');
		$page_list=$this->pagination->show_pagination($this->locate.'.php');
		
		for($i=0;$i<count($ask_list);$i++){
			$ask_list[$i]['nicedate']=ordinaryDate($ask_list[$i]['date']);
		}
		
		$this->tpl->assign('ASKLIST',$ask_list);
		$this->tpl->assign('PAGELIST',$page_list);
	}
	
	private function get_answer_list($aid,$page){
		$sql="select author,order_id,answer_content,date from answer where aid='".$aid."' order by date desc";
		
		$answer_list=$this->pagination->paging($page,$sql,"answer where aid='".$aid."'");
		$page_list=$this->pagination->show_pagination($this->locate.'.php');
		
		for($i=0;$i<count($answer_list);$i++){
			if(!empty($answer_list))
				$answer_list[$i]['nicedate']=ordinaryDate($answer_list[$i]['date']);
		}
		
		$this->tpl->assign('ANSWERLIST',$answer_list);
		$this->tpl->assign('PAGELIST',$page_list);
		$this->tpl->assign('AID',$aid);
	}
	
	public function display(){
		$this->tpl->display($this->display_page.'.tpl');
	}
}

$askManage=new AskManage();
$askManage->display();
?>