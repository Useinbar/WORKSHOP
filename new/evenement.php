<?php 

include(new/config.php);

if (isset($_GET['id']) AND !empty($_GET['id'])){
    $get_id = htmlspecialchars($_GET['id']);

    $evenement = $bdd->prepare('SELECT * FROM evenement WHERE id = ?');
    $evenement->execute(array($get_id));

    if($evenement->rowCount() == 1){
        $evenement = $evenement->fetch();
        $nom_evenement = $evenement['nom_evenement'];
        $type_evenement = $evenement['type_evenement'];
        $date_evenement = $evenement['date_evenement'];
        $horaire_evenement = $evenement['horaire_evenement'];
        $description_evenement = $evenement['description_evenement'];
        

    } else {
        die('Cet evenement n\'existe pas');
    }

} else {
    die ('Erreur');
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
	<link rel="stylesheet" href="new/style.css">
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
        <div class="landing-text">
            <h1>BDE EPSI GRENOBLE</h1>
        </div>
    </header>

    <div>
        <h1><?= $nom_evenement ?></h1>
        <p><?= $description_evenement ?></p>   
    </div>

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