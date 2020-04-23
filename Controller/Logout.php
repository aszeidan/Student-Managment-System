
<?php
session_destroy();


//initialize the session 
if (!isset($_SESSION)) {
    session_start();
}
// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF'] . "?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")) {
    $logoutAction .= "&" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) && ($_GET['doLogout'] == "true")) {
    // to fully log out a visitor we need to clear the session variables
    $_SESSION['uname'] = NULL;
    $_SESSION['psw'] = NULL;
    $_SESSION['PrevUrl'] = NULL;
    unset($_SESSION['uname']);
    unset($_SESSION['psw']);
    unset($_SESSION['PrevUrl']);
    $logoutGoTo = "../View/SignIn.php";

    if ($logoutGoTo) {
        header("Location: $logoutGoTo");
        exit;
    }
} ?>