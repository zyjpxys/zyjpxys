<?php

$api = "http://43.249.192.46:9527/api/?key=0d2461826784862cee99b8f577f0b14b&url=";
$url = $_REQUEST['url'];
if (!$url){
    die('请检查链接');
}


$url = str_replace(' ','+',$url);

echo geturl($api.$url);

function geturl($url){
        $headerArray =array("Content-type:application/json;","Accept:application/json");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$headerArray);
        $output = curl_exec($ch);
        curl_close($ch);
        // $output = json_decode($output,true);
        return $output;
}