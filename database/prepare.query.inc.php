<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    
    <?php
    function insert_shoe($mysqli, $name, $price,$error_message){
        if($mysqli instanceof mysqli == false){
            throw new Exception("Mysqli n'est pas de la classe mysqli !", 1);
        }
        if(!is_numeric($price)){
            $error_msg = "le prix doit etre un nombre";
            return false;
        }
        if(is_numeric($name)){
            $error_msg = "le nom dit etre un texte";
            return false;
        }
        $prep_query = $mysqli->prepare("INSERT INTO 'chaussure' ('id', 'nom', 'prix', 'created_at') VALUES (NULL, ?, ?, current_timestamp())");
        if($prep_query == false){
            $error_msg = "Database error";
            return false;
        }
        $res=$prep_query->blind_param("sd", $name, $price);
        if($res == false){
            $error_msg = "Database error";
            return false;
        }
        $res = $prep_query->execute();
        if($res == false){
            $error_msg = "Database error";
            return false;
        }
        return $res;
        }

        function delete_shoe($mysqli, $id,$error_msg){
            if($mysqli instanceof mysqli == false){
                throw new Exception("Mysqli n'est pas de la classe mysqli !", 1);
            }
            if(!is_integer($id) && $id>0){
                $error_msg = "l'identifiant doit etre un nombre entier positif";
                return false;
            }
            $prep_query = $mysqli -> prepare("DELETE FROM 'chaussure' WHERE 'chaussure'.'id' =?;");
            if($prep_query == false){
                $error_msg = "Database error";
                return false;
            }
            $res = $prep_query->bind_param("i", $id);
            if($res == false){
                $error_msg = "Database error";
                return false;
            }
            $res = $prep_query->execute();
            if($res == false){
                $error_msg = "Database error";
                return false;
            }
            return $res;
        }

        function get_all_shoes($mysqli,$error_msg){
            if($mysqli instanceof mysqli == false){
                throw new Exception("Mysqli n'est pas de la classe mysqli !", 1);
            }
            $query = $mysqli->query("SELECT * FROM 'chaussure';");
            if($query == false){
                $error_msg = "Database error";
                return false;
            }
            $shoes = $query->fetch_all(MYSQLI_ASSOC);
            return $shoes;
        }
        ?>
</body>
</html>