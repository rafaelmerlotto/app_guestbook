<?php
require_once("../config/config.php");
session_start();
//include('config.php');


if (!isset($_SESSION['admin_loggato'])) {
    header("Location:login_admin.php");
}
  

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>visualizza</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="bg-info">Utenti</h3>
                <hr>
                <table class="table table-bordered" style=" text-align:center">
                    <tr style="font-size:18px; text-align:center">
                    
                        <th style=" width:170px">ID Utente</th>
                        <th>Nome</th>
                        <th>Password</th>
                    </tr>


                    <?php

                    $mostraQuery = "SELECT * FROM utenti";

                    $mostraMessagi = mysqli_query($connessione, $mostraQuery);

                    while ($row = mysqli_fetch_array($mostraMessagi)) {
                        $id_utente = $row['id_utente'];
                        $nome = $row['nome'];
                        $password = $row['password'];

                        echo "<tr>";
                        echo   "<td> {$id_utente}</td>";
                        echo   "<td> {$nome}</td>";
                        echo   "<td> {$password}</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
                <hr>
                <a href="amministratore.php"> ← Torna alla pagina iniziale</a>
            </div>
        </div>
    </div>


</body>

</html>