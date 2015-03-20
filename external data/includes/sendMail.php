 
<?php
 
    require_once 'DBConfig.php';

    $msg='';

  

    if(!empty($_POST['email']) && isset($_POST['email']))
    {
        // username and password sent from Form
        		$email=mysql_real_escape_string($_POST['email']); 
        		 
        		$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';

          if(preg_match($regex, $email))
            {  
            // $password=md5($password); // Encrypted password

        	   $activation=md5($email.time()); // Encrypted email+timestamp

        	   $count=mysql_query("SELECT * FROM  emailSubscribtion WHERE emailid='{$email}' LIMIT 1");	
              if(mysql_num_rows($count) < 1)
        				{
            				
             					// include 'smtp/Send_Mail.php';
            					$to=$email;
            					$subject="Email verification";
            					   
            					$body='<html>
                      <head>
                      </head>
                      <body>
                    	    <div> Click the following <em> <a href="'.$base_url.$activation.'" style="color:#0000ff">link</a> </em>in order to confirm subscription  </div>
                         
                      </body>
                    </html>';

                               
            								$headers  = 'MIME-Version: 1.0' . "\r\n";
            								$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            								// Additional headers
            								$headers .= 'From: Email Verification: betterthegame@gmail.com' . "\r\n";
            								 
                  					// To send HTML mail, the Content-type header must be set
                  					$headers  = 'MIME-Version: 1.0' . "\r\n";
                  					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                  					// Additional headers
                  					// $headers .= 'From: Email Verification: betterthegame@gmail.com' . "\r\n";
                  				//	$headers .= 'Cc: Mert@ethohum.com' . "\r\n";
                  					 
                               
            					// Send_Mail($to,$subject,$body);

            			     if(mail($to,$subject,$body,$headers))
                       {
                           $query="INSERT INTO  emailSubscribtion(emailid,activationcode,status) VALUES('{$email}','{$activation}',0)";

                           $result=mysql_query($query);
                       
                            echo "<div style='color:white'>You are one step away from receiving notifications from us </br> kindly  confirm your email Id</div>";  

                            //data to be sent to mert after email id gets entered into a database 
                           
                            $to1="betterthegame@gmail.com";
                            $subject1="Email Subscribtion betterthegame.com";

                            $body1="Subscribed email id   ".$email;

                            $header1  = 'MIME-Version: 1.0' . "\r\n";
                            $header1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                            // Additional headers
                            $header1 .= 'From:betterthegame@gmail.com' . "\r\n";
                             
                            // To send HTML mail, the Content-type header must be set
                            $header1  = 'MIME-Version: 1.0' . "\r\n";
                            $header1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                            mail($to1,$subject1,$body1,$header1);
                       }

                     	else
                      {
                         echo "<div style='color:white'>You have entered wrong email id </div>";  

                      }
            				

            					// $msg= "Registration successful, please activate email.";	

        				}
        			else
        				{
        					echo "<div style='color:white'>Oops!! looks like you are already there on our mailing list.</div>";	
        				}


        }
        else
        {  
          $msg = '<div style="color:white">Please Enter a valid email id </div>';  
        }
    }


?>