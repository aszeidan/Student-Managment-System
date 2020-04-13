<?php
session_start();
$_SESSION = array();
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
    if (isset($_POST["remember"])) {

        setcookie('email', $user_name, time() + 60 * 60 * 7);
        setcookie('pass', $passwordd, time() + 60 * 60 * 7);
        setcookie('isLoggedIn', true, time() + 60 * 60 * 7);
    }
    $_SESSION["usern"] = $username;
    $_SESSION["pass"] = $password;
    $_SESSION["id"] = $User->getId();

    header("Location:../View/Registration.php");
} else {
    header("Location:../View/SignIn.php?textmessage=Invalid Username or Password");
}
