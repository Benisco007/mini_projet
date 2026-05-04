<?php
session_start();
include_once "config.php";
if (isset($_POST["login"]) && isset($_POST["password"])) {
    $login = $_POST["login"];
    $password = $_POST["password"];
    $req = $idcom->prepare("SELECT * FROM user WHERE login= ?");
    $req->execute([$login]);
    $user = $req->fetch();
    if ($user && password_verify($password, $user["password"])) {
        $_SESSION['user_id']    = $user['id'];
        $_SESSION['user_login'] = $user['login'];
        $_SESSION['user_nom']   = $user['nom'];
        header("location: accueil.php");
        exit();
    } else {
        echo "Login ou mot de passe incorrect";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="" method="POST">
        <fieldset>
            <label for="login">Login:</label>
            <input type="text" id="login" name="login">
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password">
            <button type="submit">Connexion</button>
            <button type="button" onclick="window.location.href='inscription.php'">S'inscrire</button>
        </fieldset>
    </form>
</body>

</html>