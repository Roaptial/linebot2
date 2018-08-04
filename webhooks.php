<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = 'xhAkA0iH6lkv8pZ7/JXFYEjfbYQva3DUFLmL3F/RKpfln9k1ClVTb14Se1VUO0XjF3XlJT5oKZvpg6gXdn8hP98RfLN/jnq0/K6tTLjqDrwznRvIvBpzbHE9NnfOPY05OAN2bTkmUluV1Zeq+5HdMAdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['source']['userId'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			if($event['message']['text']=='Menu'){
				$messages = [
				'type' => 'text',
				//'text' => $text
				'text' => '('.$event['message']['text'].') เมนูตอนนี้มีแค่ A,B'
				];
			}else if($event['message']['text']=='A'){
				$messages = [
				'type' => 'text',
				//'text' => $text
				'text' => '('.$event['message']['text'].') ทดสอบA'
				];
			}else if($event['message']['text']=='B'){
				$messages = [
				'type' => 'text',
				//'text' => $text
				'text' => '('.$event['message']['text'].')  ทดสอบB'
				];
			}else if($event['message']['text']=='ID'){
				$messages = [
				'type' => 'text',
				//'text' => $text
				'text' => '('.$event['message']['text'].') '.$event['source']['userId']
				];
			}else if($event['message']['text']=='สวัสดี'){
				$messages = [
				'type' => 'sticker',
				//'text' => $text
				'packageId' => '2',
				'stickerId' => '34'
				];
			}else {
				$messages = [
				'type' => 'text',
				//'text' => $text
				'text' => '('.$event['message']['text'].') ยังไม่มีเมนูนี้'
				];
			
			}
			// Build message to reply back
			//$messages = [
			//	'type' => 'text',
				//'text' => $text
			//	'text' => 'กำลังทดสอบข้อความตอบกลับสำหรับ'.$event['message']['text']
			//];
			$messages2 = [
				'type' => 'text',
				//'text' => $text
				'text' => '(Autoreply)'
				];
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages2,$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";
