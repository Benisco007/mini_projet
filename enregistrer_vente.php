<?php
session_start();
include_once "config.php";
if (!isset($_SESSION['user_id'])) {
    header("location: index.php");
    exit();
} else {
    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['age']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['mail']) && isset($_POST['produit']) && isset($_POST['quantite'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $age = $_POST['age'];
        $adresse = $_POST['adresse'];
        $ville = $_POST['ville'];
        $mail = $_POST['mail'];
        $produit = $_POST['produit'];
        $quantite = $_POST['quantite'];

        $req = $idcom->prepare("INSERT INTO client (nom, prenom,age,adresse,ville,mail)
        VALUES (?,?,?,?,?,?)");
        $req->execute([$nom, $prenom, $age, $adresse, $ville, $mail]);
        $id_client = $idcom->lastInsertId();


        $reqPrix = $idcom->prepare("SELECT prix FROM articles WHERE id_articles = ?");
        $reqPrix->execute([$produit]);
        $article = $reqPrix->fetch();
        $montant = $article['prix'] * $quantite;

        $req2 = $idcom->prepare("INSERT INTO commande (id_client, montant) VALUES (?,?)");
        $req2->execute([$id_client, $montant]);
        $id_commande = $idcom->lastInsertId();


        $req3 = $idcom->prepare("INSERT INTO contenir (id_comm, id_articles, qte_comm) VALUES (?,?,?)");
        $req3->execute([$id_commande, $produit, $quantite]);
        header("location: listevente.php");
        exit();
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
    <form action="" method="post">
        <Legend>Commandez vos produits</Legend>
        <fieldset>
            <label for="">Votre nom</label>
            <input type="text" name="nom" id="nom" placeholder="AGOSSA">
            <label for="">Votre prenom</label>
            <input type="text" name="prenom" id="prenom" placeholder="Brunelle">
            <label for="">Votre age</label>
            <input type="number" name="age" id="age" placeholder="25">
            <label for="adresse"> Adresse</label>
            <input type="text" name="adresse" id="adresse" placeholder="Calavi SOS">
            <label for="">Votre ville</label>
            <input type="text" name="ville" id="ville" placeholder="Cotonou">
            <label for="">Votre mail</label>
            <input type="email" name="mail" id="mail" placeholder="votre mail">
            <label for="">Choissiez Votre Produit</label>
            <select name="produit" id="produit">
                <?php
                $req = $idcom->prepare("SELECT * FROM articles");
                $req->execute();
                while ($row = $req->fetch()) {
                    echo "<option value='" . $row['id_articles'] . "'>" . $row['designation'] . "</option>";
                }
                ?>
            </select>
            <label for="">Quantité</label>
            <input type="number" name="quantite" id="quantite" min="1" placeholder="1">
        </fieldset>
        <button type="submit">Valider mon achat</button>
    </form>
    <button type="button" onclick="window.location.href='accueil.php'">Retour</button>
</body>

</html>