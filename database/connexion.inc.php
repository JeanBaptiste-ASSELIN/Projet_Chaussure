    
   
   <?php
   function db_connect(){
    define("DB_USERNAME", "u_adrar_boutique");
    define("DB_PASSWORD", "u_adrar_boutique");
    define("DB_DOMAIN", "localhost");
    define("DB_NAME", "adrar_boutique");

    $mysqli = new mysqli(DB_DOMAIN, DB_USERNAME, DB_PASSWORD, DB_NAME);
    return $mysqli;
   }
   ?>
