<?php
session_start();
// $myusername = $_SESSION['username'];
include(config.php);
 ?>

<!DOCTYPE html>
<html lang="fr">
	<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="icon" type="favicon" href="medias/Logo.png" alt="Logo EPSI Grenoble">
		<meta name="Description" content="Site du BDE EPSI Grenoble.">
		<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
		<link href="https://fonts.googleapis.com/css?family=Livvic|Source+Sans+Pro:600|Ubuntu:300&display=swap" rel="stylesheet"> 
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="creaEvent.css">
		<title>BDE EPSI Accueil</title>
	</head>

	<body>
	<header>
        <div class="menu-toggler">
            <div class="bar half start"></div>
            <div class="bar"></div>
            <div class="bar half end"></div>
        </div>
        <nav class="top-nav">
            <ul class="nav-list">
                <li><a href="index.php" class="nav-link">Accueil</a></li>
                <li><a href="calendrier.php" class="nav-link">Calendrier</a></li>
                <li><a href="proposer.php" class="nav-link">Proposer</a></li>
                <li><a href="suggestion.php" class="nav-link">Suggestion</a> </li>
                <li><a href="formulaires/index.php" class="nav-link">Connexion</a> </li>
            </ul>
        </nav>
	</header>
	


	
	
	<section class="sectionCenter">

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
            <div class="wrap-contact100">
                <form class="contact100-form validate-form" action="script.php" method="post">
                    <span class="contact100-form-title">
                    CONNEXION
                    </span>

                    <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Name is required">
                        <span class="label-input100">Votre nom d'utilisateur !</span>
						<label>UserName :</label>
						<input class="input100" placeholder="Nom d'utilisateur" type="text" name="username" class="box" />
                    </div>

                    <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate = "Type is required">
						<span class="label-input100">Votre mot de passe !</span>
						<label>Password :</label>
						<input class="input100" placeholder="Mot de passe" type="password" name="password" class="box" />
                    </div>

                    <div class="container-contact100-form-btn">
                        <div class="wrap-contact100-form-btn">
                            <div class="contact100-form-bgbtn"></div>
                            <button class="contact100-form-btn">
								Connexion
								<!--<input type="submit" value=" CONNEXION " /> -->
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="dropDownSelect1"></div>

        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');

        <?php if(isset($message)){ echo $message; } ?>
        </script>

	</section>
		


		<footer id="footer">
			<p class="footerUp">Créé avec ❤️️ à Grenoble, France 🗻
			<br>
			<br>
			© 2019 BDE EPSI Grenoble, Tous droits réservés.</p>
			<ul class="footerList">
				<li><img src="https://bde.axsiow.ovh/medias/facebook.png" height="30px"><a href="https://www.facebook.com/bdeepsigrenoble" target="blank" class="footerLink">Facebook</a></li>
				<li><img src="https://bde.axsiow.ovh/medias/instagram.png"  height="30px"><a href="https://www.instagram.com/bdeepsigre/" target="blank" class="footerLink">Instagram</a></li>
				<li><img src="https://bde.axsiow.ovh/medias/discord.png" height="30px"><a href="https://discordapp.com/" target="blank" class="footerLink">Discord</a> </li>
			</ul>
    	</footer>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="main.js"></script>
		<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
	</body>
</html>
