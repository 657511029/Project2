<?php
session_start();
unset($_SESSION['Username']);
$_SESSION['loggedIn'] = false;
header("Location: home.php");
?>