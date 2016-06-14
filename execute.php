<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);


$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";

$text = trim($text);
$text = strtolower($text);
if(!$update)
{
 header("Content-Type: application/json"); 
 $parameters = array('chat_id' => $chatId, "text" => "Errore");
 // method è il metodo per l'invio di un messaggio (cfr. API di Telegram)
 $parameters["method"] = "sendMessage";
 // converto e stampo l'array JSON sulla response
 echo json_encode($parameters);
 exit;
}



header("Content-Type: application/json");
$parameters = array('chat_id' => $chatId, "text" => $text);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
