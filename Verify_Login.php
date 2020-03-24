<?php
require_once('Header.php');
require_once("DatabaseSMS.php");
$login = new DatabaseSMS();

$user_name = $_POST["uname"];
$passwordd = $_POST["psw"];

$query_verifylogin = "SELECT * FROM admin WHERE UserName='" . $user_name . "' and Password='" . $passwordd . "'";
$result_verifylogin = $login->selectQuery($query_verifylogin);

if (count($result_verifylogin) > 0) {
    $_SEESION["usern"] = $result_verifylogin[0]["UserName"];
    $_SEESION["pass"] = $result_verifylogin[0]["Password"];
    header("Location:Registration.php");
} else {
    echo "Invalid Login";
    header("Location:SignIn.php");
}

if (!empty($_POST["remember"])) {
    //successfully set
    setcookie("uname", $_POST["uname"], time() + 3600);
    setcookie("psw", $_POST["psw"], time() + 3600);
} else {
    //cookie is not set 
    setcookie("uname", "");
    setcookie("psw", "");
}
