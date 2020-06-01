<?php

$request = file_get_contents("php://input");

if(!$request) {
	http_response_code(403);
	die();
}

$request = json_decode($request, true);

include_once "config.inc.php";
include_once "functions.inc.php";

$chat_id = $request['message']['chat']['id'];
$message = $request['message']['text'];
$message_id = $request['message']['message_id'];

include_once "commands.inc.php";

?>
