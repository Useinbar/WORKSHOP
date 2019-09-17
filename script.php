<?php
  session_start();
  include(config.php);

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];
  //  $myusername = mysqli_real_escape_string($db,$_POST['username']);
  //  $mypassword = mysqli_real_escape_string($db,$_POST['password']);

  //  $sql = "SELECT * FROM 'info_connexion' WHERE username = '$myusername' and password = '$mypassword'";
    $sql =  "SELECT * FROM `membres1` WHERE username='$myusername' and pswd='$mypassword' ";
  //  $sql =  "SELECT * FROM `membres1` WHERE password='$mypassword'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  //  print_r($row);
    // $active = $row['active'];

    $count = mysqli_num_rows($result);

    if($count == 1) {
    //    header('Location: index.php');//redirige vers la page index
  //    echo "u are so good ape";
    //  echo "bonjour ", $myusername, ".", "ton mot de passe est ", $mypassword;
      header("Location:accueil.php");
      $_SESSION['username'] = $myusername;
  //  echo $sql;
    }
     else {
      echo "Utilisateur/Mot de passe erroné...";
      echo " Nouvelle tentative ?";
    }
  }
      // If result matched $myusername and $mypassword, table row must be 1 row
/*
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         header("location: index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
*/

?>
