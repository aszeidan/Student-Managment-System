<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();
$_SESSION = array();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../Model/PHPMailer/src/Exception.php';
require '../Model/PHPMailer/src/PHPMailer.php';
require '../Model/PHPMailer/src/SMTP.php';
require_once('../Model/DatabaseSMS.php');
require_once('../Model/Student.php');
$db = new DatabaseSMS();
$Student = new Student($db);
$result = array();


if (
    !isset($_POST["SFirstName"])
    || !isset($_POST["SMiddleName"])
    || !isset($_POST["SAddress"])
    || !isset($_POST["SMajor"])
    || !isset($_POST["SLastName"])
    || !isset($_POST["SPhone"])
    || !isset($_POST["SPassword"])
    || !isset($_POST["SEmail"])

) {
    $result["Error"] = 1;
    $result["Message"] = "missing parameter";
    die(json_encode($result));
} elseif (
    !$_POST["SFirstName"]
    || !$_POST["SMiddleName"]
    || !$_POST["SLastName"]
    || !$_POST["SAddress"]
    || !$_POST["SMajor"]
    || !$_POST["SPhone"]
    || !$_POST["SPassword"]
    || !$_POST["SEmail"]
) {
    $result["Error"] = 1;
    $result["Message"] = "empty value";
    die(json_encode($result));
}
$SFirstName = $_POST["SFirstName"];
$SMiddleName = $_POST["SMiddleName"];
$SLastName = $_POST["SLastName"];
$SAddress = $_POST["SAddress"];
$SMajor = $_POST["SMajor"];
$SPhone = $_POST["SPhone"];
$SPassword = $_POST["SPassword"];
$SEmail = $_POST["SEmail"];


$Student->setSFirstName($SFirstName);
$Student->setSmiddleName($SMiddleName);
$Student->setSLastName($SLastName);
$Student->setAddress($SAddress);
$Student->setMajor($SMajor);
$Student->setSPhone($SPhone);
$Student->setSPassword($SPassword);
$Student->setSEmail($SEmail);

if ($Student->checkStudentIfExists() == true) {
    $result["Error"] = 0;
    $result["Message"] = "This student is already registered";
    die(json_encode($result));
} else {
    $Student->addStudent();


    //sender
    $smtpUsername = "timetraveluniversity@hotmail.com";
    $smtpPassword = "TimeTravel@34";
    $emailFrom = $smtpUsername;
    $emailFromTTU = "Time Travel University";
    //receiver 
    $emailToStudent = $SFirstName . ' ' . $SMiddleName;
    $emailToStudentAddress = $SEmail;
    $mail = new PHPMailer(true);


    // form field names and their translations.
    // array variable name => Text to appear in the email
    $fields = array('SFirstName' => 'Name', 'SEmail' => 'Email', 'SPassword' => 'Password');


    // message that will be displayed when everything is OK :)
    $okMessage = 'Student Information form successfully submitted.';

    // If something goes wrong, we will display this message.
    $errorMessage = 'There was an error while submitting the form. Please try again later';

    // if you are not debugging and don't need error reporting, turn this off by error_reporting(0);
    error_reporting(E_ALL & ~E_NOTICE);

    try {

        if (count($_POST) == 0) throw new \Exception('Form is empty');

        $emailTextHtml = "<h2> Registration Credentials for Time Travel University </h2><hr>";
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
        $mail->setFrom($emailFrom, $emailFromTTU);
        $mail->addAddress($emailToStudent, $emailToStudentAddress);

        $mail->Subject = 'Time Travel University Registration Credentials.';

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
    $result["Error"] = 0;
    $result["Message"] = "Successfully Added";
    die(json_encode($result));
}
