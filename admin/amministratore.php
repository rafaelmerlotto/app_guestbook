<?php 
session_start();
//include("config.php");
require_once("../config/config.php");

if(!isset($_SESSION['admin_loggato']))
    header("Location:login_admin.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Admin</title>
</head>

<body>

<a href="logout_admin.php" type="buttom" class='btn btn-danger position-absolute top-50 end-50' >Logout</a>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header bg-info">
                    Gestione degli iscritti
                </h3>

            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">

                <!-- Aggiungi iscritti -->

                <?php

                if (isset($_POST['submit'])) {

                    $nome = $_POST['nome'];
                    $password = $_POST['password'];

                    $query = "INSERT INTO utenti (nome, password) VALUES  ('$nome' , '$password')";

                    $creaUtenti = mysqli_query($connessione, $query);

                    if (!$creaUtenti) {

                        die('Query fallita' . mysqli_error($connessione));
                    }
                }
                ?>

                <form action="" method="post">
                    <h3>Aggiungi un iscritto</h3>

                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit" value="Aggiungi" class="btn btn-info">
                    </div>
                </form>


                <hr>


                <!--  Cancella gli iscritti -->

                <?php

                if (isset($_POST['delete'])) {

                    $idUtente = $_POST['id'];

                    $query = "DELETE FROM utenti WHERE id_utente = $idUtente";

                    if (!mysqli_query($connessione, $query)) {
                        die('Query per la cancellazione fallita' . mysqli_error($connessione));
                    }
                }
                ?>
                <form action="" method="post">
                    <h3>Cancella iscritto</h3>

                    <div class="form-group">
                        <label for="id">ID utente</label>
                        <input type="number" name="id" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="submit" name="delete" value="Cancella" class="btn btn-danger">
                    </div>
                </form>

        
                <hr>


                <!--  Cancella i messaggi -->

                <?php

                if (isset($_POST['delete_messaggio'])) {

                    $idMessaggio = $_POST['id_messaggio'];

                    $query2 = "DELETE FROM guestbook WHERE id_messaggio = $idMessaggio";

                    if (!mysqli_query($connessione, $query2)) {
                        die('Query per la cancellazione fallita' . mysqli_error($connessione));
                    }
                }
                ?>
                <form action="" method="post">
                    <h3>Cancella messaggio</h3>

                    <div class="form-group">
                        <label for="id_messaggio">ID messaggio</label>
                        <input type="number" name="id_messaggio" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="submit" name="delete_messaggio" value="Cancella" class="btn btn-danger">
                    </div>
                </form>
    
            </div>
        </div>

        <hr>
        <a href="view_msg.php">Visualizza i messaggi</a><br>
        <a href="view_utenti.php">Visualizza gli utenti</a>


</body>

</html>