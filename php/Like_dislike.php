<?php 
$bdd = new PDO("mysql:host=127.0.0.1;dbname=test;charset=utf8", "root", "");

if(isset($_GET['t'],$_GET['id']) AND !empty($_GET['t']) AND !empty($_GET['id'])){
    $getid = (int) $_GET['id'];
    $gett = (int) $_GET['t'];

    $check = $bdd->prepare('SELECT id FROM proposition WHERE id = ?');
    $check->execute(array($getid));

     if($check->rowCount() == 1){
        if($gett == 1){
            $ins = $bdd->prepare('INSERT INTO like_proposition (id_proposition) VALUES (?)');
            $ins->execute(array($getid));
        }elseif($gett == 2){
            $ins = $bdd->prepare('INSERT INTO dislike_proposition (id_proposition) VALUES (?)');
            $ins->execute(array($getid));
        }
        header('location: http://localhost/WORKSHOP/Proposition_Detail.php?id='.$getid );
     }else{
         exit('erreur fatale <a href="index.html">Revenir à l\'accueil</a>');
     }
}else{
    exit('erreur fatale <a href="index.html">Revenir à l\'accueil</a>');
}

?> 