<?php
// $to_email = "padmajajoe@gmail.com";
// $subject = "Simple Email Test via PHP vbnrao";
// $body = "Hi,nn This is test email send by PHP Script";
// $headers = "From: vbnrao@gmail.com";
 
// if (mail("padmajajoe@gmail.com", "Simple Email Test via PHP vbnrao", "Hi,nn This is test email send by PHP Script", "From: vbnrao@gmail.com")) {
//     echo "Email successfully sent to $to_email...";
// } 

// else {
//     echo "Email sending failed...";
// }


// include PHPMailerautoload.php
require 'PHPMailer/PHPMailerAutoload.php';


// Create an instance of PHP Mailer
$mail = new PHPMailer();

// set a Host
$mail->Host = 'smtp.gmail.com';

// enable SMTP


// set authentication to true
$mail->SMTPAuth = 'true';

// set login details for gmail acount
$mail->Username = 'vbnrao@gmail.com';
$mail->Password = '123ganesh@papet';

// set a type of protection
//$mail->SMTPSecure = 'tls';  // or we can use SSL


// set port
$mail->Port = 25;  // or 465 for SSL

//$mail->Port = 587;  // or 465 for SSL 587 for TSL 25 for Local Host

// set subject
$mail->Subject = 'This is testing mail from XAMPP LocalHost';

// set body

$mail->Body = 'This is Body of the Mail from XAMPP Local Host';


// set who is sending an email
$mail->SetFrom('vbnrao@gmail.com', 'V.Bala Nageswara Rao');


// set where we are sending an email (recepients)
$mail->addAddress('padmajajoe@gmail.com');


// send an email

if ($mail->send())
{
	echo "Mail is sent sucessfulyy";
}
else
{
	echo "Something wrong in sending Mail";
}



?>