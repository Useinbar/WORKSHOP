<?php
   define('DB_SERVER', 'axsiowovrx1.mysql.db');
   define('DB_USERNAME', 'axsiowovrx1');
   define('DB_PASSWORD', 'PcEaCN95AkvlItJY1ChMPB2e4ia0');
   define('DB_DATABASE', 'axsiowovrx1');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   try
   {
      $bdd = new PDO('mysql:host=axsiowovrx1.mysql.db;dbname=axsiowovrx1;charset=utf8', 'PcEaCN95AkvlItJY1ChMPB2e4ia0', 'axsiowovrx1');// permet de se connecter a la base de donner
   }
   catch(Exception $e)
   {
         die('Erreur : ça marche pas'.$e->getMessage()); //affiche l'erreure en cas de probleme de connection a la base de donnee
   }
?>