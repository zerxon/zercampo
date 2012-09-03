<?php
require_once '../lib/adminModel.class.php';
require_once '../lib/pagination.class.php';

class UserManage extends AdminModel{
	private $locate='user_manage';
	private $display_page='user_manage';
	private $pagination;
	private $page_size=30;
	
	public function __construct(){
		parent::__construct();
		
		if($_SESSION['user']['authority']==1){
			$this->pagination=new Pagination($this->page_size);
			$this->init();
		}
		else{
			error_page();
		}
	}
	
	private function init(){
		$this->tpl->assign('LOCATE',$this->locate);
		
		$type=$this->get('type','');
		$username=$this->get('username','');
		
		if(!empty($type) && !empty($username)){
			if($_SESSION['user']['authority']==1 && $type=='edit' && preg_match('/^\w+$/',$username)){
				$this->locate='home';
				$this->tpl->assign('LOCATE',$this->locate);
				$this->display_page='user_edit';
				$this->eidt_user($username);
			}
			else{
				error_page();
			}
		}
		else{
			$page=$this->get('page',1,'/^\d+$/');
			$this->get_user_list($page);
		}
	}
	
	private function get_user_list($page){
		$sql="select uid,username,password,email,join_time,score,authority from user";
		
		$user_list=$this->pagination->paging($page,$sql,'user');		
		$page_list=$this->pagination->show_pagination($this->locate.'.php');
		
		for($i=0;$i<count($user_list);$i++){
			$user_list[$i]['join_time']=ordinaryDate($user_list[$i]['join_time']);
		}
		
		$this->tpl->assign('USERLIST',$user_list);
		$this->tpl->assign('PAGELIST',$page_list);
	}
	
	private function eidt_user($username){
		if(isset($_POST['submit'])){
			$uid=$this->post('uid','','/^\d+$/');
			$username=$this->post('name','','/^\w+$/');
			$authority=$this->post('authority','','/^[0-9]$/');
			$email=$this->post('email','','/^\w+([\-\+\.]\w+)*@\w+([\-]\w+)*\w+([\-\.]\w{2,})*$/');
			$score=$this->post('score','','/^\d+$/');
			$url=$this->post('url','');
			$qq=$this->post('qq','','/^\w{6,}$/');
			$weibo=$this->post('weibo','');
			$desc=htmlspecialchars($_POST['desc']);
			
			if($uid && $username && $authority && $email && $score){
				$sql="update user set username='".$username."',email='".$email."',score=".$score.",authority=".$authority.",web_url='".$url."',qq='".$qq."',weibo='".$weibo."',description='".$desc."' where uid=".$uid;
				$this->db->query($sql);
				
				$this->tpl->assign('SUCCESS',true);
			}
			else{
				error_page();
			}
		}

		$sql="select uid,username,email,score,authority,web_url,qq,weibo,description from user where username='".$username."'";
		$user=$this->db->get_one($sql);
		if(empty($user))
			error_page();

		$user['gravatar']=gravatar($user['email']);
		$this->tpl->assign('USER',$user);
	}
	
	public function display(){
		$this->tpl->display($this->display_page.'.tpl');
	}
}

$userManage=new UserManage();
$userManage->display();
?>