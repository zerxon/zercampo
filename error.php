<?php 
require_once 'lib/pageModel.class.php';

class Error extends PageModel{
	
	public function __construct(){
		parent::__construct();
		
	}
	
	public function display(){
		$this->tpl->display('error.tpl'); 
	}
}

$error=new Error();
$error->display();
?>