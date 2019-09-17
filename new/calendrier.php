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
				<li><a href="singin.php">Connexion</a></li>
				<li><a href="singup.php">Inscription</a></li>
			</ul>
		</div>
	</header>
	

	<section class="sectionBackground">
        <div class="divEventSing">
            <div>
                <ul>
                    <?php while ($a = $evenement->fetch()) { ?>
                    <li><a href="evenement.php?id=<?= $a['id'] ?>"><?= $a['nom_evenement'] ?></a></li>
                    <?php } ?>
                </ul>    
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