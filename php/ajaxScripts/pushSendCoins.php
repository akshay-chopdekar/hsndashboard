<?php
require_once("../dbconfig.php");
//session_start();
ini_set('max_execution_time', 300);
$coins=(int)$_REQUEST['coins'];
//echo $coins;
$conditionCoins=$_REQUEST['conditionCoins'];
$notificationMessage=$_REQUEST['notificationMessage'];

$queryGetDeviceToken = "SELECT user_Id,device_token,coins FROM user WHERE coins < {$conditionCoins} AND device_token IS NOT NULL";
//$queryGetDeviceToken = "SELECT user_Id,device_token,coins FROM user WHERE coins>=6367430";
echo $queryGetDeviceToken;
$resultDeviceToken = mysqli_query($db,$queryGetDeviceToken);

while($row = mysqli_fetch_assoc($resultDeviceToken)){
    $deviceToken = $row['device_token'];
    echo "\ndevice Token:".$deviceToken."\n";
    $totalCoin = $row['coins']+$coins;
    //echo "total coins".$totalCoin;
    $userId=$row['user_Id'];
    //echo "userId".$userId;

    $queryUpdateCoins = "update user set coins = {$totalCoin} WHERE user_Id = {$userId}";
    mysqli_query($db,$queryUpdateCoins);

    //$deviceToken =  '9b1d5fa41abeae317188fd28c95a76e7f121044d94a476d87b6f2a7b6f097ab4';
    //echo "device Token in loop:".$deviceToken."\n";
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
      $action = "sendCoin" ;
      $message = $notificationMessage ;
      $body['aps'] = array(
                           'badge' => 1,
                           'alert' => $message,
                           'sound' => 'chime_bell_timer.wav',
                           'sendCoins' => $coins,
                           'totalCoins' => $totalCoin,
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
}

?>