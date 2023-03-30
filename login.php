<?php
session_start();
require_once "config.php";


if (isset($_POST['submit'])) {
    $nome    = mysqli_real_escape_string($connessione, $_POST['nome']);
    $password = mysqli_real_escape_string($connessione, $_POST['password']);

    if (!filter_var($nome, FILTER_VALIDATE_EMAIL)) {
        $messaggio_errore;
    }
    if (!filter_var($password, FILTER_SANITIZE_FULL_SPECIAL_CHARS)) {
        $messaggio_errore;
    }
    $query = mysqli_query($connessione, "SELECT * FROM utenti WHERE nome =  '$nome' AND password = '$password'");
    if ($row = mysqli_fetch_array($query)) {
        $_SESSION['utente']     = $row['nome'];
        $_SESSION['user_loggato']   = 1;

        header("Location: guestbook.php");
    } else {
        $messaggio_errore = "Nome o Password errate!!!";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Login</title>
</head>

<body>

    <div class="container">
        <h2 class="bg-success">Login</h2>
        <div class="col-sm-6">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="nome">Nome utente</label>
                    <input type="text" name="nome" class="form-control" placeholder="Nome utente">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div> 
                 <strong><?php if (isset($messaggio_errore)) echo $messaggio_errore; ?></strong>
                 <br>
                <input type="submit" name="submit" value="Login" class="btn btn-success">
                
              
            </form>
            <hr>
            <a href="registrazione.php">Registrati</a>
        </div>


        
</body>

</html>