<?php
    session_start();
    include('config.php'); // Fichier PHP contenant la connexion à votre BDD

    // S'il y a une session alors on ne retourne plus sur cette page
    if (isset($_SESSION['id'])){
        header('Location: script-inscription.php');
        exit;
    }

    // Si la variable "$_Post" contient des informations alors on les traitres
    if(!empty($_POST)){
        extract($_POST);
        $valid = true;

        // On se place sur le bon formulaire grâce au "name" de la balise "input"
        if (isset($_POST['inscription'])){
            $username  = htmlentities(trim($userame)); // On récupère le nom
            $mail = htmlentities(strtolower(trim($mail))); // On récupère le mail
            $password = trim($password); // On récupère le mot de passe

            //  Vérification du nom
            if(empty($username)){
                $valid = false;
                $er_nom = ("Le nom d' utilisateur ne peut pas être vide");
            }

            // Vérification du mail
            if(empty($email)){
                $valid = false;
                $er_email = "Le mail ne peut pas être vide";

                // On vérifit que le mail est dans le bon format
            }elseif(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $email)){
                $valid = false;
                $er_email = "Le mail n'est pas valide";

            }else{
                // On vérifit que le mail est disponible
                $req_email = $DB->query("SELECT mail FROM utilisateur WHERE email = ?",
                    array($email));

                $req_email = $req_email->fetch();

                if ($req_email['mail'] <> ""){
                    $valid = false;
                    $er_email = "Ce mail existe déjà";
                }
            }

            // Vérification du mot de passe
            if(empty($password)) {
                $valid = false;
                $er_mdp = "Le mot de passe ne peut pas être vide";

            }elseif($password != $confmdp){
                $valid = false;
                $er_mdp = "La confirmation du mot de passe ne correspond pas";
            }

            // Si toutes les conditions sont remplies alors on fait le traitement
            if($valid){

                $password = crypt($password, "$6$rounds=5000$macleapersonnaliseretagardersecret$");
                $date_creation_compte = date('Y-m-d H:i:s');

                // On insert nos données dans la table user
                $DB->insert("INSERT INTO user (username, email, password, date_creation_compte) VALUES
                    (?, ?, ?, ?, ?)",
                    array($username, $email, $password, $date_creation_compte));

                header('Location: script-inscription.php');
                echo "vous êtes bien inscrit";
                exit;
            }
        }
    }
    echo "gg";
?>
