<?php
/**
 * Created by PhpStorm.
 * User: kofi
 * Date: 11/13/17
 * Time: 7:35 AM
 */

require_once "Mail.php";

$from = '<no-reply@kofimokome.dev>';
$to = '<mokomekofi@yahoo.com>';
$subject = 'Hi!';
$body = "Hi,\n\nHow are you?";

$headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
    'host' => 'smtp.gmail.com',
    'port' => '587',
    'auth' => true,
    'username' => 'kofimokome10@gmail.com',
    'password' => 'passwrd'
));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
    echo json_encode('<p>' . $mail->getMessage() . '</p>');
} else {
    echo json_encode('<p>Message successfully sent!</p>');
}


$to = "kofimokome10@gmail.com";
$subject = "HTML email";

$message = "
<html>
<head>
<title>New Contact</title>
</head>
<body>
<p>Hi Kofi, You have a new contact request</p>
<table>
<tr>
<th>Name</th>
<th>Email</th>
<th>Number</th>
<th>Subject</th>
<th>Message</th>
</tr>
<tr>
<td>John</td>
<td>Email</td>
<td>Number</td>
<td>Subject</td>
<td>Message</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <webmaster@kofimokome.dev>' . "\r\n";

$sent = mail($to, $subject, $message, $headers);
echo json_encode(array(
    'message' => $sent
));