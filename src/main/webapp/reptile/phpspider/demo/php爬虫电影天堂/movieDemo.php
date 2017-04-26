<?php
ini_set("memory_limit", "1024M");
require dirname(__FILE__).'/../core/init.php';


$url = "http://www.dy2018.com/";
$html = requests::get($url);
//echo $html;
// 选择器规则
$selector = "//*[@id='header']/div/div[3]/div[4]/div[1]/div[2]/ul/li[1]";
// 提取结果
$result = selector::select($html, $selector);
// echo $result;

$url_detail = $url;
if (preg_match('/href=\"(.*)\" /', $result, $matches)){
    $url_detail .= $matches[1];
}

//再获取电影天堂详情
$html_detail = requests::get($url_detail);
// echo $html_detail;
$selector_img = "//*[@id='Zoom']/p[1]";

$result_img = selector::select($html_detail, $selector_img);
// echo $result_img;

echo $html_detail;
$selector_img2 = "//*[@id='Zoom']/table/tbody/tr/td/a";
$result_title = selector::select($html_detail, $selector_img2);
echo $result_title;
