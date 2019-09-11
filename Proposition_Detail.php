<?php 
$bdd = new PDO("mysql:host=127.0.0.1;dbname=test;charset=utf8", "root", "");

if (isset($_GET['id']) AND !empty($_GET['id'])){
    $get_id = htmlspecialchars($_GET['id']);

    $proposition = $bdd->prepare('SELECT * FROM proposition WHERE id = ?');
    $proposition->execute(array($get_id));

    if($proposition->rowCount() == 1){
        $proposition = $proposition->fetch();
        $nom_proposition = $proposition['nom_proposition'];
        $description_proposition = $proposition['description_proposition'];
        $date_proposition = $proposition['date_proposition'];

    } else {
        die('Cet proposition n\'existe pas');
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
	<link rel="stylesheet" href="style.css">
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
        <h1><?= $nom_proposition ?></h1>
        <p><?= $description_proposition ?></p>

        <a href="php/Like_dislike.php?t=1&id<?=$id?>">Like</a>
        <br>
        <a href="php/Like_dislike.php?t=2&id<?=$id?>">Dislike</a>
           
    </div>

    <footer id="footer">
        <p class="footerUp">Créé avec ❤️️ à Grenoble, France 🗻</p>
        <p class="footerDown">© 2019 BDE EPSI Grenoble, Tous droits réservés.</p>
	</footer>
	

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="main.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
</html>