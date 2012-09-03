<?php
require_once 'mysqldb.class.php';

class Pagination{
	private $db;
	private $total;
	private $cur_page;
	private $page_size;
	private $page_count;
	
	public function __construct($page_size){
		$this->page_size=$page_size;
		
		$this->db=new MysqlDB();
	}
	
	public function paging($cur_page,$sql,$table){
		$this->cur_page=$cur_page;
		$sql_total="select count(*) from ".$table;
		$this->total=$this->db->get_value($sql_total);
		
		if(!$this->total)
			return false;
		
		if($this->total<=$this->page_size)
			$this->page_count=1;
		elseif($this->total%$this->page_size)
			$this->page_count=(int)($this->total/$this->page_size)+1;
		else
			$this->page_count=$this->total/$this->page_size;
			
		if($this->cur_page<1 || $this->cur_page>$this->page_count)
			return false;
		
		$sql=$sql." limit ".($cur_page-1)*$this->page_size .','.$this->page_size;
		$rows=$this->db->get_rows($sql);
		
		return $rows;
	}
	
	public function show_pagination($url){
		$arr=array();
		$arr['left']='每页'.$this->page_size.'条，当前'.$this->cur_page.'/'.$this->page_count.'页，共'.$this->total.'条记录';
		
		$str='';
		if($this->page_count>1){
			if($this->cur_page==1)
				$str='上一页&nbsp;&nbsp;<a href="./'.$url.'?page='.($this->cur_page+1).'">下一页</a>';
			elseif($this->cur_page>1 && $this->cur_page<$this->page_count)
				$str='<a href="./'.$url.'?page='.($this->cur_page-1).'">上一页</a>&nbsp;&nbsp;<a href="./'.$url.'?page='.($this->cur_page+1).'">下一页</a>';
			else
				$str=$str='<a href="./'.$url.'?page='.($this->cur_page-1).'">上一页</a>&nbsp;&nbsp;下一页';
		}
		else{
			$str='上一页&nbsp;&nbsp;下一页';
		}
		
		$arr['right']=$str;
		return $arr;
	}
}
?>