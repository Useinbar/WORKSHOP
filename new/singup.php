<?php
include(config.php);
if (isset($_COOKIE['pseudo']))
{
  session_start();
  $_SESSION['pseudo'] = $_COOKIE['pseudo'];
}
  
  ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="favicon" href="medias/Logo.png" alt="Logo EPSI Grenoble">
    <meta name="Description" content="Site du campus HEP de Grenoble.">
	<link href="https://fonts.googleapis.com/css?family=Livvic|Source+Sans+Pro:600|Ubuntu:300&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="main.css">
	<title>Campus HEP Grenoble</title>
</head>
<body>
	<header class="header-login-signup">
		<div class="header-limiter">
			<h1><a href="index.php">HEP Campus <span>Grenoble</span></a></h1>
			<nav>
				<a href="calendrier.php">Calendrier</a>
				<a href="creation_Evenement.php">Proposer</a>
				<a href="suggestion.php">Suggestion</a>
			</nav>
			<ul>
				<li><a href="#">Connexion</a></li>
				<li><a href="#">Inscription</a></li>
			</ul>
		</div>
	</header>
	

	<section class="sectionBackground">
 <?php

      /* page: inscription.php */

  //connexion à la base de données:


      //création automatique de la table membres, une fois créée, vous pouvez supprimer les lignes de code suivantes:
      //echo mysqli_query($db,"CREATE TABLE IF NOT EXISTS `".$BDD['db']."`.`membres1` ( `id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(25) NOT NULL , `password` CHAR(32) NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;")?"Table membres créée avec succès, vous pouvez maintenant supprimer la ligne ". __LINE__ ." de votre fichier ". __FILE__ ."!":"Erreur création table membres: ".mysqli_error($db);
      //la table est créée avec les paramètres suivants:
      //champ "id": en auto increment pour un id unique, peux vous servir pour une identification future
      //champ "pseudo": en varchar de 0 à 25 caractères
      //champ "mdp": en char fixe de 32 caractères, soit la longueur de la fonction md5()
      //fin création automatique

  //par défaut, on affiche le formulaire (quand il validera le formulaire sans erreur avec l'inscription validée, on l'affichera plus)
  $AfficherFormulaire=1;
  //création des htmlspecialchars pour empêcher les injections.
    
  //traitement du formulaire:
  if(isset($_POST['username'],$_POST['prenom'],$_POST['nom'],$_POST['password'],$_POST['mail'],$_POST['classe'])){//l'utilisateur à cliqué sur "S'inscrire", on demande donc si les champs sont défini avec "isset"
      if(empty($_POST['username'])){//le champ pseudo est vide, on arrête l'exécution du script et on affiche un message d'erreur
          echo "Le champ Pseudo est vide.";
      } elseif(!preg_match("#^[a-z0-9]+$#",$_POST['username'])){//le champ pseudo est renseigné mais ne convient pas au format qu'on souhaite qu'il soit, soit: que des lettres minuscule + des chiffres (je préfère personnellement enregistrer le pseudo de mes membres en minuscule afin de ne pas avoir deux pseudo identique mais différents comme par exemple: Admin et admin)
          echo "Le Pseudo doit être renseigné en lettres minuscules sans accents, sans caractères spéciaux.";
      } elseif(strlen($_POST['username'])>25){//le pseudo est trop long, il dépasse 25 caractères
          echo "Le pseudo est trop long, il dépasse 25 caractères.";
      } elseif(empty($_POST['password'])){//le champ mot de passe est vide
          echo "Le champ Mot de passe est vide.";
      } elseif(mysqli_num_rows(mysqli_query($db,"SELECT * FROM membres1 WHERE username='".$_POST['username']."'"))==1){//on vérifie que ce pseudo n'est pas déjà utilisé par un autre membre
          echo "Ce pseudo est déjà utilisé.";
      } else {
          //toutes les vérifications sont faites, on passe à l'enregistrement dans la base de données:
          //Bien évidement il s'agit là d'un script simplifié au maximum, libre à vous de rajouter des conditions avant l'enregistrement comme la longueur minimum du mot de passe par exemple
          if(!mysqli_query($db,"INSERT INTO membres1 SET username='".$_POST['username']."', password='".$_POST['password']."', prenom='".$_POST['prenom']."', nom='".$_POST['nom']."', mail='".$_POST['mail']."', classe='".$_POST['classe']."'")){
              //on crypte le mot de passe avec la fonction propre à PHP: md5()
              echo "Une erreur s'est produite: ".mysqli_error($db);//je conseille de ne pas afficher les erreurs aux visiteurs mais de l'enregistrer dans un fichier log
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

      <?php
  }
  ?>
		<div class="divEventSingUp">
			<div class="container-contact100">
				<div class="wrap-contact10">
					<form class="contact100-form validate-form" method="post" action="inscription.php">
						<span class="contact100-form-title">
						Page d'inscription !
						</span>

						<div class="wrap-input100 validate-input" data-validate="User is required">
							<label class="label-input100">Nom d'utilisateur :</label>
							<input class="input100" type="varchar" name="username" class="box"  placeholder="Entrer votre nom d'utilisateur">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Password is required">
							<label class="label-input100">Prenom :</label>
							<input class="input100" type="text" name="prenom" class="box" placeholder="Entrer votre prénom">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Password is required">
							<label class="label-input100">Nom :</label>
							<input class="input100" type="text" name="nom" class="box" placeholder="Entrer votre nom">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Password is required">
							<label class="label-input100">Mail :</label>
							<input class="input100" type="text" name="mail" class="box" placeholder="Entrer votre mail">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Password is required">
							<label class="label-input100">Mot de passe :</label>
							<input class="input100" type="password" name="password" class="box" placeholder="Entrer votre mot de passe">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Password is required">
							<label class="label-input100">Classe :</label>
							<input class="input100" type="varchar" name="classe" class="box" placeholder="Entrer votre classe :">
							<span class="focus-input100"></span>
						</div>

						<div class="container-contact100-form-btn">
							<div class="wrap-contact100-form-btn">
								<div class="contact100-form-bgbtn"></div>
								<button class="contact100-form-btn">
									<span type="submit" value=" CONNEXION ">
										Se connecter    
										<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
									</span>
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>


	<footer class="footer-distributed">
		<div class="footer-left">
			<h3>HEP Campus <span>Grenoble</span></h3>
			<p class="footer-links">
				<a href="#">Accueil</a>
				·
				<a href="#">Calendrier</a>
				·
				<a href="#">Proposer</a>
				·
				<a href="#">Suggestion</a>
				·
				<a href="#">Connexion</a>
				·
				<a href="#">Inscription</a>
			</p>
			<p class="footer-company-name">Axsiow &copy; 2019</p>
		</div>
		<div class="footer-center">
			<div>
				<i class="fa fa-map-marker"></i>
				<p><span>13 bis rue de la Condamine</span> 38610 Gières, France</p>
			</div>
			<div>
				<i class="fa fa-envelope"></i>
				<p id="mail"><a href="mailto:bde@axsiow.ovh">bde@axsiow.ovh</a></p>
			</div>
		</div>
		<div class="footer-right">
			<p class="footer-company-about">
				<span>À propos</span>
				Créé avec ❤️️ à Grenoble, France 🗻	
			</p>
			<div class="footer-icons">
				<a href="https://www.facebook.com/bdeepsigrenoble" target="blank"><img src="medias/facebook.png" height="35px"><i class="fa fa-facebook"></i></a>
				<a href="https://www.instagram.com/bdeepsigre/" target="blank"><img src="medias/instagram.png" height="35px"><i class="fa fa-instagram"></i></a>
				<a href="https://discordapp.com" target="blank"><img src="medias/discord.png" height="35px"><i class="fa fa-discord"></i></a>
				<a href="https://github.com/Useinbar/WORKSHOP" target="blank"><img src="medias/github.png" height="35px"><i class="fa fa-github"></i></a>
			</div>
		</div>
	</footer>

</body>
</html>