<?php
require_once 'lib/pageModel.class.php';

class Setting extends PageModel{
	private $display_page;
	
	public function __construct(){
		parent::__construct();
		
		$this->init();
	}
	
	private function init(){
		if(!$this->isLogin)
			error_page();
		
		if(isset($_POST['info_submit']))
			$this->update_info();
			
		if(isset($_POST['password_submit']))
			$this->update_pwd();
		
		$type=$this->get('type','','/^[a-z]+$/');
		switch($type){
			case 'password':
				$this->display_page='password';
				break;
			default:
				$this->display_page='setting';
				$this->get_userinfo($_SESSION['user']['username']);
		}
	}
	
	private function get_userinfo($username){
		$sql="select username,email,web_url,qq,weibo,description from user where username='".$username."'";
		$user=$this->db->get_one($sql);
		$user['gravatar']=gravatar($user['email']);
		
		$this->tpl->assign('USER',$user);
	}
	
	private function update_info(){
		$url=$this->post('url','');
		$qq=$this->post('qq','','/^\w{6,}$/');
		$weibo=$this->post('weibo','');
		$desc=htmlspecialchars($_POST['desc']);
		
		$sql="update user set web_url='".$url."',qq='".$qq."',weibo='".$weibo."',description='".$desc."' where username='".$_SESSION['user']['username']."'";
		$this->db->query($sql);
		
		$this->tpl->assign('SUCCESS',true);
	}
	
	private function update_pwd(){
		$username=$_SESSION['user']['username'];
		
		$pwd=$this->post('pwd','');
		$pwd=encode_password($pwd);
		$sql="select password from user where username='".$username."'";
		$result=$this->db->get_one($sql);
		$password=$result['password'];
		
		if($pwd!=$password)
			error_page();
			
		$npwd=$this->post('npwd','');
		if(strstr($npwd,' '))
			error_page();
		
		if(strlen($npwd)<6 || strlen($npwd)>20)
			error_page();
		 
		 $cpwd=$this->post('cpwd','');
		if($cpwd!=$npwd)
			error_page();
		
		$new_pwd=encode_password($npwd);
		$sql_update="update user set password='".$new_pwd."' where username='".$username."'";
		$this->db->query($sql_update);
		
		$this->tpl->assign('SUCCESS',true);
	}
	
	public function display(){
		$this->tpl->display($this->display_page.'.tpl');	
	}
}

$setting=new Setting();
$setting->display();

?>