<?php 
$bdd = new PDO("mysql:host=127.0.0.1;dbname=test;charset=utf8", "root", "");
if(isset($_GET['t'],$_GET['id']) AND !empty($_GET['t']) AND !empty($_GET['id'])){
    $getid = (int) $_GET['id'];
    $gett = (int) $_GET['t'];
    $sessionid = 7;
    $check = $bdd->prepare('SELECT id FROM proposition WHERE id = ?');
    $check->execute(array($getid));
     if($check->rowCount() == 1){
        if($gett == 1){
            $check_like = $bdd->prepare('SELECT id FROM like_proposition WHERE id_proposition = ? AND id_membre = ?');
            $check_like->execute(array($getid,$sessionid));
            $del = $bdd->prepare('DELETE FROM dislike_proposition WHERE id_proposition = ? AND id_membre = ?');
            $del->execute(array($getid,$sessionid));
            if($check_like->rowCount() == 1) {
                $del = $bdd->prepare('DELETE FROM like_proposition WHERE id_proposition = ? AND id_membre = ?');
                $del->execute(array($getid,$sessionid));
             } else {
                $ins = $bdd->prepare('INSERT INTO like_proposition (id_proposition, id_membre) VALUES (?, ?)');
                $ins->execute(array($getid, $sessionid));
             }

        } elseif($gett == 2) {
            $check_like = $bdd->prepare('SELECT id FROM dislike_proposition WHERE id_proposition = ? AND id_membre = ?');
            $check_like->execute(array($getid,$sessionid));
            $del = $bdd->prepare('DELETE FROM like_proposition WHERE id_proposition = ? AND id_membre = ?');
            $del->execute(array($getid,$sessionid));
            if($check_like->rowCount() == 1) {
               $del = $bdd->prepare('DELETE FROM dislike_proposition WHERE id = ? AND id_membre = ?');
               $del->execute(array($getid,$sessionid));
            } else {
               $ins = $bdd->prepare('INSERT INTO dislike_proposition (id_proposition, id_membre) VALUES (?, ?)');
               $ins->execute(array($getid, $sessionid));
            }
        }
        header('location: http://localhost/WORKSHOP/Proposition_Detail.php?id='.$getid );
     } else {
         exit('erreur fatale <a href="http://localhost/WORKSHOP/">Revenir à l\'accueil</a>');
     }
} else {
    exit('erreur fatale <a href="http://localhost/WORKSHOP/">Revenir à l\'accueil</a>');
}

?>  