<?php
require_once 'lib/pageModel.class.php';

class Account extends PageModel{
	private $display_page;
	
	public function __construct(){
		parent::__construct();
		$this->init();
	}
	
	private function init(){
		$type=$this->get('type','','/^[a-z]+/');
		switch($type){
			case 'login':
				$this->display_page='login';
				$this->tpl->assign('LOCATE',$this->display_page);
				$this->login();
				break;
			case 'logout':
				$this->display_page='index';
				$this->logout();
				break;
			case 'signup':
				$this->display_page='signup';
				$this->tpl->assign('LOCATE',$this->display_page);
				$this->signup();
				break;
			default:
				error_page();
		}
	}
	
	private function login(){
		if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
			turn_page('/');
		}
		else if(isset($_POST['submit'])){
			if($this->check_login()){
				$this->update_login_time(); //¸üÐÂ×îºóµÇÂ¼Ê±¼ä
				turn_page('/');
			}
			else{
				$this->tpl->assign('ERROR',true);
			}
		}
	}
	
	private function check_login(){
		$name=$this->post('name','','/^\w+$/');
		if(empty($name)){
			$name=$this->post('name','','/^\w+([\-\+\.]\w+)*@\w+([\-]\w+)*\w+([\-\.]\w{2,})*$/');
			$condition="email='".$name."'";
		}
		else{
			$condition="username='".$name."'";
		}
		
		$password=$this->post('pwd','');
		$state=false;
		
		if($name && $password){
			$sql="select username,password,email,score,authority from user where ".$condition;
			$result=$this->db->get_one($sql);
			$password=encode_password($password);
			if($result['password']==$password){
				$state=true;
				$_SESSION['user']=$result;
				$_SESSION['user']['password']='';
				$_SESSION['user']['gravatar']=gravatar($result['email']);
				
				if(isset($_POST['keep']))
					setcookie('user',$result['email'].'|'.$password,time()+30*24*60*60,"/");
			}
		}
		
		return $state;
	}
	
	private function logout(){
 		turn_page('/logout');
	}
	
	private function signup(){
		if(isset($_POST['submit'])){
			$name=$this->post('name','','/^\w{3,}$/');
			$email=$this->post('email','/^\w+([\-\+\.]\w+)*@\w+([\-]\w+)*\w+([\-\.]\w{2,})*$/');
			$pwd=$this->post('pwd','');
			if(!empty($pwd))
				$pwd=strstr($pwd," ")?'':$pwd;
			if(!empty($pwd))
				$pwd=strlen($pwd)>=6?$pwd:'';
				
			$cpwd=$this->post('cpwd','');
			$cpwd=$cpwd==$pwd?$cpwd:'';
			
			if($name && $email && $pwd && $cpwd){
				$date=time();
				$password=encode_password($pwd);
				$sql="insert into user(username,password,email,join_time,lastlogin_time) values('".$name."','".$password."','".$email."','".$date."',".$date.")";
				$this->db->query($sql);
				
				if(isset($_POST['keep']))
					setcookie('user',$email.'|'.encode_password($pwd),time()+30*24*60*60,"/");
				
				//´ÓÊý¾Ý¿âÖÐ»ñÈ¡ÓÃ»§ÐÅÏ¢
				$sql="select username,email,score,authority from user where email='".$email."'";
				$user=$this->db->get_one($sql);
				$_SESSION['user']=$user;
				$_SESSION['user']['gravatar']=gravatar($user['email']);
					
				header("location:/profile");
			}
			else{
				error_page();
			}
		}
	}
	
	public function display(){
		if($this->display_page=='index'){
			turn_page('/');
		}
		else{
			$this->tpl->display($this->display_page.".tpl");
		}
	}
}

$account=new Account();
$account->display();
?>