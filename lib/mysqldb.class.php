<?php 

class MysqlDB{
	private $db_type='mysql';
	private $db_host='localhost';
	private $db_name='zerxon';
	private $db_username='root';
	private $db_userpass='toor';
	private $conn;
	
	public function __construct(){
		$this->init();
	}
	
	private function init(){
		$this->conn=mysql_connect($this->db_host,$this->db_username,$this->db_userpass);
 		mysql_select_db($this->db_name);
		mysql_set_charset("GBK");
	}
	
	public function get_rows($sql){
		$result=mysql_query($sql);
		if(!$result)
			$this->error($sql);
		
		$rows=array();
		while($item=mysql_fetch_assoc($result)){
			array_push($rows,$item);
		}
		return $rows;
	}
	
	public function get_one($sql){
		$result=mysql_query($sql);
		if(!$result)
			$this->error($sql);
		
		$one=mysql_fetch_assoc($result);
		return $one;
	}
	
	public function get_value($sql){
		$result=mysql_query($sql);
		if(!$result)
			$this->error($sql);
		
		$row=mysql_fetch_row($result);
		return $row[0];
	}
	
	public function query($sql){
		$result=mysql_query($sql);
		if($result)
			return true;
		else
			$this->error($sql);
	}
	
	private function error($sql){
		echo "<strong>Error: </strong>".$sql;
		exit(0);
	}
}
?>