<?php
ini_set("memory_limit", "1024M");
require dirname(__FILE__).'/../core/init.php';

/* Do NOT delete this comment */
/* 不要删除这段注释 */

$configs = array(
	'name' => '电影天堂',
	'log_show' => true, //显示爬区面板
	//'log_file' => data/movie.log,  //日志存放地址
	'log_type' => 'info,warn,debug,error' , //日志类型
	'input_encoding' => 'GB2312',
	'output_encoding' => 'GB2312', //输入输出编码
	'tasknum' => 5 , // 同时工作的爬虫任务数
	//'multiserver' => true, //多服务器处理
	//'save_running_state' => true, //保存爬虫运行状态redis，默认位false, config/inc_config.php配置里配置
	'export' => array(
	    'type' => 'db',
	    'table' => 'testPhpSpider' // 如果数据表没有数据新增请检查表结构和字段名是否匹配
	),
	'domains' => array(
	    "www.dy2018.com"
	),
	'scan_urls' => array(
        "http://www.dy2018.com/"
	),
	'list_url_regexes' => array(
        
    ),
    'content_url_regexes' => array(
        'http://www.dy2018.com/i/97952.html'
    ),
    'fields' => array(
        // 片名
        array(
            'name' => "title",
            'selector' => "//*[@id='Zoom']/p[3]",
            'required' => true,
        ),
        //发布时间
        array(
            'name' => "addtime",
            'selector' => "//*[@id='Zoom']/p[9]",
            'required' => true,
        ),
        //url
         array(
            'name' => "url",
            'selector' => "//*[@id='Zoom']/table/tbody/tr/td/a",
            'required' => true,
        ),
         //img
         array(
            'name' => "image",
            'selector' => "//*[@id='Zoom']/p[1]",
            'required' => true,
        ),
    ),
);


$spider = new phpspider($configs);
$spider->on_extract_field = function($fieldname, $data, $page) {
    return $data;
};
$spider->start();


