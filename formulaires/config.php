<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'test');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   try
   {
      $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');// permet de se connecter a la base de donner
   }
   catch(Exception $e)
   {
         die('Erreur : '.$e->getMessage()); //affiche l'erreure en cas de probleme de connection a la base de donnee
   }
?>
