<?php
session_start();
//$myusername = $_SESSION['username'];
include("../formulaires/config.php");
 ?>
 <?php


 if(isset($_POST['message'])){
 $connect = mysqli_connect("127.0.0.1", "root", "", "test");
 $requete = "INSERT INTO commentaires (Id_article, auteur, message) VALUES ('".$_GET['id_article']."','".htmlentities(addslashes($_SESSION['username']), ENT_QUOTES)."','".htmlentities(addslashes($_POST['message']), ENT_QUOTES)."')";
 $resultat = mysqli_query($connect,$requete);
 $identifiant = mysqli_insert_id($connect);
 mysqli_close($connect);



 if ($identifiant != 0) {
    echo "<br />Ajout du commentaire réussi.<br /><br />";
 }
 else {
    echo "<br />Le commentaire n'a pas pu être ajouté.<br /><br />";
 }

}
?>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id_commentaire, auteur, message FROM commentaires";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo  "  " . $row['auteur']. " : " . $row['message']. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h3>rajoutes un commentaire :</h3>
   <form action="commentaires.php?id_article=<?php echo $_GET['id_article'] ?> " method="POST" enctype="multipart/form-data">
   <input type="text" name="message" value="">
  <input type="submit" name="envoie" value="envoie">
  </form>
  </body>
</html>
