<!DOCTYPE html>
<html lang="fr">

<head>
	<title>test</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>

</head>

<body>
	<header>
		<nav>
			<ul class="container-fluid">
				<li style="float: right;"><a class="titre" href="inscription.php">S'inscrire </a></li>
			</ul>
		</nav>
	</header>



	<section>
		<div align="center">
			<div style="width:400px; border: solid 5px #333333; " align="left">
				<div style="background-color:#3d3333; color:#FFFFFF; padding:3px;"><b>CONNEXION</b></div>
				<div style="margin:30px">
					<form action="script.php" method="post">
						<label>UserName :</label><input type="text" name="username" class="box" /><br /><br />
						<label>Password :</label><input type="password" name="password" class="box" /><br /><br />
						<input type="submit" value=" CONNEXION " /><br />
					</form>

					<div style="font-size:11px; color:#cc0000; margin-top:10px">
			<!--		< ?php echo $error; ?> -->
					</div>
				</div>
			</div>
		</div>
	</section>

</body>

</html>
