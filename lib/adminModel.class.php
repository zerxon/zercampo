<?php
require_once 'pageModel.class.php';

class AdminModel extends PageModel{
	public $adminLogin;
	
	public function __construct(){
		parent::__construct();
		
		if(!isset($_SESSION['adminLogin']) || !$_SESSION['adminLogin'])
			$this->check_permission();
	}
	
	private function check_permission(){
		if($this->isLogin && $_SESSION['user']['authority']<3){
			if(!$this->adminLogin)
				turn_page('./admin_login.php');
		}
		else{
			error_page();
		}
	}
	
	public function display(){
		
	}
}
?>