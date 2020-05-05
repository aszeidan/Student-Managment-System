<?php
try {
header("Content-Type: application/json; charset=UTF-8");
session_start();
$_SESSION = array();
require_once("../Model/DatabaseSMS.php");
$db = new DatabaseSMS();
$result = array();

if (!isset($_POST["uname"]) || !isset($_POST["psw"]) || !isset($_POST["loginType"])) {
    $result["Error"] = 1;
    $result["Message"] = "missing parameter";
    die(json_encode($result));
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



if (!isset($_POST["uname"]) || !isset($_POST["psw"]) || !isset($_POST["loginType"])) {

    $result["Error"] = 1;
    $result["Message"] = "missing parameter";
    die(json_encode($result));
}elseif (
    !$_POST["uname"]
    || !$_POST["psw"]
    || !$_POST["loginType"]
){
    $result["Error"] = 1;
    $result["Message"] = "empty value";
    die(json_encode($result));
}elseif($User->verifyLogin() == true){
	
    if (isset($_POST["remember"])) {

        setcookie('email', $user_name, time() + 60 * 60 * 7);
        setcookie('pass', $passwordd, time() + 60 * 60 * 7);
        setcookie('isLoggedIn', true, time() + 60 * 60 * 7);
    }
    $_SESSION["usern"] = $username;
    $_SESSION["pass"] = $password;
    $_SESSION["loginType"] = $loginType;
    $_SESSION["id"] = $User->getId();
    $result["Error"] = 0;
    $result["Message"] = "Success";
    header("Location:../View/" . $pageLocation);
    die(json_encode($result));
	
}elseif($User->verifyLogin() == false){
    $result["Error"] = 0;
    $result["Message"] = "Invalid Username or Password";
    die(json_encode($result));
}
} catch (Exception $e) {
    header("Location:../View/SignIn.php?result=" . $e->getMessage());
}
