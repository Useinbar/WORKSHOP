<?php
  session_start();
  setcookie('username', $_POST['username'], time() + 365*24*3600, null, null, false, true);
  include("config.php");

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    $myusername = mysqli_real_escape_string($db,$_POST['username']);
    $mypassword = mysqli_real_escape_string($db,$_POST['password']);

  //  $sql = "SELECT * FROM 'info_connexion' WHERE username = '$myusername' and password = '$mypassword'";
    $sql =  "SELECT * FROM `connexion` WHERE username='$myusername'";
    $sql =  "SELECT * FROM `connexion` WHERE password='$mypassword'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    print_r($row);
    // $active = $row['active'];

    $count = mysqli_num_rows($result);

    if($count == 1) {
    //    header('Location: index.php');//redirige vers la page index
      echo "u are so good ape";
      echo "bonjour ", $myusername, ".", "ton mot de passe est ", $mypassword;
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
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
  */
?>
