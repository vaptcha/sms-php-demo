<?php

function send() {
    $url  = "http://sms.vaptcha.com/send";
    $body = array(
        'smsid' => '****',
        'smskey' => '****',
        'templateid' => '0',
        'countrycode' => '86',
        'token' => '',
        'data' => ['****'], // 与模板中的 {变量} 一一对应
        'phone' => '****',
    );
    $header = array(
        "Content-type:application/json;charset='utf-8'",
        "Accept:application/json"
    );
    $res = curl_post($url,json_encode($body),$header);
    echo $res;
}

function curl_post($url,$data,$header) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,FALSE);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    return $output;
}
