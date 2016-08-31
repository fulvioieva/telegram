<?php 
define('BOT_TOKEN', '236381908:AAEP4Nf2zZgjniZqp4RN4whzzQELQzfUnXU');
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
	
// read incoming info and grab the chatID
$content = file_get_contents("php://input");
$update = json_decode($content, true);
$chatID = $update["message"]["chat"]["id"];
		
// compose reply
$reply =  sendMessage();
		
// send reply
$sendto =API_URL."sendmessage?chat_id=".$chatID."&text=".$reply;
file_get_contents($sendto);
checkJSON($chatID,$update);

	function sendMessage(){
		$date = getdate();
		$message = "Benvenuto al Mupin sono le :".$date[hours].":".$date[minutes]."\n";
		$message += $update["message"]["chat"]["first_name"];
		return $message;
	}



	function checkJSON($chatID,$update){
	
		$myFile = "log.txt";
		$updateArray = print_r($update,TRUE);
		$fh = fopen($myFile, 'a') or die("can't open file");
		fwrite($fh, $chatID ."\n\n");
		fwrite($fh, $updateArray."\n\n");
		fclose($fh);
	}
