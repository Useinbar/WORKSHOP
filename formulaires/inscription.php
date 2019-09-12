<?php
if (isset($_COOKIE['pseudo']))
{
  session_start();
  $_SESSION['pseudo'] = $_COOKIE['pseudo'];
}
  include("config.php");
  ?>

  <?php

      /* page: inscription.php */

  //connexion à la base de données:
  $BDD = array();
  $BDD['host'] = "localhost";
  $BDD['user'] = "root";
  $BDD['pass'] = "";
  $BDD['db'] = "test";
  $mysqli = mysqli_connect($BDD['host'], $BDD['user'], $BDD['pass'], $BDD['db']);
  if(!$mysqli) {
      echo "Connexion non établie.";
      exit;
  }

      //création automatique de la table membres, une fois créée, vous pouvez supprimer les lignes de code suivantes:
      //echo mysqli_query($mysqli,"CREATE TABLE IF NOT EXISTS `".$BDD['db']."`.`membres1` ( `id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(25) NOT NULL , `password` CHAR(32) NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;")?"Table membres créée avec succès, vous pouvez maintenant supprimer la ligne ". __LINE__ ." de votre fichier ". __FILE__ ."!":"Erreur création table membres: ".mysqli_error($mysqli);
      //la table est créée avec les paramètres suivants:
      //champ "id": en auto increment pour un id unique, peux vous servir pour une identification future
      //champ "pseudo": en varchar de 0 à 25 caractères
      //champ "mdp": en char fixe de 32 caractères, soit la longueur de la fonction md5()
      //fin création automatique

  //par défaut, on affiche le formulaire (quand il validera le formulaire sans erreur avec l'inscription validée, on l'affichera plus)
  $AfficherFormulaire=1;
  //création des htmlspecialchars pour empêcher les injections.

  //traitement du formulaire:
  if(isset($_POST['username'],$_POST['prenom'],$_POST['nom'],$_POST['password'],$_POST['mail'],$_POST['groupe'])){//l'utilisateur à cliqué sur "S'inscrire", on demande donc si les champs sont défini avec "isset"
      if(empty($_POST['username'])){//le champ pseudo est vide, on arrête l'exécution du script et on affiche un message d'erreur
          echo "Le champ Pseudo est vide.";
      } elseif(!preg_match("#^[a-z0-9]+$#",$_POST['username'])){//le champ pseudo est renseigné mais ne convient pas au format qu'on souhaite qu'il soit, soit: que des lettres minuscule + des chiffres (je préfère personnellement enregistrer le pseudo de mes membres en minuscule afin de ne pas avoir deux pseudo identique mais différents comme par exemple: Admin et admin)
          echo "Le Pseudo doit être renseigné en lettres minuscules sans accents, sans caractères spéciaux.";
      } elseif(strlen($_POST['username'])>25){//le pseudo est trop long, il dépasse 25 caractères
          echo "Le pseudo est trop long, il dépasse 25 caractères.";
      } elseif(empty($_POST['password'])){//le champ mot de passe est vide
          echo "Le champ Mot de passe est vide.";
      } elseif(mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM membres1 WHERE username='".$_POST['username']."'"))==1){//on vérifie que ce pseudo n'est pas déjà utilisé par un autre membre
          echo "Ce pseudo est déjà utilisé.";
      } else {
          //toutes les vérifications sont faites, on passe à l'enregistrement dans la base de données:
          //Bien évidement il s'agit là d'un script simplifié au maximum, libre à vous de rajouter des conditions avant l'enregistrement comme la longueur minimum du mot de passe par exemple
          if(!mysqli_query($mysqli,"INSERT INTO membres1 SET username='".$_POST['username']."', password='".$_POST['password']."', prenom='".$_POST['prenom']."', nom='".$_POST['nom']."', mail='".$_POST['mail']."', groupe='".$_POST['groupe']."'")){
              //on crypte le mot de passe avec la fonction propre à PHP: md5()
              echo "Une erreur s'est produite: ".mysqli_error($mysqli);//je conseille de ne pas afficher les erreurs aux visiteurs mais de l'enregistrer dans un fichier log
          } else {
              echo "Vous êtes inscrit avec succès!";
              //on affiche plus le formulaire
              $AfficherFormulaire=0;
          }
      }
  }
  if($AfficherFormulaire==1){
      ?>
      <!--
      Les balises <form> sert à dire que c'est un formulaire
      on lui demande de faire fonctionner la page inscription.php une fois le bouton "S'inscrire" cliqué
      on lui dit également que c'est un formulaire de type "POST"

      Les balises <input> sont les champs de formulaire
      type="text" sera du texte
      type="password" sera des petits points noir (texte caché)
      type="submit" sera un bouton pour valider le formulaire
      name="nom de l'input" sert à le reconnaitre une fois le bouton submit cliqué, pour le code PHP
       -->

      <form method="post" action="inscription.php">

          PSEUDO : <input type="varchar" name="username">

          Prénom : <input type="text" name="prenom">

          Nom : <input type="text" name="nom">

          Email : <input type="mail" name="mail">

          Mot de passe : <input type="password" name="password">

          <label> choisis ton groupe :

          <select class="groupe" name="groupe">
            <option value="EPSI">EPSI</option>
            <option value="IDRAC">IDRAC</option>
            <option value="SUP2COM">SUP2COM</option>
            <option value="WIS">WIS</option>
            <option value="AUTRES">autres</option>
          </select>
</label>
      <!--    classe : <input type="varchar" name="classe"> -->

          <input type="submit" value="S'inscrire">
      </form>
      <?php
  }
  ?>
