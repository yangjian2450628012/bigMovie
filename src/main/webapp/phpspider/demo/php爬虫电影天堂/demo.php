<?php
ini_set("memory_limit", "1024M");
require dirname(__FILE__).'/../core/init.php';

define("domains_url", "http://www.dy2018.com");

$url = 'http://www.dy2018.com/html/gndy/dyzz/index.html';
$html = requests::get($url); //获取最新电影的html页面

$selector = "//*[@id='header']/div/div[3]/div[6]/div[2]/div[2]/div[2]/ul/td/table//@href"; //获取有a标签的href

$result = selector::select($html, $selector);

//echo json_encode($result); 数组以文本输出
// 先测试第一个
$url_detail = domains_url.$result[0];
$html_detail = requests::get($url_detail);

$selector_detail_uploadtime = "//*[@id='header']/div/div[3]/div[2]/div[6]/div[2]/ul/div[1]/span[3]";
$result_detail_uploadtime = selector::select($html_detail, $selector_detail_uploadtime);
//TODO 发布日期截取
echo 'result_detail_uploadtime===>'.$result_detail_uploadtime; //发布日期,换行便于查看

$selector_detail_imageurl = "//*[@id='Zoom']/p[1]//@src";
$result_detail_imageurl = selector::select($html_detail, $selector_detail_imageurl);
echo 'result_detail_imageurl===>'.$result_detail_imageurl; //图片路径

$selector_detail_translation = "//*[@id='Zoom']/p[2]";
$result_detail_translation = selector::select($html_detail, $selector_detail_translation);
echo 'result_detail_translation===>'.$result_detail_translation; //译名

$selector_detail_moviename = "//*[@id='Zoom']/p[3]";
$result_detail_moviename = selector::select($html_detail, $selector_detail_moviename);
echo 'selector_detail_moviename===>'.$result_detail_moviename; //片名

$selector_detail_years = "//*[@id='Zoom']/p[4]";
$result_detail_years = selector::select($html_detail, $selector_detail_years);
echo 'result_detail_years===>'.$result_detail_years; //年代

$selector_detail_country = "//*[@id='Zoom']/p[5]";
$result_detail_country = selector::select($html_detail, $selector_detail_country);
echo 'result_detail_years===>'.$result_detail_country; //国家

$selector_detail_classificationtype = "//*[@id='Zoom']/p[6]";
$result_detail_classificationtype = selector::select($html_detail, $selector_detail_classificationtype);
echo 'result_detail_classificationtype===>'.$result_detail_classificationtype; //类别

$selector_detail_language = "//*[@id='Zoom']/p[7]";
$result_detail_language = selector::select($html_detail, $selector_detail_language);
echo 'result_detail_language===>'.$result_detail_language; //语言

$selector_detail_subtitle = "//*[@id='Zoom']/p[8]";
$result_detail_subtitle = selector::select($html_detail, $selector_detail_subtitle);
echo 'result_detail_subtitle===>'.$result_detail_subtitle; //字幕

$selector_detail_releasetime = "//*[@id='Zoom']/p[9]";
$result_detail_releasetime = selector::select($html_detail, $selector_detail_releasetime);
echo 'result_detail_releasetime===>'.$result_detail_releasetime; //上映日期

$selector_detail_score = "//*[@id='Zoom']/p[10]";
$result_detail_score = selector::select($html_detail, $selector_detail_score);
echo 'result_detail_score===>'.$result_detail_score; //豆瓣评分

$selector_detail_fileformat = "//*[@id='Zoom']/p[12]";
$result_detail_fileformat = selector::select($html_detail, $selector_detail_fileformat);
echo 'result_detail_fileformat===>'.$result_detail_fileformat; //文件格式

$selector_detail_videosize = "//*[@id='Zoom']/p[13]";
$result_detail_videosize = selector::select($html_detail, $selector_detail_videosize);
echo 'result_detail_videosize===>'.$result_detail_videosize; // 视频尺寸

$selector_detail_filezise = "//*[@id='Zoom']/p[14]";
$result_detail_filezise = selector::select($html_detail, $selector_detail_filezise);
echo 'result_detail_filezise===>'.$result_detail_filezise; // 文件大小

$selector_detail_movielong = "//*[@id='Zoom']/p[15]";
$result_detail_movielong = selector::select($html_detail, $selector_detail_movielong);
echo 'result_detail_movielong===>'.$result_detail_movielong; // 片长

$selector_detail_director = "//*[@id='Zoom']/p[16]";
$result_detail_director = selector::select($html_detail, $selector_detail_director);
echo 'result_detail_director===>'.$result_detail_director; // 导演

$selector_detail_mainactor = "//*[@id='Zoom']/p[17]/following-sibling::p"; //先获取全部p节点数组，再截取(主演截取)
$result_detail_mainactor = selector::select($html_detail, $selector_detail_mainactor);
echo 'result_detail_mainactor===>'.$result_detail_mainactor; // 主演
$r = '';$_count = 0;
for($i=0; $i < count($result_detail_mainactor); $i++){
	if( strpos(trim($result_detail_mainactor[$i]),'◎简介') ){
		break;
	}
	//$_count ++; TODO 后面加主演p占用几各
	$r = $r.$result_detail_mainactor[$i];
}
echo $r;
echo $_count; 

$_count = 4;
$selector_detail_briefintroduction = "//*[@id='Zoom']/p[".(17 + $_count)."]"; 
$result_detail_briefintroduction = selector::select($html_detail, $selector_detail_briefintroduction);
echo 'result_detail_briefintroduction===>'.$result_detail_briefintroduction; // 简介

$selector_detail_url = "//*[@id='Zoom']//a[contains(@href,'ftp')]"; 
$result_detail_url = selector::select($html_detail, $selector_detail_url);
echo 'result_detail_url===>'.$result_detail_url; // url

//循环遍历列表
/*for ($i=0; $i < count($result); $i++) { 
	echo $result[$i];
	$url_detail = domains_url.$result[$i];
	$html_detail = requests::get($url_detail);

	$selector_detail = "";


}*/