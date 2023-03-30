<?php 
session_start();
include("config.php"); 

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

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header bg-success">
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

                    $query = "INSERT INTO utente (nome, password) VALUES  ('$nome' , '$password')";

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
                        <input type="submit" name="submit" value="Aggiungi" class="btn btn-success">
                    </div>
                </form>


                <hr>


                <!--  Cancella gli iscritti -->

                <?php

                if (isset($_POST['delete'])) {

                    $utenteId = $_POST['id'];

                    $query = "DELETE FROM utente WHERE idutente = $utenteId";

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

                <?php

                if (isset($_POST['deletemessaggio'])) {

                    $messaggioId = $_POST['idmessaggio'];

                    $query2 = "DELETE FROM guestbook WHERE idmessaggio = $messaggioId";

                    if (!mysqli_query($connessione, $query2)) {
                        die('Query per la cancellazione fallita' . mysqli_error($connessione));
                    }
                }
                ?>
                <form action="" method="post">
                    <h3>Cancella messaggio</h3>

                    <div class="form-group">
                        <label for="idmessaggio">ID messaggio</label>
                        <input type="number" name="idmessaggio" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="submit" name="deletemessaggio" value="Cancella" class="btn btn-danger">
                    </div>
                </form>

            </div>
        </div>

        <hr>
        <a href="visualizza.php">Visualizza i messaggi</a>


</body>

</html>