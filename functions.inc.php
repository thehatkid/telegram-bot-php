<?php

function apiCall($method, $params = "") {
	$ch = curl_init("https://api.telegram.org/bot" . BOT_TOKEN . "/" . $method);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, false);
	$response = curl_exec($ch);
	curl_close($ch);
	return $response;
}

function getMe() {
	$response = apiCall("getMe");
	return $response;
}
function getMyCommands() {
	$response = apiCall("getMyCommands");
	return $response;
}

function sendMessage($chat_id, $text, $parse_mode = "", $reply_msgid = 0, $disable_webpreview = 0) {
	$request = array(
		"chat_id" => $chat_id,
		"text" => $text,
		"parse_mode" => $parse_mode,
		"reply_to_message_id" => $reply_msgid,
		"disable_web_page_preview" => $disable_webpreview
	);
	$response = apiCall("sendMessage", $request);
	return $response;
}
function sendPhoto($chat_id, $photo, $caption = "", $reply_msgid = 0) {
	$request = array(
		"chat_id" => $chat_id,
		"photo" => curl_file_create($photo),
		"caption" => $caption,
		"reply_to_message_id" => $reply_msgid
	);
	$response = apiCall("sendPhoto", $request);
	return $response;
}
function sendAudio($chat_id, $audio, $caption = "", $reply_msgid = 0, $performer = "", $title = "", $thumb = "") {
	$request = array(
		"chat_id" => $chat_id,
		"audio" => curl_file_create($audio),
		"caption" => $caption,
		"reply_to_message_id" => $reply_msgid,
		"performer" => $performer,
		"title" => $title,
		"thumb" => curl_file_create($thumb)
	);
	$response = apiCall("sendAudio", $request);
	return $response;
}
function sendDocument($chat_id, $document, $caption = "", $reply_msgid = 0, $thumb = "") {
	$request = array(
		"chat_id" => $chat_id,
		"document" => curl_file_create($document),
		"caption" => $caption,
		"reply_to_message_id" => $reply_msgid,
		"thumb" => curl_file_create($thumb)
	);
	$response = apiCall("sendDocument", $request);
	return $response;
}
function sendVideo($chat_id, $video, $caption = "", $reply_msgid = 0, $thumb = "", $streaming = 0) {
	$request = array(
		"chat_id" => $chat_id,
		"video" => curl_file_create($video),
		"caption" => $caption,
		"reply_to_message_id" => $reply_msgid,
		"thumb" => curl_file_create($thumb),
		"supports_streaming" => $streaming
	);
	$response = apiCall("sendVideo", $request);
	return $response;
}
function sendVoice($chat_id, $audio, $caption = "", $reply_msgid = 0) {
	$request = array(
		"chat_id" => $chat_id,
		"voice" => curl_file_create($audio),
		"caption" => $caption,
		"reply_to_message_id" => $reply_msgid
	);
	$response = apiCall("sendVoice", $request);
	return $response;
}
function sendSticker($chat_id, $sticker, $reply_msgid = 0, $disable_notification = 0) {
	$request = array(
		"chat_id" => $chat_id,
		"sticker" => curl_file_create($path),
		"reply_to_message_id" => $reply_msgid,
		"disable_notification" => $disable_notification
	);
	$response = apiCall("sendSticker", $request);
	return $response;
}
function sendDice($chat_id, $reply_msgid = 0, $emoji = "", $disable_notification = 0) {
	$request = array(
		"chat_id" => $chat_id,
		"emoji" => $emoji,
		"reply_to_message_id" => $reply_msgid,
		"disable_notification" => $disable_notification
	);
	$response = apiCall("sendDice", $request);
	return $response;
}

?>
