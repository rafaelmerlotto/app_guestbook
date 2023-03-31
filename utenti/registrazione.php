<?php
//include("config/config.php");
require_once("../config/config.php");


if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $password = $_POST['password'];

    if (!empty($nome) && !empty($password)) {

        $query = "INSERT INTO utenti (nome,password) VALUES('$nome','$password')";
        
        $creaUtenti = mysqli_query($connessione, $query);

        if (!$creaUtenti) {
            die("query fallita" . mysqli_error($connessione));
        } else {
            $messaggio_errore = "Registrazione effetuata con successo!!!";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Registrati</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">



</head>


<div class="container">
    <h2 class="bg-success">Registrati</h2>
    <div class="col-sm-6">
        <form action="" method="POST">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <input type="submit" name="submit" value="Invia" class="btn btn-success">
        </form>
    </div>
    <strong><?php if (isset($messaggio_errore)) echo $messaggio_errore; ?></strong>
    <hr>
    <a href="login.php"> ← Torna alla pagina di Login</a>


    </body>

</html>