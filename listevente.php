<?php
session_start();
include_once "config.php";
if (!isset($_SESSION['user_id'])) {
    header("location: index.php");
    exit();
} else {
    $req = $idcom->prepare("SELECT client.nom, client.prenom,articles.designation,articles.prix
    , contenir.qte_comm,commande.montant
    FROM client JOIN commande ON client.id_client = commande.id_client
    JOIN contenir ON commande.id_comm = contenir.id_comm
    JOIN articles ON contenir.id_articles = articles.id_articles");
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
            <th>Nom</th>
            <th>Prénom</th>
            <th>Article achetés</th>
            <th>Prix unitaire</th>
            <th>Quantité</th>
            <th>Montant total</th>
        </tr>
        <?php
        foreach ($prod as $p) {
            echo "
                <tr>
                    <td>" . $p['nom'] . "</td>
                    <td>" . $p['prenom'] . "</td>
                    <td>" . $p['designation'] . "</td>
                    <td>" . $p['prix'] . "</td>
                    <td>" . $p['qte_comm'] . "</td>
                    <td>" . $p['montant'] . "</td>
                </tr>";
        }
        ?>
    </table>
    <button type="button" onclick="window.location.href='accueil.php'">Retour</button>
</body>

</html>