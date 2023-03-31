<?php
session_start();


$_SESSION['utente']     = null;
$_SESSION['user_loggato']   = null;

header('Location: login.php');

?>

