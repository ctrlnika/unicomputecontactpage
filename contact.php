<?php
$to = "info@unicompute.co.uk";
$subject = "Contact Form";

$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>unicompute Contact Form Message</p>
<table>";

$fields = array('name' => 'Name', 'surname' => 'Surname', 'phone' => 'Phone', 'email' => 'Email', 'message' => 'Message');

foreach ($_POST as $key => $value) {
        // If the field exists in the $fields array, include it in the email
        if (isset($fields[$key])) {
            $message .= "<tr><th>$fields[$key]</th><td>$value</td></tr>";
        }
    }

 $message .= "</table></body></html>";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: info@unicompute.co.uk' . "\r\n";

if(mail($to,$subject,$message,$headers)){
    header('Location: http://unicompute.co.uk/success.html');
    
    
}
else{
    header('Location: http://unicompute.co.uk/failure.html');
    
    
}
?>



