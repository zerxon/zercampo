<?php
require_once 'mysqldb.class.php';

class Reply{
	
	private $db;
	
	public function __construct(){
		$this->db=new MysqlDB();
	}
	
	public function add_reply($bid,$name,$content,$type){
		
		if($type==1){
			$sql="select max(order_id) from review where bid='".$bid."'";
		}
		elseif($type==2){
			$sql="select max(order_id) from answer where aid='".$bid."'";
		}
		
		$order_id=$this->db->get_value($sql);
		if($order_id)
			$order_id=$order_id+1;
		else
			$order_id=1;
			
		$date=time();
		if($type==1){
			$insert_sql="insert into review(bid,author,order_id,reply_content,date) values('".$bid."','".$name."',".$order_id.",'".$content."','".$date."')";
			$update_sql="update blog set reply_count=reply_count+1,update_time='".$date."' where date='".$bid."'";
		}
		else if($type==2){
			$insert_sql="insert into answer(aid,author,order_id,answer_content,be_adopt,date) values('".$bid."','".$name."','".$order_id."','".$content."',0,'".$date."')";
			$update_sql="update ask set answer_count=answer_count+1,update_time='".$date."' where date='".$bid."'";
		}
		
		$this->db->query($insert_sql);
		$this->db->query($update_sql);
		
		return $order_id;
	}
	
	public function get_content($rid,$table){
		if($table=='review')
			$col="reply_content";
		elseif($table=="answer")
			$col="answer_content";
		else
			return '';
		
		$sql="select ".$col." from ".$table." where date='".$rid."'";
		$reply_content=$this->db->get_value($sql);
		if(!empty($reply_content))
			return $reply_content;
		else
			return '';
	}
	
	public function edit_reply($rid,$content,$table){
		if($table=='review')
			$col="reply_content";
		elseif($table=="answer")
			$col="answer_content";
		else
			return false;
		
		$last_reply_time=time();
		$sql="update ".$table." set ".$col."='".$content."',last_edit_time='".$last_reply_time."' where date='".$rid."'";
		$this->db->query($sql);
		
		return true;
	}
}
?>