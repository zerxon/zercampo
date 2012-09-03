<?php
require_once 'mysqldb.class.php';

class Collection{
	private $username;
	private $key;
	private $table;
	private $db;
	
	public function __construct($username,$key,$table){
		$this->username=$username;
		$this->key=$key;
		$this->table=$table;
		
		$this->db=new MysqlDB();	
	}
	
	public function get_user_collect(){
		$sql_select="select ".$this->key." from user where username='".$this->username."'";
		$result=$this->db->get_one($sql_select);
		$collect=$result[$this->key];
		
		return $collect;
	}
	
	public function get_total($table,$id){
		$sql="select collect_count from ".$table." where date='".$id."'";
		$total=$this->db->get_value($sql);
		
		return $total;
	}
	
	public function do_collect($bid,$type){
		$sql_select="select ".$this->key." from user where username='".$this->username."'";
		$result=$this->db->get_one($sql_select);
		$collect=$result[$this-> key];
		
		if($type=='mark'){
			if(empty($collect))
				$collect=$bid;
			elseif(strstr($this->get_user_collect(),$bid))
				return false;
			else
				$collect=$bid."|".$collect;
			
			$c='+1';
		}
		else if($type=='cancel'){
			if(strstr($collect,$bid."|"))
				$collect=str_replace($bid."|","",$collect);
			elseif(strstr($collect,"|".$bid))
				$collect=str_replace("|".$bid,"",$collect);
			elseif(strstr($collect,$bid))
				$collect=str_replace($bid,"",$collect);
			else
				return false;
			
			$c='-1';
		}
		else{
			return false;
		}
		
		//更新收藏
		$sql_update="update user set ".$this->key."='".$collect."' where username='".$this->username."'";
		$this->db->query($sql_update);
		
		//更新收藏数
		$sql_count="update ".$this->table." set collect_count=collect_count".$c." where date=".$bid;
		$this->db->query($sql_count);
		
		return true;
	}
}
?>