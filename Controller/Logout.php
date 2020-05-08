<?php
session_destroy();
setcookie("isLoggedIn", false);
header('Location: ../View/SignIn.php');
exit;
