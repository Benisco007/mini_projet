<?php
session_start();
include_once "config.php";
if (!isset($_SESSION['user_id'])) {
    header("location: index.php");
    exit();
} else {
    $req = $idcom->prepare("SELECT * FROM client");
    $req->execute();
    $prod = $req->fetchAll();
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
        <tr>
            <th>Code Client</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Age</th>
            <th>Adresse</th>
            <th>Ville</th>
            <th>Email</th>

        </tr>
        <?php
        foreach ($prod as $p) {
            echo "
                <tr>
                    <td>" . $p['id_client'] . "</td>
                    <td>" . $p['nom'] . "</td>
                    <td>" . $p['prenom'] . "</td>
                    <td>" . $p['age'] . "</td>
                    <td>" . $p['adresse'] . "</td>
                    <td>" . $p['ville'] . "</td>
                    <td>" . $p['mail'] . "</td>
                </tr>";
        }
        ?>
    </table>
    <button type="button" onclick="window.location.href='accueil.php'">Retour</button>
</body>

</html>