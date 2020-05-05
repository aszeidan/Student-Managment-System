<?php
session_start();
$_SESSION = array();
require_once("../Model/DatabaseSMS.php");
$db = new DatabaseSMS();


if (!isset($_POST["uname"]) || !isset($_POST["psw"]) || !isset($_POST["loginType"])) {

    die("Missing Parameters");
}


$username = $_POST["uname"];
$password = $_POST["psw"];
$loginType = $_POST["loginType"];

switch ($loginType) {
    case "student":
        require_once('../Model/Student.php');
        $User = new Student($db);
        $pageLocation = "Student_Registration.php";
        break;
    case "teacher":
        require_once('../Model/Teacher.php');
        $User = new Teacher($db);
        $pageLocation = "Teacher_Profile.php";
        break;
    case "admin":
        require_once('../Model/Admin.php');
        $User = new Admin($db);
        $pageLocation = "Choose_Directory.php";
        break;

    default:
        die("Invalid Login Type");
}
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
    $_SESSION["loginType"] = $loginType;
    $_SESSION["id"] = $User->getId();

    header("Location:../View/" . $pageLocation);
} else {
    header("Location:../View/SignIn.php?textmessage=Invalid Username or Password");
}
