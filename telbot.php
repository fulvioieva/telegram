<?php 
define('BOT_TOKEN', '236381908:AAEP4Nf2zZgjniZqp4RN4whzzQELQzfUnXU');
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
	
// read incoming info and grab the chatID
$content = file_get_contents("php://input");
$update = json_decode($content, true);
$chatID = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];
$userId = $update["message"]["from"]["id"];

		
// compose reply
$reply =  sendMessage();
		
// send reply
if ($userId == 233490624) {
	$sendto =API_URL."sendmessage?chat_id=".$chatID."&text=".$reply;
	file_get_contents($sendto);
	$sendto =API_URL."sendmessage?chat_id=".$chatID."&text=".$message;
	file_get_contents($sendto);
	$sendto =API_URL."sendmessage?chat_id=".$chatID."&text=".$userId;
	file_get_contents($sendto);
	// send photo

	$url        = API_URL."sendPhoto?chat_id=" . $chatID ;
	$post_fields = array('chat_id'   => $chat_id,
	    'photo'     => new CURLFile(realpath("amiga.png"))
	);

	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	    "Content-Type:multipart/form-data"
	));
	curl_setopt($ch, CURLOPT_URL, $url); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields); 

	$output = curl_exec($ch);
}else{
	$sendto =API_URL."sendmessage?chat_id=".$chatID."&text=".$reply;
	file_get_contents($sendto);

}



	function sendMessage(){
		$date = getdate();
		$ore = $date[hours];
		$minuti = $date[minutes];
		if (strlen($minuti)==1) $minuti .= '0'.$date[minutes];
		$message = "Benvenuto al Mupin sono le ".$ore.":".$minuti;
		
		return $message;
	}




