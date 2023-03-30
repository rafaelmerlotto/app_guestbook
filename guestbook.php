<?php
session_start();
include('config.php');
ob_start();

if (!isset($_SESSION['utente'])) {
    header("Location:login.php");
} else {
    echo "<h3 class='btn btn-success' > Ciao utente " . $_SESSION['utente'] . " sei connesso </h3>" . "<hr>";
}


$avviso = " ";


if (isset($_POST['submit'])) {

    $nickname = $_POST['nome'];
    $messaggio = $_POST['messaggio'];

    if (!empty($nickname) && !empty($messaggio)) {

        $query = "INSERT INTO guestbook (nick , messaggio) VALUES ('$nickname','$messaggio')";

        $creaQuery = mysqli_query($connessione, $query);

        if (!$creaQuery) {
            die("query fallita" . mysqli_error($connessione));
        }

        $avviso = "<p class='btn btn-info'>Messaggio inviato con successo</p>";
    } else {
        $avviso = "<p class='btn btn-danger'>I campi non devono essere vuoti</p>";
    }
    if (!isset($_SESSION['user_loggato'])) {
        header("Location:login.php");
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestbook</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>

 <a href="logout.php" type="buttom" class='btn btn-danger position-absolute top-50 end-50' >Logout</a>

    <div class="container">
       
        <h3 class="bg-primary">Aggiungi un nuovo messaggio</h3>
        <div class="col-sm-6">

            <form action="" method="POST">

                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" class="form-control" value=" <?php echo $_SESSION['utente'] ?> ">
                </div>

                <div class="form-group">
                    <label for="messaggio">Messaggio</label>
                    <textarea name="messaggio" id="" cols="15" rows="7" class="form-control" required></textarea>
                </div>


                <input type="submit" name="submit" value="invia" class="btn btn-primary">
            </form>
        </div>
        <?php echo $avviso; ?>
        <hr>
        <a href="visualizza.php">Visualizza i messaggi</a>

    </div>


</body>

</html>