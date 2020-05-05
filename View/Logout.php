<?php
session_destroy();
setcookie("isLoggedIn", false);
header('Location: SignIn.php');
exit;