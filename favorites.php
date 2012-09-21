<?php
require_once 'lib/pageModel.class.php';

class Favorites extends PageModel{
	
	public function __construct(){
		parent::__construct();
		
		$this->init();
	}
	
	private function init(){
		
		if($this->isLogin){
			$username=$_SESSION['user']['username'];
			$this->get_fav($username);
		}
	}
	
	private function get_fav($username){
		$blog_list=$this->get_fav_list($username,'blog_collect','blog');
		$ask_list=$this->get_fav_list($username,'ask_collect','ask');
		$share_list=$this->get_fav_list($username,'share_collect','share');
		
		$this->tpl->assign('BLOGLIST',$blog_list);
		$this->tpl->assign('ASKLIST',$ask_list);
		$this->tpl->assign('SHARELIST',$share_list);
	}
	
	private function get_fav_list($username,$col,$table){
		$sql="select ".$col." from user where username='".$username."'";
		$result=$this->db->get_one($sql);
		$fav_list=$result[$col];
		$bid_arr=explode("|",$fav_list);
		$list_arr=array();
		foreach($bid_arr as $bid){
			if($table!='share')
				$sql="select title,date from ".$table." where date='".$bid."'";
			else
				$sql="select title,url from ".$table." where date='".$bid."'";
				
			$row=$this->db->get_one($sql);
			if(!empty($row))
				array_push($list_arr,$row);
		}
		
		$count=count($list_arr);
		$this->tpl->assign('total_'.$table,$count);
		
		return $list_arr;
	}
	
	public function display(){
		$this->tpl->display('favorites.tpl');
	}
}

$fav=new Favorites();
$fav->display();
?>