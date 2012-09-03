<?php
require_once 'lib/pageModel.class.php';
require_once 'lib/label.class.php';
require_once 'lib/notifications.class.php';

class NewTopic extends PageModel{
	private $locate='blog';
	
	public function __construct(){
		parent::__construct();
		
		$this->init();
	}
	
	private function init(){
		$this->tpl->assign('LOCATE',$this->locate);
		
		if(!$this->isLogin)
			error_page();
		
		if(isset($_POST['submit']))
			$this->add_topic();
	}
	
	private function add_topic(){
		$title=$this->post('title','');
		$label=$this->post('label','');
		$content=$this->post('wmd-html','');
		
		if($title && $content){
			$date=time();
			$author=$_SESSION['user']['username'];
			
			if(!empty($label)){
				$label_instance=new Label();
				$label=$label_instance->label_to_lid($label,1); //第二个参数1表示是博客区的标签
			}
			
			if(preg_match('/@\w{3,10}\s/',$content)){
				$nitification=new Notifications();
				$content=$nitification->referer_links($content,$date,5);
			}
			
			$sql="insert into blog(title,author,label,content,date,update_time) 
			values('".$title."','".$author."','".$label."','".$content."','".$date."','".$date."')";
			$this->db->query($sql);
			
			turn_page('/blog');
		}
		else{
			error_page();
		}
	}
	
	public function display(){
		$this->tpl->display('newtopic.tpl');
	}
}

$new_topic=new NewTopic();
$new_topic->display();
?>