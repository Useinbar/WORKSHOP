<?php
session_start();
$myusername = $_SESSION['username'];

include("config.php");
 ?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>
      Tu es connecté <?php echo $myusername; ?>
      </script>
    </h1>
  </body>
</html>
