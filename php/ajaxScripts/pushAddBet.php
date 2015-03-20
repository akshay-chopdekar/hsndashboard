<?php
require_once("../dbconfig.php");
//session_start();
ini_set('max_execution_time', 1000);
$userData=array();
function ConvertLocalTimezoneToGMT($gmttime,$timezoneRequired)
    {
        $system_timezone = date_default_timezone_get();

        $local_timezone = $timezoneRequired;
        date_default_timezone_set($local_timezone);
        $local = date("Y-m-d h:i:s A");

        date_default_timezone_set("GMT");
        $gmt = date("Y-m-d h:i:s A");

        date_default_timezone_set($system_timezone);
        $diff = (strtotime($gmt) - strtotime($local));

        $date = new DateTime($gmttime);
        $date->modify("+$diff seconds");
        $timestamp = $date->format("Y-m-d H:i:s");
        return $timestamp;
    }

$category=$_REQUEST['category'];
$betDescription=$_REQUEST['betDescription'];

$option1=$_REQUEST['option1'];
$option1value=$_REQUEST['option1value'];

$option2=$_REQUEST['option2'];
$option2value=$_REQUEST['option2value'];

$option3=empty($_REQUEST['option3']) ? "null" : $_REQUEST['option3'];
//echo "option3:".$option3;
$option3value=$_REQUEST['option3value']!=null  ? $_REQUEST['option3value']  : 0;

$option4=empty($_REQUEST['option4']) ? "null" : $_REQUEST['option4'];
//$option4=saxasx;
$option4value=$_REQUEST['option4value']!=null  ? $_REQUEST['option4value']  : 0;

$betEnds=ConvertLocalTimezoneToGMT($_REQUEST['betEnds'],$_REQUEST['timeZone']);

//echo $betEnds;
$queryInsertBet = "INSERT INTO bets(creator_id,category_id,bet_details,option1,opt1percent,option2,opt2percent,option3,opt3percent,option4,opt4percent,creation_time,bet_ends) VALUES(376,'{$category}','{$betDescription}','{$option1}','{$option1value}','{$option2}','{$option2value}','{$option3}','{$option3value}','{$option4}','{$option4value}',NOW(),'{$betEnds}')";
echo $queryInsertBet;
$exeInsertBet = mysqli_query($db,$queryInsertBet);
//echo $exeInsertBet;

$queryGetDeviceToken = "SELECT user_Id,device_token FROM user where device_token is not null ";
$resultDeviceToken = mysqli_query($db,$queryGetDeviceToken);
$i=0;
while($row = mysqli_fetch_assoc($resultDeviceToken)){
    $userData[$i]['deviceToken'] = $row['device_token'];
    echo "device Token:".$userData[$i]['deviceToken'];

    $userData[$i]['userId']=$row['user_Id'];
    echo "userId".$userData[$i]['userId'];

    $i++;
    }
    $total=$i;
    for($i=0;$i<$total;$i++)
    {
    $deviceToken =  $userData[$i]['deviceToken'];

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
      $action = "betOfTheDay" ;
      $message = "Bet Of The Day";
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
}

?>