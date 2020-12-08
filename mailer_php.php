<?php
 require 'PHPMailerAutoload.php';

//Create a new PHPMailer instance
    $mail = new PHPMailer;   
    $mail->isSMTP();
// change this to 0 if the site is going live
    $mail->SMTPDebug = 2;
    $mail->Debugoutput = 'html';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';

 //use SMTP authentication
    $mail->SMTPAuth = true;
//Username to use for SMTP authentication
    $mail->Username = "vbnrao@gmail.com";
    $mail->Password = "123ganesh@papet";
    $mail->setFrom('vbnrao@gmail.com', 'V. Bala Nageswara Rao');
    $mail->addReplyTo('vbnrao.68@gov.in', 'Nageswara Padmaja Rao');
    $mail->addAddress('padmajajoe@gmail.com', 'Padmaja Rao');
    $mail->Subject = 'New contact from xampp localhost';
    // $message is gotten from the form
    //$mail->msgHTML($message);
//$mail->AltBody = $filteredmessage;
    if (!$mail->send()) {
        echo "We are extremely sorry to inform you that your message
could not be delivered,please try again.";
    } else {
        echo "Your message was successfully delivered,you would be contacted shortly.";
        }
?> 