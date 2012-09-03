<?php
require_once 'lib/pageModel.class.php';
require_once 'lib/notifications.class.php';

class NoticeController extends PageModel{
	private $locate='notifications';
	
	public function __construct(){
		parent::__construct();
		
		if(!$this->isLogin)
			error_page();
		else
			$this->init();
	}
	
	private function init(){
		$this->tpl->assign('LOCATE',$this->locate);
		$notifications=new Notifications();
		
		$nid=$this->get('id','');
		if($nid){
			if(!preg_match('/\d+/',$nid))
				error_page();
			
			$owner=$_SESSION['user']['username'];
			$notifications->del_notification($nid,$owner);
		}
		
		$notice=$notifications->get_notifications($_SESSION['user']['username']);	
		$this->tpl->assign('NOTICE',$notice);
	}
	
	public function display(){
		$this->tpl->display('notifications.tpl');
	}
}

$notice_controller=new NoticeController();
$notice_controller->display();
?>