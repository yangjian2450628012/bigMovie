<?php

$curlobj = curl_init();  
//ftp://d:d@dygodj8.com:12311/[电影天堂www.dy2018.com]八月HD高清国语中英双字.mkv  
curl_setopt($curlobj,CURLOPT_URL,"ftp://dygodj8.com:12311/%D0%C2%BD%A8%CE%C4%BC%FE%BC%D0/%5B%B5%E7%D3%B0%CC%EC%CC%C3www.dy2018.com%5D%B0%CB%D4%C2HD%B8%DF%C7%E5%B9%FA%D3%EF%D6%D0%D3%A2%CB%AB%D7%D6.mkv");  
curl_setopt($curlobj,CURLOPT_HEADER,0);  
curl_setopt($curlobj,CURLOPT_RETURNTRANSFER,1);  
//time out after 300s  
curl_setopt($curlobj,CURLOPT_TIMEOUT,500);  
//通过这个函数设置ftp的用户名和密码,没设置就不需要!  

 curl_setopt($curlobj,CURLOPT_USERPWD,"d:d");  
  
//sets up the output file  
$outfile = fopen('test.mkv','wb');  //保存到本地文件的文件名  
curl_setopt($curlobj,CURLOPT_FILE,$outfile);  
  
$rtn = curl_exec($curlobj);  
fclose($outfile);  
  
if(!curl_errno($curlobj)){  
    echo "RETURN: ".$rtn;  
}else{  
    echo 'Curl:error: '.curl_errno($curlobj);  
}  
  
curl_close($curlobj);  

