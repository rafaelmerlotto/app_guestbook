<?php
session_start();
include('config.php');


/* if (!isset($_SESSION['user_loggato'])) {
    header("Location:login.php");
} */

if (!isset($_SESSION['admin_loggato'])){
    header("Location:amministratore.php");
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
                <h3 class="bg-primary">Messaggi</h3>
                <hr>
                <table class="table table-bordered">
                    <tr style="font-size:18px; text-align:center">
                        <th>Nome</th>
                        <th>Messaggio</th>
                    </tr>


                    <?php

                    $mostraQuery = "SELECT * FROM guestbook";

                    $mostraMessagi = mysqli_query($connessione, $mostraQuery);

                    while ($row = mysqli_fetch_array($mostraMessagi)) {
                        $nome = $row['nick'];
                        $messaggio = $row['messaggio'];

                        echo "<tr>";
                        echo   "<td> {$nome}</td>";
                        echo   "<td> {$messaggio}</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
                <hr>
                <a href="guestbook.php"> ← Torna alla pagina iniziale</a>
            </div>
        </div>
    </div>


</body>

</html>