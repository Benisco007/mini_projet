<?php
session_start();
include_once "config.php";
if (!isset($_SESSION['user_id'])) {
    header("location: index.php");
    exit();
} else {
    $req = $idcom->prepare("SELECT login ,nom , prenom, contact FROM user ");
    $req->execute();
    $user = $req->fetchAll();
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
    <table>
        <th> Login</th>
        <th> Nom</th>
        <th> Prénom</th>
        <th> Contact</th>
        <?php

        foreach ($user as $u) {
            echo "
        <tr>
            <td>" . $u['login'] . "</td> 
            <td>" . $u['nom'] . "</td>
            <td>" . $u['prenom'] . "</td>
            <td>" . $u['contact'] . "</td>
        </tr>";
        }
        ?>
    </table>
    <button type="button" onclick="window.location.href='accueil.php'">Retour</button>
</body>

</html>