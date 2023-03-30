<?php
include("config.php");
session_start();

if(isset($_POST['submit'])){
    $filters = ['admin'=>FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'password'=>FILTER_SANITIZE_FULL_SPECIAL_CHARS];
     $form_data = filter_input_array(INPUT_POST,$filters);       
     if($form_data['admin'] === "admin" && $form_data['password'] === "admin"){
        $_SESSION['admin_loggato']=1;
        header("Location:amministratore.php");
     } else {
       $messaggio_errore = "Admin o password errate!!!";
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
    <title>Login admin</title>
</head>

<body>

    <div class="container">
        <h2 class="bg-success">Login admin</h2>
        <div class="col-sm-6">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="admin">Admin</label>
                    <input type="text" name="admin" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <strong><?php if (isset($messaggio_errore)) echo $messaggio_errore; ?></strong>
                <br>
                <input type="submit" name="submit" value="Login" class="btn btn-success">
            </form>
        </div>
        <hr>


</body>

</html>