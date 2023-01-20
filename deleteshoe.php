<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet chaussure</title>
</head>
<body>
    <?php include("menu.php")?> <!--permet d'inclure le menu dans chaque page -->

    <!--Formulaire de suppression -->
    <form action="<?= $_SERVER["PHP_SELF"]?>" method="get">
    <label for="form_id">Identifiant produit</label>
    <input type="number" name="form_id" id="form_id">

    <input type= "submit" value = "Supprimer la chaussure">

</form>
</body>
</html>