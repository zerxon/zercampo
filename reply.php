<?php
require_once 'lib/pageModel.class.php';
require_once 'lib/reply.class.php';

class ReplyController extends PageModel{
	private $display_page='reply';
	private $reply;
	
	public function __construct(){
		parent::__construct();
		
		$this->reply=new Reply();
		$this->init();
	}
	
	private function init(){
		$bid=$this->get('rid','','/^\d{10}$/');
		$rid=$this->get('id','','/^\d{10}$/');
		$type=$this->get('type','','/^\w+$/');
		if(empty($bid) || empty($rid) || empty($type)){
			error_page();	
		}
			
		if($type=='topic'){
			$table='review';
			$this->tpl->assign('LOCATE','blog');
		}
		elseif($type=='asktopic'){
			$table='answer';
			$this->tpl->assign('LOCATE','ask');
		}
		else{
			error_page();
		}
		
		if(isset($_POST['submit']))
			$this->edit_reply($bid,$rid,$table);
		else
			$this->get_reply($rid,$table,$bid,$type);
	}
	
	private function get_reply($rid,$table,$bid,$type){
		$reply=array();
		$reply['rid']=$rid;
		$reply['type']=$type;
		$reply['bid']=$bid;
		$reply['content']=$this->reply->get_content($rid,$table);
		if(empty($reply['content']))
			error_page();
		
		$this->tpl->assign('REPLY',$reply);
	}
	
	private function edit_reply($bid,$rid,$table){
		$content=$this->post('wmd-html','');
		
		$flag=false;
		if(!empty($content))
			$flag=$this->reply->edit_reply($rid,$content,$table);
		
		if($table=='review')
			$dir='topic';
		elseif($table=='answer')
			$dir='asktopic';
			
		if($flag)
			turn_page('/'.$dir.'/'.$bid);
		else
			error_page();
	}
	
	public function display(){
		$this->tpl->display($this->display_page.".tpl");
	}
}

$replyController=new ReplyController();
$replyController->display();
?>