<?php


//code goes here
$sender_brand_name = "";
		$to = $this->input->post('phone');
		$message = $this->input->post('message');
    $recipient = $this->input->post('phone');
       
  
	$message = urlencode($message); 
	$sender= urlencode($sender_brand_name); 
	//$recipient = "2348012345678,2347012345678";

$url = 'http://www.MultiTexter.com/tools/geturl/Sms.php?username=$username&password=$password&sender='.$sender.'&message='.$message .'&flash=0&recipients='. $recipient;
	        $ch = curl_init(); 
	        curl_setopt($ch,CURLOPT_URL, $url); 
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	        curl_setopt($ch, CURLOPT_HEADER, 0); 
	        $resp = curl_exec($ch); 
	        curl_close($ch);

				 if ($resp=='-1') {
				 	//wrong url construction
				 	$response_message = "wrong url construction";
				 }elseif ($resp=='-2') {
				 	//incorrct username
				 	$response_message = "incorrct username";
				 }elseif ($resp=='-3') {
				 	//not enough credit
				 	$response_message = "not enough credit";
				 }elseif ($resp=='-4') {
				 	//invalid sender name
				 	$response_message = "invalid sender name";
				 }elseif ($resp=='-5') {
				 	//not valid recipient
				 	$response_message = "not valid recipient";
				 }elseif ($resp=='-6') {
				 	//Invalid message length/No message content 
				 	$response_message = "Invalid message length/No message content ";
				 }elseif ($resp=='-10') {
				 	//unknown error has
				 	$response_message = "unknown error has ";
				 }elseif ($resp=='100') {
				 	$response_message = "successfully sent";
				 }
				echo $response_message;

			}else{
				#not sufficient unit available
				echo "not enough sms units";
			}

?>
