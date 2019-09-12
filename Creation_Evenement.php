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

<!doctype html>
<html lang="fr"> 
    <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="favicon" href="medias/Logo.png" alt="Logo EPSI Grenoble">
    <meta name="Description" content="Site du BDE EPSI Grenoble.">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
	<link href="https://fonts.googleapis.com/css?family=Livvic|Ubuntu:700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="util.css">
	<title>BDE Evenement</title>
    </head>
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
                <li><a href="proposer.php" class="nav-link">Proposer</a> </li>
                <li><a href="suggestion.php" class="nav-link">Suggestion</a> </li>
            </ul>
        </nav>
    </header>


    <section class="sectionCenterEvent">
        <div class="container-contact100">
            <div class="wrap-contact100">
                <form class="contact100-form validate-form">
                    <span class="contact100-form-title">
                        Proposition d'Evenement !
                    </span>

                    <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Name is required">
                        <span class="label-input100">Le Nom de l'eveneent !</span>
                        <input class="input100" type="text" name="nom_evenement" placeholder="Nom">
                    </div>

                    <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate = "Type is required">
                        <span class="label-input100">Le type d'evenement !</span>
                        <input class="input100" type="text" name="type_evenement" placeholder="Type">
                    </div>

                    <div class="wrap-input100">
                        <span class="label-input100">la date de l'evenement !</span>
                        <input class="input100" type="date" name="date_evenement" placeholder="Date">
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Message is required">
                        <span class="label-input100">La description de l'evenement !</span>
                        <textarea class="input100" name="description_evenement" placeholder="Description"></textarea>
                    </div>

                    <div class="container-contact100-form-btn">
                        <div class="wrap-contact100-form-btn">
                            <div class="contact100-form-bgbtn"></div>
                            <button class="contact100-form-btn">
                                Proposer !
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
            <li><img src="medias/facebook.png" height="30px"><a href="https://www.facebook.com/bdeepsigrenoble" target="blank" class="footerLink">Facebook</a></li>
            <li><img src="medias/instagram.png"  height="30px"><a href="https://www.instagram.com/bdeepsigre/" target="blank" class="footerLink">Instagram</a></li>
            <li><img src="medias/discord.png" height="30px"><a href="https://discordapp.com/" target="blank" class="footerLink">Discord</a> </li>
        </ul>
    </footer>
	

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="main.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
</html>