<?php
session_start();
// $myusername = $_SESSION['username'];
include("config.php");
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
            <h1>
                <?php
                    if(!$_SESSION) {
                    echo '<a href="inscription.php">Inscription</a><br />';
                    } elseif (isset($_SESSION)) {
                        echo '<a href="deconnexion.php">deconnexion</a> ';
                        echo "Bonjour ", $_SESSION['username'] ;
                    }
                ?>
            </h1>
        <div class="container-contact100">
            <div class="wrap-contact10">
                <form class="contact100-form validate-form" action="script.php" method="post">
                    <span class="contact100-form-title">
                       Page de connexion !
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="User is required">
                        <label class="label-input100">Nom d'utilisateur !</label>
                        <input class="input100" type="text" name="username" class="box" placeholder="Entrer votre nom d'utilisateur"/>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <label class="label-input100">Password :</label>
                        <input class="input100" type="password" name="password" class="box"laceholder="Entrer votre mot de passe !"/>
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