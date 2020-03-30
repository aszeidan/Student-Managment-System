<?php
require_once("../Model/DatabaseSMS.php");
require_once('../Model/Login.php');
$db = new DatabaseSMS();
$Login = new Login($db);
if (!isset($_POST["uname"]) || !isset($_POST["psw"])) {

    die("Missing Parameters");
}
$user_name = $_POST["uname"];
$password = $_POST["psw"];


$user = $Login->verifyLogin($user_name, $password);

if (count($user)) {
    $_SEESION["usern"] = $user["UserName"];
    $_SEESION["pass"] = $user["Password"];
    header("Location:../View/Registration.php");
} else {
    $Login->verifyLogin($user_name, $password);
    header("Location:../View/SignIn.php?textmessage=Invalid Username or Password");
}
