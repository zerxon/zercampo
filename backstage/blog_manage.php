<?php
require_once '../lib/adminModel.class.php';
require_once '../lib/pagination.class.php';

class BlogManage extends AdminModel{
	private $locate='blog_manage';
	private $display_page='blog_manage';
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
			$bid=$this->get('bid','','/^\d{10}$/');
			
			if($type=='reply' && !empty($bid))
				$this->get_reply_list($bid,$page);
			else
				error_page();
		}
		else{
			$this->get_topic_list($page);
		}
	}
	
	private function get_topic_list($page){
		$sql="select title,author,date,view_count,reply_count from blog order by date desc";
		
		$topic_list=$this->pagination->paging($page,$sql,'blog');		
		$page_list=$this->pagination->show_pagination($this->locate.'.php');
		
		for($i=0;$i<count($topic_list);$i++){
			$topic_list[$i]['nicedate']=ordinaryDate($topic_list[$i]['date']);
		}
		
		$this->tpl->assign('TOPICLIST',$topic_list);
		$this->tpl->assign('PAGELIST',$page_list);
	}
	
	private function get_reply_list($bid,$page){
		$sql="select author,order_id,reply_content,date from review where bid='".$bid."' order by date desc";
		
		$reply_list=$this->pagination->paging($page,$sql,"review where bid='".$bid."'");
		$page_list=$this->pagination->show_pagination($this->locate.'.php');
		
		for($i=0;$i<count($reply_list);$i++){
			if(!empty($reply_list))
				$reply_list[$i]['nicedate']=ordinaryDate($reply_list[$i]['date']);
		}
		
		$this->tpl->assign('REPLYLIST',$reply_list);
		$this->tpl->assign('PAGELIST',$page_list);
		$this->tpl->assign('BID',$bid);
	}
	
	public function display(){
		$this->tpl->display($this->display_page.'.tpl');
	}
}

$blogManage=new BlogManage();
$blogManage->display();
?>