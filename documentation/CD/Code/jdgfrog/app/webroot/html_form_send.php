<?php
 
if(isset($_POST['email'])) {
 

    $email_to = "vanessa.bouche@tcu.edu"; //Vanessa Bouché's email 
 
    $email_subject = "Human Trafficking Data: Contact Message"; //Subject of message
 
     
 
     
 //Error Message Function
    function died($error) {
 
        echo "We are very sorry, but there were error(s) found with the form you submitted... <br/>";
 		echo "\r\n";
        echo $error."<br /><br />";
 
        die();
 
    }
 
     
 
    // validation checking
 
    if(!isset($_POST['name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['message']))
 
         {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');      
 
    }
 
     
 
    $first_name = $_POST['name'];
 
    $message_going = $_POST['message'];
 
    $email_from = $_POST['email'];
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br/>';

  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= 'The Name you entered does not appear to be valid.<br/>';
 
  }
 
  if(strlen($message_going) < 2) {
 
    $error_message .= 'The Message you entered do not appear to be valid.<br/>';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Message Details.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Name: ".clean_string($first_name)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";

    $email_message .= "Message: ".clean_string($message_going)."\n";
 
 
     
 
 $htdEmail = "comments@humantraffickingdata.org";  //sender of the email
 
//email headers from and reply to
 
$headers = 'From: '.$htdEmail."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers); 
?>
 
 
Thank you for contacting us.
</br>
</br>
<a href="http://www.humantraffickingdata.org/">Return Home</a> 

<?php
}
die();
?>