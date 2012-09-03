<?php
require_once 'lib/pageModel.class.php';
require_once 'lib/label.class.php';
require_once 'lib/notifications.class.php';

class NewAsk extends pageModel{
	private $locate='ask';
	
	public function __construct(){
		parent::__construct();
		
		$this->init();
	}
	
	private function init(){
		$this->tpl->assign('LOCATE',$this->locate);
		
		if(!$this->isLogin)
			error_page();
			
		if(isset($_POST['submit']))
			$this->add_ask();
	}
	
	private function add_ask(){
		$title=$this->post('title','');
		$label=$this->post('label','');
		$score=$this->post('score','','/^\d+$/');
		$content=$this->post('wmd-html','');
		
		if($title && $content){
			$date=time();
			$author=$_SESSION['user']['username'];
			
			if(!empty($label)){
				$label_instance=new Label();
				$label=$label_instance->label_to_lid($label,2); //第二个参数2表示是问答区的标签
			}
			
			if(preg_match('/@\w{3,10}\s/',$content)){
				$nitification=new Notifications();
				$content=$nitification->referer_links($content,$date,6);
			}
			
			//更新提问者的分数
			if($score>0){			
				$sql_update="update user set score=score-".$score." where username='".$author."'";
				$this->db->query($sql_update);
			}
			
			$sql="insert into ask(title,author,score,content,label,date,update_time) 
			values('".$title."','".$author."',".$score.",'".$content."','".$label."','".$date."','".$date."')";
			$this->db->query($sql);
			
			turn_page('/ask');
		}
		else{
			error_page();
		}
	}
	
	public function display(){
		$this->tpl->display('newask.tpl');
	}
}

$new_ask=new NewAsk();
$new_ask->display();
?>