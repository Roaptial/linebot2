<?php


$access_token = 'xhAkA0iH6lkv8pZ7/JXFYEjfbYQva3DUFLmL3F/RKpfln9k1ClVTb14Se1VUO0XjF3XlJT5oKZvpg6gXdn8hP98RfLN/jnq0/K6tTLjqDrwznRvIvBpzbHE9NnfOPY05OAN2bTkmUluV1Zeq+5HdMAdB04t89/1O/w1cDnyilFU=';

$userId = 'U4be233048266e61e25283aa39bb6788d';

$url = 'https://api.line.me/v2/bot/profile/'.$userId;

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

