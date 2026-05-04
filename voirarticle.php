<?php
session_start();
include_once "config.php";
if (!isset($_SESSION['user_id'])) {
    header("location: index.php");
    exit();
} else {
    $req = $idcom->prepare("SELECT * FROM articles ");
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
            <th>Code produit</th>
            <th>Désignation</th>
            <th>Prix</th>
            <th>Catégorie</th>
        </tr>
        <?php
        foreach ($prod as $p) {
            echo "
                <tr>
                    <td>" . $p['id_articles'] . "</td>
                    <td>" . $p['designation'] . "</td>
                    <td>" . $p['prix'] . "</td>
                    <td>" . $p['categorie'] . "</td>
                </tr>";
        }
        ?>
    </table>
    <button type="button" onclick="window.location.href='accueil.php'">Retour</button>
</body>

</html>