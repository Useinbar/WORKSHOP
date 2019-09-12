<?php
include(config.php);

if (isset($_POST['nom_evenement'], $_POST['type_evenement'], $_POST['date_evenement'], $_POST['horaire_evenement'], $_POST['description_evenement'])){
    if(!empty($_POST['nom_evenement']) AND !empty($_POST['type_evenement']) AND !empty($_POST['date_evenement']) AND !empty($_POST['horaire_evenement']) AND !empty($_POST['description_evenement'])){

        $nom_evenement = htmlspecialchars($_POST['nom_evenement']);
        $type_evenement = htmlspecialchars($_POST['type_evenement']);
        $date_evenement = htmlspecialchars($_POST['date_evenement']);
        $horaire_evenement = htmlspecialchars($_POST['horaire_evenement']);
        $description_evenement = htmlspecialchars($_POST['description_evenement']);
        

        $ins = $bdd->prepare('INSERT INTO evenement (nom_evenement, type_evenement, date_evenement, horaire_evenement, description_evenement) VALUES(?, ?, ?, ?, ?)');
        $ins->execute(array($nom_evenement, $type_evenement, $date_evenement, $horaire_evenement, $description_evenement));  

        $message = 'Votre événement a bien été posté';

    } else {
            $message='Veuillez remplir tous les champs';
        }
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
    <link rel="stylesheet" hre="util.css">
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
        <div class="container-contact100">
            <div class="wrap-contact100">
                <form class="contact100-form validate-form">
                    <span class="contact100-form-title">
                        Proposition d'Evenement !
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Name is required">
                        <span class="label-input100">Le nom de l'événement !</span>
                        <input class="input100" type="text" name="nom_evenement" placeholder="Entrer le nom de votre événement">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Type is required">
                        <span class="label-input100">Le type d'evenement !</span>
                        <input class="input100" type="text" name="type_evenement" placeholder="Entrer le type de votre événement">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100">
                        <span class="label-input100">La date de l'evenement !</span>
                        <input class="input100" type="date" name="date_evenement" placeholder="Entrer la date de votre événement">
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Message is required">
                        <span class="label-input100">La description de l'evenement !</span>
                        <textarea class="input100" name="description_evenement" placeholder="Entrer la description de votre événement"></textarea>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-contact100-form-btn">
                        <div class="wrap-contact100-form-btn">
                            <div class="contact100-form-bgbtn"></div>
                            <button class="contact100-form-btn">
                                <span>
                                    Submit
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