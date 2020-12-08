<?php


$message = "This is a test message from vbnrao on XAMPP.";
$headers = "From: vbnrao@gmail.com";

mail("uslsg-mud@gov.in", "Testing vbnrao", $message, $headers);
echo "Test message sent to uslsg-mud@gov.in....<BR/>";


?>