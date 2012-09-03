<?php
$arr=array(array(0,0,1,1,0),
		   array(1,1,0,1,1),
		   array(0,1,0,0,0),
		   array(0,1,0,0,0),
		   array(1,0,0,1,0));

$size=5;
$match=array();

function is_exist($match,$arr,$i,$j){
	$flag=false;

	for($k=$i-1;$k>=0;$k--){
		if($arr[$k][$j]==1){
			$flag=true;
			$tmp=pre($arr,$k,$j);
			if($tmp){
				$match[$k]=$tmp;
				break;
			}
		}
	}

	if(!$flag){
		$match[$i]=$j;
		echo $match[$i];exit(0);
	}
}

function pre($match,$arr,$i,$j){
	for($k=$j+1;$k<5;$k++){
		if($arr[$i][$k]==1)
			return $j;
	}

	return 0;
}

for($i=0;$i<$size;$i++){
	for ($j=0;$j<$size;$j++){ 
		if($arr[$i][$j]==1){
				is_exist($match,$arr,$i,$j);
		}

	}
}

foreach ($match as $key => $value) {
	echo $key."=>".$value.'<pre>';
}


?>