<?php

switch($message) {
	case "/ping":
		sendMessage($chat_id, "Понг!");
	break;
	case "/pong":
		sendMessage($chat_id, "Пинг!");
	break;
	case "/reply":
		sendMessage($chat_id, "Хех)", "", $message_id);
	break;
	case "/sendphoto":
		sendPhoto($chat_id, "./static/hatkid.png", "Hat Kid!", $message_id);
	break;
	case "/dice":
		sendDice($chat_id);
	break;
}

?>
