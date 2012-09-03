<?php
require_once 'smarty/Smarty.class.php';
require_once 'mysqldb.class.php';
require_once 'global.func.php';

abstract class PageModel{
	public $db;
	public $tpl;
	public $page;
	public $isLogin;
	
	public function __construct(){
		$this->db = new MysqlDB();
		$this->tpl = new Smarty();
		session_start();
		
		$this->check_state();
	}
	
	public function get($key,$default,$rule='null'){
		$flag=false;
		$get='';
		
		if(isset($_GET[$key]) && trim($_GET[$key])!=''){
			$get=filter(trim($_GET[$key]));
			if($rule=='null' || preg_match($rule,$get))
				$flag=true;
		}
		
		if($flag)
			return $get;
		else
			return $default;
	}
	
	public function post($key,$default,$rule='null'){
		$flag=false;
		$post='';
		
		if(isset($_POST[$key]) && trim($_POST[$key])!=''){
			$post=filter(trim($_POST[$key]));
			if($rule=='null' || preg_match($rule,$post))
				$flag=true;
		}
		
		if($flag)
			return $post;
		else
			return $default;
	}
	
	public function check_state(){
		if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
			$this->isLogin=true;
		}
		else{
			$this->isLogin=false;
			if(isset($_COOKIE["user"]) && !empty($_COOKIE['user'])){
				$account=explode("|",$_COOKIE['user']);
				$email=$account[0];
				$password=$account[1];
				$sql="select username,password,email,score,authority from user where email='".$email."'";
				$result=$this->db->get_one($sql);
				if($password==$result['password']){
					$_SESSION['user']=$result;
					$_SESSION['user']['password']='';
					$_SESSION['user']['gravatar']=gravatar($email);
					
					$this->update_login_time();
					$this->isLogin=true;
				}
			}
		}
		
		if($this->isLogin){
			$sql="select count(*) from notifications where is_read=0 and owner='".$_SESSION['user']['username']."'";
			$n_count=$this->db->get_value($sql);
			$_SESSION['user']['ncount']=$n_count;
		}
			
		$this->tpl->assign('ISLOGIN',$this->isLogin);
	}
	
	public function update_login_time(){
		$time=time();
		$email=$_SESSION['user']['email'];
		$sql="update user set lastlogin_time='".$time."' where email='".$email."'";
		$this->db->query($sql);
	}
	
	public function get_state($table_array,$condition=''){
		$result_list=array();
		foreach($table_array as $table){
			$sql="select count(*) as count from ".$table." ".$condition;
			$result=$this->db->get_one($sql);
			$count=$result['count'];
			$result_list[$table]=$count;
		}
		
		return $result_list;
	}
	
	public abstract function display();
}
?>