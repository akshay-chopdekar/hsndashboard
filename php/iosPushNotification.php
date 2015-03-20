<?php
  //For IOS
  // Put your device token here (without spaces):

  /**
   * requires DB connection
   * userId of blocked user should be passed to this page
   */
  //require_once("dbconfig.php");
/*$queryGetDeviceToken = "SELECT device_token FROM user WHERE user_Id = $userId";
$resultDeviceToken = mysqli_query($db,$queryGetDeviceToken);

$row = mysqli_fetch_assoc($resultDeviceToken);
$deviceToken = $row['device_token'];*/
$deviceToken =  '9b1d5fa41abeae317188fd28c95a76e7f121044d94a476d87b6f2a7b6f097ab4';

// Put your private key's passphrase here:
$passphrase = 'betterthegame7' ;

$ctx = stream_context_create();
stream_context_set_option($ctx, 'ssl', 'local_cert', '../BetterTheGameApplication.pem');

stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
    
    stream_context_set_option($ctx, 'ssl', 'cafile', 'entrust_2048_ca.cer');

// Open a connection to the APNS server

$fp = stream_socket_client(
  'ssl://gateway.push.apple.com:2195', $err,
  $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);


if (!$fp)
  exit("Failed to connect: $err $errstr" . PHP_EOL);

echo '<br/>Connected to APNS' . PHP_EOL;

// Create the payload body
    $action = "Blocked" ;
    $message = "You have been blocked from BetterTheGame due to inappropriate activity." ;
    $body['aps'] = array(
                         'badge' => 1,
                         'alert' => $message,
                         'sound' => 'chime_bell_timer.wav',
                         'action'=>$action,
                         );



// Encode the payload as JSON
$payload = json_encode($body);

// Build the binary notification
$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

// Send it to the server
$result = fwrite($fp, $msg, strlen($msg));

if (!$result)
  echo 'Message not delivered' . PHP_EOL;
else
  echo 'Message successfully delivered' . PHP_EOL;

// Close the connection to the server
fclose($fp);
?>