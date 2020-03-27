<?php
      function get_db_access(){
                $fp = fopen( $_SERVER['DOCUMENT_ROOT']."/../db_access.txt", 'r' ); // get the contents, and echo it out.
                $mysql_db = array();
                while ($line = fgets($fp)) {
                        if (! preg_match("#^\##", $line)) // remove comment lines
                        {
                                $parts = explode(':', $line);
                                $key = trim($parts[0]);
                                unset($parts[0]);
                                $value = str_replace("\n", '', implode(':', $parts));
                                $mysql_db[$key] = trim($value);
                        }
                }
                $mysql_db["server"] = "localhost";
                return($mysql_db);
        }

        function get_db_link(){
                $my_db = get_db_access();
                //print_r($my_db);

                // connexion à la bdd en UTF-8
                $link = new PDO('mysql:host='.$my_db["server"].';dbname='.$my_db["name"],$my_db["user"], $my_db["pass"]);
                // On vérifie que l'on a bien accés à la bdd
                $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return($link);
        }

?>
