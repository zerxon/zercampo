<?php
require_once '../lib/adminModel.class.php';
require_once '../lib/pagination.class.php';

class ShareManage extends AdminModel{
	private $locate='share_manage';
	private $display_page='share_manage';
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
		$this->get_share_list($page);
	}
	
	private function get_share_list($page){
		$sql="select title,author,url,date,collect_count from share order by date desc";
		
		$share_list=$this->pagination->paging($page,$sql,'share');
		$page_list=$this->pagination->show_pagination($this->locate.'.php');
		
		for($i=0;$i<count($share_list);$i++){
			$share_list[$i]['nicedate']=ordinaryDate($share_list[$i]['date']);
		}
		
		$this->tpl->assign('SHARELIST',$share_list);
		$this->tpl->assign('PAGELIST',$page_list);
	}
	
	public function display(){
		$this->tpl->display($this->display_page.'.tpl');
	}
}

$shareManage=new ShareManage();
$shareManage->display();
?>