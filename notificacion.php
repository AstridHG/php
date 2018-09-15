<?php
// API access key from Google API's Console
define( 'API_ACCESS_KEY', 'AAAArMHmzjg:APA91bG62uMc8clGU5IUXWsj_1XcwL4PlLi9zKjQL44oLnwOLTD2XE2ncQp_uxCzkNcUWYwruQJkZolX7zY2jMgLlh2p4dGxUtfqic9G4-7_CnSgwTiRV_sYVL8dCinkTLueLK6G6933' );
$registrationIds = array( $_GET['id'] );
// prep the bundle
$msg = array
(
	'message' 	=> 'Contraseña ingresada Correctamente',
	'title'		=> 'AppCasa',
	//'subtitle'	=> 'This is a subtitle. subtitle',
	//'tickerText'	=> 'Ticker text here...Ticker text here...Ticker text here',
	'vibrate'	=> 1,
	'sound'		=> 1,
	//'largeIcon'	=> 'large_icon',
	//'smallIcon'	=> 'small_icon'
);
$fields = array
(
	'registration_ids' 	=> $registrationIds,
	'data'			=> $msg
);
 
$headers = array
(
	'Authorization: key=' . API_ACCESS_KEY,
	'Content-Type: application/json'
);
 
$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
$result = curl_exec($ch );
curl_close( $ch );
echo $result;