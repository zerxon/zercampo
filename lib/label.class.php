<?php
require_once 'mysqldb.class.php';

class Label{
	
	private $db;
	
	public function __construct(){
		$this->db=new MysqlDB();
		
	}
	
	//从标签字符串转为数字字符串
	public function label_to_lid($label,$type){
		$label_array=explode("|",strtolower($label));
		
		$str_lid="|";
		foreach($label_array as $item){
			if(!empty($item)){
				$sql="select lid from label where name='".$item."' and type=".$type;
				$lid=$this->db->get_value($sql);
				
				if(empty($lid)){
					$sql_insert="insert into label(name,type) values('".$item."','".$type."')";
					$this->db->query($sql_insert);
					
					$sql_select="select lid from label where name='".$item."' and type=".$type;
					$lid=$this->db->get_value($sql_select);
				}
				
				$str_lid.=$lid."|";
			}
		}
		
		return $str_lid;
	}
	
	//根据如|8|6|的形式获取如php,ruby标签名数组
	public function get_label_name($str_lid){
		$lid_array=explode("|",$str_lid);
		
		$name_array=array();
		foreach($lid_array as $lid){
			if(!empty($lid)){
				$sql="select name from label where lid=".$lid;
				$name=$this->db->get_value($sql);
				
				array_push($name_array,$name);
			}
		}
		
		return $name_array;
	}
	
	//获取相关文章的bid
	public function get_bid_array($str_lid,$bid,$table){
		$lid_array=explode("|",$str_lid);
		
		$bid_array=array();
		foreach($lid_array as $lid){
			if(!empty($lid)){
				$sql="select date from ".$table." where label like '%|".$lid."|%' and date<>'".$bid."'";
				$rows=$this->db->get_rows($sql);
				
				foreach($rows as $row)
					array_push($bid_array,$row['date']);
			}
		}
		
		array_unique($bid_array);
		return $bid_array;
	}
}
?>