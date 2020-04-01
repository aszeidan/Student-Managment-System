<?php
require_once("../Model/DatabaseSMS.php");
require_once('../Model/User.php');
$db = new DatabaseSMS();
$User = new User($db);
if (!isset($_POST["uname"]) || !isset($_POST["psw"])) {

    die("Missing Parameters");
}
$username = $_POST["uname"];
$password = $_POST["psw"];

$User->setUsername($username);
$User->setPassword($password);


if ($User->verifyLogin() == true) {
    $_SEESION["usern"] = $username;
    $_SEESION["pass"] = $password;
    $_SEESION["id"] = $User->getId();

    header("Location:../View/Registration.pHp");
} else {
    header("Location:../View/SignIn.php?textmessage=Invalid Username or Password");
}
