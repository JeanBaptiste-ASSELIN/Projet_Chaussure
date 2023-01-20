<?php
    include_once("database/connexion.inc.php");
    include_once("database/prepare_query.inc.php");
    $mysqli = db_connect();
    if($mysqli->connect_error == null){
        $error = "";
        $shoes = get_all_shoes($mysqli,$error);
        if($shoes){
            $form_message = count($shoes)."chaussure(s) trouvée(s) !";
        }
        else{
            $form_message = $error;
        }
    }
    else{
        $form_message = "Erreur connexion Database";
    }
?>
<section>
    <p><?= isset($form_message)?$form_message:$form_message?></p>
    <?php if(isset($shoes) && count($shoes) >0): ?>
        <table>
            <tr><th>id</th><th>nom</th><th>prix</th><th>supprimer</th></tr>
            <?php
            foreach($shoes as $key=>$shoes){
                echo '<tr><td>'.$shoes['id'].'</td><td>'.$shoes["nom"].'</td>
                <td>'.$shoes["prix"].'</td><td><a href="/Projet_Chaussure/deleteshoes.php?
                form_id='.$shoe["id"].'">Supprimer</a></td></tr>';
            }
            ?>
    </table>
    <?php endif;?>
        </section>