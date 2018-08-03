<?php



require "vendor/autoload.php";

$access_token = 'xhAkA0iH6lkv8pZ7/JXFYEjfbYQva3DUFLmL3F/RKpfln9k1ClVTb14Se1VUO0XjF3XlJT5oKZvpg6gXdn8hP98RfLN/jnq0/K6tTLjqDrwznRvIvBpzbHE9NnfOPY05OAN2bTkmUluV1Zeq+5HdMAdB04t89/1O/w1cDnyilFU=';

$channelSecret = '1d46f518b8e0caf8a82fc8081e7d1297';

$pushID = 'U4be233048266e61e25283aa39bb6788d';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







