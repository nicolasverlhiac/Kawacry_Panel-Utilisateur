<?php 
require "inc/config.php";
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
	    <title>Panel Utilisateur</title>
	    
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="author" value="Nicolas Verlhiac">

		<meta name="keywords" content="panel, administration, utilisateurs, php, mysql" />
		<meta name="description" content="Gérer vos utilisateur dans un espace de type Panel d'administration" />


		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<link rel="shortcut icon" href="images/icone.png" />
		<link type="text/plain" rel="author" href="http://soundrecord.fr/humans.txt" />
		
		<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
		<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
		<!--[if IE 8]> <html class="no-js lt-ie9"><![endif]-->
		<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->
		<!--[if lt IE 9]><script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	
  	</head>
  	
  	<body>
    <!--[if lt IE 7]><p class="chromeframe">Vous utilisez un navigateur <strong>dépassé</strong> (pourrie). Veuillez <a href="http://browsehappy.com/">mettre à jour votre navigateur</a> ou <a href="http://www.google.com/chromeframe/?redirect=true">utilisez google frame</a> pour pouvoir naviguer sur le site.</p><![endif]-->

		<section id="accueil">

			<header id="head-accueil">

				<h1>
					<a class="logo" href="index.php" title="" rel="Accueil">
						Panel Utilisateur - Login
					</a>
				</h1>

			</header>

			<form action="inc/login.php" method="POST">

				<input id="mail" placeholder="Adresse e-mail" type="text" name="mail">
				<input id="password" placeholder="Mot de passe" type="password" name="password">

				<input type="submit" value="Connexion">

				<hr>
			</form>

			<form action="inc/signin.php" method="POST">

				<input id="mail" placeholder="Adresse e-mail" type="text" name="mail">
				<input id="password" placeholder="Mot de passe" type="password" name="password">
				<input id="nom" placeholder="Nom" type="text" name="nom">
				<input id="prenom" placeholder="Prénom" type="text" name="prenom">
				<input type="submit" value="Inscription">

			</form>

		</section>
    
    </body>

    <footer>

    	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


    	<script type="text/javascript">

<?php include_once "google.php"; ?>
    	
    	</script>

    </footer>
</html>	