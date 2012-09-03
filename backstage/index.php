<?php
require_once '../lib/adminModel.class.php';

class Index extends AdminModel{
	private $locate='home';
	
	public function __construct(){
		parent::__construct();
		
		$this->init();
	}
	
	private function init(){
		if(!$this->isLogin)
			error_page();
		
		$this->tpl->assign('LOCATE',$this->locate);
		
		$this->get_info();
	}
	
	private function get_info(){
		$tables=array('blog','ask','share','review','answer','user');
		$count_list=$this->get_state($tables);
		$sql="select count(*) from user where authority<3";
		$count_list['admin']=$this->db->get_value($sql);
		$this->tpl->assign('COUNTLIST',$count_list);
	}
	
	public function display(){
		$this->tpl->display('index.tpl');
	}
}

$index=new Index();
$index->display();
?>