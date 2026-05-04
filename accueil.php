<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("location: index.php");
    exit();
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
    <header>
        <img src="téléchargement.jpg" alt="eneam logo">
        <h1>BIENVENUE !</h1>
        <img src="téléchargement.png" alt="uac logo">
    </header>
    <div>
        <button type="button" onclick="window.location.href='listeuser.php'">Liste des utilisateurs</button>
        <button type="button" onclick="window.location.href='voirarticle.php'">Voir Articles</button>
        <button type="button" onclick="window.location.href='voirclient.php'">Voir Clients</button>
        <button type="button" onclick="window.location.href='listevente.php'">Liste Vente</button>
        <button type="button" onclick="window.location.href='enregistrer_vente.php'">Enregistrer Vente</button>
        <button type="button" onclick="window.location.href='logout.php'">Déconnexion</button>
    </div>
</body>

</html>