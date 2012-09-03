<?php
require_once 'lib/pageModel.class.php';
require_once 'lib/pagination.func.php';
require_once 'lib/collection.class.php';

class Share extends PageModel{
	
	private $locate='share';
	private $page_size=15;
	private $page_list;
	private $collection;
	
	public function __construct(){
		parent::__construct();
		
		$this->init();
	}
	
	private function init(){
		$this->tpl->assign('LOCATE',$this->locate);
		
		if($this->isLogin)
			$this->collection=new Collection($_SESSION['user']['username'],'share_collect','share');
		
		if(isset($_POST['submit'])){
			$this->add_share();
		}
		else{
			$type=$this->get('type','');
			$sid=$this->get('id','','/^\d{10}$/');
			if($this->isLogin && $sid && $type)
				$this->collection->do_collect($sid,$type);
			
			$this->get_items();
			$this->get_hot();
			$this->get_info();
		}
	}
	
	private function get_items(){
		$sql="select title,author,url,date,collect_count from share order by date desc";
		
		$cur_page=$this->get('page',1,'/^[0-9]+$/');
		$this->page_list=pagination($sql,$cur_page,$this->page_size,'share'); //调用文章分页
		$this->tpl->assign('PAGELIST',$this->page_list);
		
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
	
	//添加资源
	private function add_share(){
		$share_title=$this->post('sharetitle','');
		$share_url=$this->post('shareurl','');
		$author=$_SESSION['user']['username'];
		$date=time();
		
		if($share_title && $share_url){
			$sql="insert into share(title,author,url,date) values('".$share_title."','".$author."','".$share_url."','".$date."')";
			$this->db->query($sql);
			
			turn_page('/share');
		}
	}
	
	//获取热门资源
	private function get_hot(){
		$sql="select title,url from share order by collect_count desc limit 6";
		$rows=$this->db->get_rows($sql);
		
		$this->tpl->assign('HOTARRAY',$rows);
	}
	
	private function get_info(){
		$tables=array('share');
		$result=$this->get_state($tables);
		
		$this->tpl->assign('TOTAL',$result['share']);
	}
	
	public function display(){
		$this->tpl->display('share.tpl');
	}
}

$share=new Share();
$share->display();
?>