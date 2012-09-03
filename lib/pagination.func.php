<?php
function pagination(&$show_sql,$cur_page,$page_size,$url,$get_order='')
{	 
	 $sql_total="select count(*) from ".$url;
	 $query=mysql_query($sql_total);
	 $row=mysql_fetch_row($query);
	 $total=$row[0];
	 
	 if($total)
	 {
		if($total<$page_size)
			$page_count=1;
		if($total%$page_size)
			$page_count=(int)($total/$page_size)+1;
		else
			$page_count=$total/$page_size;
	 }
	 else
	 {
		$page_count=0;
	 }
	 
	 $turn_page="";
	 if($page_count>0)
	 {
		if($cur_page>3)
		{
			if($get_order)
				$turn_page .= '<li><a href="/'.$url.'/'.substr($get_order,1).'">&lt;</a></li>';
			else
				$turn_page .= '<li><a href="/'.$url.'">&lt;</a></li>';
		}
		else
		{
			$turn_page .= '<li class="prev disabled"><a href="javascript:void(0);">&lt;</a></li>';
		}
		
		$list_count = $page_count<=5?$page_count:5;
		
		$index=1;
		if($page_count>5 && ($cur_page-2>1))
		{
			$index=$cur_page-2;
			while($index<=$page_count && $index<=$cur_page+2)
			{
				if($index==$cur_page)
					$turn_page.='<li class="active">';
				else
					$turn_page.='<li>';
				
				$turn_page .= '<a href="/'.$url.'/page/'.$index.$get_order.'">'.$index.'</a></li>';
				$index++;
			}
		}
		else
		{
			while($index<=$list_count)
			{
				if($index==$cur_page)
					$turn_page.='<li class="active">';
				else
					$turn_page.='<li>';
				
				$turn_page .= '<a href="/'.$url.'/page/'.$index.$get_order.'">'.$index.'</a></li> ';
				$index++;
			}
		}
		
		if($cur_page<$page_count && $page_count>5 && $index<$page_count+1)
		{
			$turn_page .= '<li><a href="/'.$url.'/page/'.$page_count.$get_order.'">&gt;</a></li>';
		}
		else
		{
			$turn_page .= '<li class="next disabled"><a href="javascript:void(0);">&gt;</a></li>';
		}
	 }
	 
	 $show_sql=$show_sql." limit ".($cur_page-1)*$page_size .', '.$page_size;
	 
	 return $turn_page;
}
?>