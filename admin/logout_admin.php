<?php
session_start();


$_SESSION['admin']     = null;
$_SESSION['admin_loggato']   = null;

header('Location:login_admin.php');

?>

