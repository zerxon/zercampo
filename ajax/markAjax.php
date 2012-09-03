<?php
require_once '../lib/collection.class.php';

session_start();

if(!isset($_SESSION['user'])){
	echo 'error';
	exit(0);
}

if(isset($_GET['id']) && isset($_GET['type']) && isset($_GET['table'])){
	$id=$_GET['id'];
	$type=$_GET['type'];
	$table=$_GET['table'];
	
	$collect=new Collection($_SESSION['user']['username'],$table.'_collect',$table);
	$collect->do_collect($id,$type);
	$collect_count=$collect->get_total($table,$id);
	
	$html='';
	if($type=='mark')
		$html='yes';
	elseif($type=='cancel')
		$html='no';
		
	$collect_count=$collect_count==''?0:$collect_count;
	$html.="|".$collect_count;
		
	echo $html;
}
else{
	echo 'error';
}
?>