<?php // Checker les champs avant la recursive sur addshoe.php -->
    include("database/connexion.inc.php");
    include("database/prepare_query.inc.php");
    if(isset($_POST["form_name"])) && (isset($_POST["form_price"]))
    && !empty($_POST["form_name"]) éé !empty($_POST["form_price"])
    {
        //APPEL BDD
        $form_name = $_POST["form_name"];
        $form_price = $_POST["form_price"];
        if(is_numeric($form_price)){
            $mysqli = db_connect();
            if($mysqli->connect_error == null){
                $error = "";
                if(insert_shoe($mysqli, $form_name, $form_price, $error)){
                    $form_message = "la chaussure a été crée !";
                }
                else{
                    $form_message = $error;
                }
            }
            else{
                $form_message = "erreur database connexion";
            }
            
        }
        else{
            $form_message = "le prix doit etre un nombre";
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

    <h2>Ajouter une chaussure</h2>

    
    <form action ="<?=$_SERVER["PHP_SELF"]?>" method="post">
        <label for="form_name">Nom :</label>
        <input type="text" name="form_name" id="form_name"
        value="<?=isset($form_name)?$form_name:null?>" required>
        <label for="form_price">Prix :</label>
        <input type="number" name="form_price" id="form_price" 
        step="0.01" required>
        <input type="submit" value="Ajouter la chaussure">
</form>
    <p> <?=isset($form_message)?$form_message:null ?> </p>


</body>
</html>