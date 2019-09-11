<?php 
$bdd = new PDO("mysql:host=127.0.0.1;dbname=test;charset=utf8", "root", "");

if (isset($_POST['nom_proposition'], $_POST['description_proposition'], $_POST['date_proposition'])){
    if(!empty($_POST['nom_proposition']) AND !empty($_POST['description_proposition']) AND !empty($_POST['date_proposition'])){

        $nom_proposition = htmlspecialchars($_POST['nom_proposition']);
        $description_proposition = htmlspecialchars($_POST['description_proposition']);
        $date_proposition = htmlspecialchars($_POST['date_proposition']);
        
        

        $ins = $bdd->prepare('INSERT INTO proposition (nom_proposition, description_proposition, date_proposition) VALUES(?, ?, ?)');
        $ins->execute(array($nom_proposition, $description_proposition, $date_proposition));  

        $message = 'Votre proposition a bien était posté';

    } else {
            $message='veuillez remplir tous les champs';
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

    <form method="POST">
        <input type="text" name="nom_proposition" placeholder="Nom"><br>
        <textarea name="description_proposition" placeholder="Description"></textarea><br>
        <input type="date" name="date_proposition" placeholder="Date"><br>
        <input type="submit" value="Valider">
    </form>

    <?php if(isset($message)){ echo $message; } ?>
 
	<section class="sectionCenter">
		<p>Test</p>
	</section>
    <footer id="footer">
        <p class="pfooter">Créé avec ❤️️ à Grenoble, France 🗻</p>
        <p class="pfooter">© 2019 BDE EPSI, Tous droits réservés.</p>
	</footer>
	

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="main.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
</html>