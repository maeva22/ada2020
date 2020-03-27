<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
                <title>Get bdd credentials (should be private)</title>
        </head>
        <body>


                <?php

                /* Requête sql en PDO */
                include($_SERVER['DOCUMENT_ROOT']."/utils.php");
// affichage 
                print_r(get_db_access());

                ?>

        </body>
</html> 
