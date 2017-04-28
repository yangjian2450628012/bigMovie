<?php
ini_set("memory_limit", "1024M");
require dirname(__FILE__).'/core/init.php';
/* 获取最新影片数据 */
define("domains_url", "www.dy2018.com");
$url = 'http://'.domains_url.'/html/gndy/dyzz/index.html'; //最新movieURL
$html = requests::get($url); //获取最新movie的html页面

$selector = "//*[@id='header']/div/div[3]/div[6]/div[2]/div[2]/div[2]/ul/td/table//@href"; //获取有a标签的href

$result = selector::select($html, $selector);  //获取列表的数组
//TODO 如果有分页情况
for ($i=0; $i < count($result); $i++) { 
	$url_detail = 'http://'.domains_url.$result[$i];

	$config = new Array(
		'name' => 'movie详情',
		'log_show' => true,
		'log_type' => 'info,warn,debug,error' , //日志类型
		'input_encoding' => 'GB2312',
		'output_encoding' => 'GB2312', //输入输出编码
		'tasknum' => 10,  //开启线程数
		'domains' => array(domains_url),
		'scan_urls' => array(domains_url),
		'list_url_regexes' => array($url_detail),
	    'content_url_regexes' => array($url_detail),
	    'fields' => array(
	    	array('name' => "movie_name",'selector' => "//*[@id='Zoom']/p[3]",'required' => true,),
	    	array('name' => "image",'selector' => "//*[@id='Zoom']/p[1]//@src",'required' => true,),
	    	array('name' => "translation",'selector' => "//*[@id='Zoom']/p[2]",'required' => true,),
	    	array('name' => "upload_time",'selector' => "//*[@id='header']/div/div[3]/div[2]/div[6]/div[2]/ul/div[1]/span[3]",'required' => true,),
	    	array('name' => "years",'selector' => "//*[@id='Zoom']/p[4]",'required' => true,),
	    	array('name' => "country",'selector' => "//*[@id='Zoom']/p[5]",'required' => true,),
	    	array('name' => "classification_type",'selector' => "//*[@id='Zoom']/p[6]",'required' => true,),
	    	array('name' => "language",'selector' => "//*[@id='Zoom']/p[7]",'required' => true,),
	    	array('name' => "subtitle",'selector' => "//*[@id='Zoom']/p[8]",'required' => true,),
	    	



	    ),
	);	
}




