<?php 

ini_set('display_errors',1); 
error_reporting(E_ALL);

require_once('Mailchimp.php');
	$email = $_REQUEST['email']		;
	$emailExist = 0;
	$mailchimp = new Mailchimp ("4506de1696463d27bc82a0013c74dfe0-us8") ;
 
  

 	  	$result1 = $mailchimp->call('lists/members',array('id'=>'2b66915145',
 	  													'status' => 'subscribed'				
 	  		)); 



 	  	 $emailArray = $result1['data'] ;
 	   	 $emailIds = array();
 	  	 foreach ($emailArray  as $key => $emailValue ) {
 	  	 	    $emailIds[] = $emailValue['email'];
 	  	 }

 	  	 foreach ($emailIds as $value) {
 	  	 	 if($value == $email)
 	  	 	 {
 	  	 	 	$emailExist = 1 ;
 	  	 	 }

 	  	 }
 	  	  
 	  	 if($emailExist)
 	  	 {
 	  	 	$response['message'] = "email Exist" ;
 	  	 	$response['subscribed'] = 1 ; 
 	  	 	print_r(json_encode($response));
 	  	 	exit(1);
 	  	 }
 	  	 else {
 	  	 	 
 	  	 	 $result = $mailchimp->call('lists/subscribe', array(
 	  	 	                 'id'                => '2b66915145',
 	  	 	                 'email'             => array('email'=>$email),
 	  	 	                 'double_optin'      => false,
 	  	 	                 'update_existing'   => false,
 	  	 	                 'replace_interests' => false,
 	  	 	                 'send_welcome'      => true
 	  	 	             ));

 	  	 	  	$response['message'] = $result ; 
 	  	 	  	$response['subscribed'] = 0;
 	  	 	 	print_r(json_encode($result));
 	  	 	 	exit(1);

 	  	 }
 	  


 ?>