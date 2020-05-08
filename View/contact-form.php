<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../Model/PHPMailer/src/Exception.php';
require '../Model/PHPMailer/src/PHPMailer.php';
require '../Model/PHPMailer/src/SMTP.php';

//sender
$smtpUsername = "aszeidan@hotmail.com";
$smtpPassword = "joudjalal.com.123";
$emailFrom = $smtpUsername;
$emailFromName = "Time Travel University";
//receiver 
$emailToNadine = "Nadine";
$emailToNameNadine = "aszeidan@hotmail.com";

$mail = new PHPMailer(true);


// form field names and their translations.
// array variable name => Text to appear in the email
$fields = array('name' => 'Name',  'phone' => 'Phone', 'email' => 'Email', 'message' => 'Message');


// message that will be displayed when everything is OK :)
$okMessage = 'Contact form successfully submitted. Thank you, We will get back to you soon!';

// If something goes wrong, we will display this message.
$errorMessage = 'There was an error while submitting the form. Please try again later';

// if you are not debugging and don't need error reporting, turn this off by error_reporting(0);
error_reporting(E_ALL & ~E_NOTICE);

try {

    if (count($_POST) == 0) throw new \Exception('Form is empty');

    $emailTextHtml = "<h2>You have a new message from your Time Travel University website contact form</h2><hr>";
    $emailTextHtml .= "<table>";

    foreach ($_POST as $key => $value) {
        // If the field exists in the $fields array, include it in the email
        if (isset($fields[$key])) {
            $emailTextHtml .= "<tr><th>$fields[$key]</th><td>$value</td></tr>";
        }
    }
    $emailTextHtml .= "</table><hr>";
    $emailTextHtml .= "<p>Have a nice day</p>";

    $mail->isSMTP();
    $mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
    $mail->Host = "smtp.live.com";  // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
    $mail->Port = 587; // TLS only
    $mail->SMTPSecure = 'tls'; // ssl is depracated
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Username = $smtpUsername;
    $mail->Password = $smtpPassword;
    $mail->setFrom($emailFrom, $emailFromName);
    $mail->addAddress($emailToNadine, $emailToNameNadine);

    $mail->Subject = 'Time Travel University Website Contact Form Message';

    $mail->msgHTML($emailTextHtml); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
    $mail->AltBody = 'HTML messaging not supported';
    // $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file

    if (!$mail->send()) {
        // echo "Mailer Error: " . $mail->ErrorInfo;
        throw new \Exception('We could not send the email.' . $mail->ErrorInfo);
    }
    // echo "Message sent!";
    $responseArray = array('type' => 'success', 'message' => $okMessage);
} catch (Exception $e) {
    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    $responseArray = array('type' => 'danger', 'message' => $e->getMessage());
    // $responseArray = array('type' => 'danger', 'message' => $mail->ErrorInfo);
}




// if requested by AJAX request return JSON response
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
}
// else just display the message
else {
    echo $responseArray['message'];
}
