<?php
    include("database/connexion.inc.php");
    include("database/prepare_query.inc.php");

if(isset($_GET["form_id"])) && !empty($_GET["form_id"]){
    $form_id = $_GET["form_id"];
    if(is_numeric($form_id) && $form_id >0){
        $form_id = (int)$form_id //conversion string en int
        $mysqli = db_connect();
        if($mysqli){
            $error = "";
            if(delete_shoe($mysqli, $form_id, $error)){
                $form_message = "La chaussure a été supprimée !";
            }
            else{
                $form_message = $error;
            }
        }
        else{
            $form_message = "Erreur connexion Database";
        }
    }
    else{
        $form_message = "L'identifiant doit etre un nombre entier positif"
    }
}
?>

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
<p><?=isset($form_message)? $form_message:null ?></p>

</body>
</html>