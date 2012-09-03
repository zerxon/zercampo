<?php
require_once '../lib/pageModel.class.php';

class AdminLogin extends PageModel {
	public function __construct(){
		 parent::__construct();
		 
		 $this->do_login();
	}
	
	private function do_login(){
		if(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin']){
			turn_page('./');
		}
		elseif(isset($_POST['submit'])){
			$username=$_SESSION['user']['username'];
			$password=$this->post('pwd','');
			$password=encode_password($password);
			
			$sql="select password from user where username='".$username."'";
			$pwd=$this->db->get_value($sql);
			
			if($password==$pwd){
				$_SESSION['adminLogin']=true;
				turn_page('./');
			}
			else{
				$this->tpl->assign('ERROR',true);
			}
		}
	}
	
	public function display(){
		$this->tpl->display('admin_login.tpl');
	}
}

$adminLogin=new AdminLogin();
$adminLogin->display();
?>