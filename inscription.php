<?php
include_once "config.php";
if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["num"]) && isset($_POST["login"]) && isset($_POST["password"])) {
    $login = $_POST["login"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $num = $_POST["num"];
    $req = $idcom->prepare("INSERT INTO user (nom ,prenom, contact, login, password)
     values (?,?,?,?,?)");
    $req->execute([$nom, $prenom, $num, $login, $password]);
    header("location: index.php");
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
            <legend>Inscrivez vous !</legend>
            <label for="nom">Votre nom:</label>
            <input type="text" id="nom" name="nom">
            <label for="prenom"> Votre prénom:</label>
            <input type="text" id="prenom" name="prenom">
            <label for="num">Contact:</label>
            <input type="text" id="num" name="num">
            <label for="login">Login:</label>
            <input type="text" id="login" name="login">
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password">
            <button type="submit">S'inscrire</button>
        </fieldset>
    </form>
</body>

</html>