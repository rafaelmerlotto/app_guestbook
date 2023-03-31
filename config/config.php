<?php
setcookie("Autore", "Rafael Merlotto", time() + 3600);


$host = "localhost";
$user = "root";
$password = "";
$database = "app_guestbook";

$connessione = mysqli_connect($host, $user, $password, $database);

?>