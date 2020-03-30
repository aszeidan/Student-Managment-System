<?php
require_once("DatabaseSMS.php");
require_once('Model/Login.php');
$db = new DatabaseSMS();
$Login = new Login($db);
if (!isset($_POST["uname"]) || !isset($_POST["psw"])) {

    die("Missing Parameters");
}
$user_name = $_POST["uname"];
$password = $_POST["psw"];

$Login = $Login->verifyLogin($user_name, $password);

if ($login) {

    header("Location:SignIn.php");
    
} else {

    $Login->verifyLogin($user_name, $password);
    header("Location:Registration.php");
}
