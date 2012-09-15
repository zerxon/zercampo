<?php

class Collector{
	private $url;
	
	public function __construct($url){
		$this->url=$url;
		
	}
	
	public function getContent(){
		try {
			$html=file_get_contents($this->url);
		} 
		catch (Exception $e) {
			return null;
		}
			
		preg_match('/<title>([^<]+)<\/title>/', $html,$match);
		$title=$match[1];
		
		preg_match('/<meta name="description" content="([^<]+)" \/>/',$html,$match);
		$content=$match[1];
		
		$data=array();
		$data['title']=iconv('UTF-8', 'GBK', $title);
		$data['content']=iconv('UTF-8', 'GBK',$content);
		
		return $data;
	}
}

?>