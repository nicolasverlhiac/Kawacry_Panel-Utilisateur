<?php 

require ("inc/config.php");
require ("inc/token.php");

$f = basename($_SERVER['PHP_SELF']);
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

	    <div class="main">

	    	<div id="sidebar">
	    		<?php include_once ("sidebar.php") ?>
		    </div>

		    <div id="content">

				<div class="profil">

					<img src="<?php echo $_SESSION["url_image"]; ?>" width="150" height="150">

				</div>

				<div class="profil-infos">
					<h3><?php echo $_SESSION["prenom"]; ?> <?php echo $_SESSION["nom"]; ?></h3>
					<p><strong>administrateur</strong></p>
					<p><a target="_blank" href="http://<?php echo $_SESSION['url_site']; ?>">http://<?php echo $_SESSION['url_site']; ?></a> </p>
				</div>

				<div class="clear"></div>

				<hr>

				<div class="header-content">
					<h2>Modifier votre profil</h2>
				</div>

				<form action="inc/update.php" method="POST">
		    		<p>Dans vos paramétres, vous pouvez modifier les informations de votre compte (identifiant et mot de passe).</p>

		            <input id="prenom" placeholder="<?php echo $_SESSION["prenom"]; ?>" type="text" name="prenom">
		            <input id="nom" placeholder="<?php echo $_SESSION["nom"]; ?>" type="text" name="nom">
		            <div class="clear"></div>
		            <input id="site" placeholder="http://<?php echo $_SESSION['url_site']; ?>" type="text" name="url_site">	

		            <div class="clear"></div>
		            
		            <input type="submit" value="Sauvergarder">

		            <div class="clear"></div>
		            <hr>
		            <p>Vous ne vous servez plus de votre compte? Vous pouvez le <a href="inc/delete.php?mail=<?php echo $_SESSION['mail']; ?>&mdp=<?php echo $_SESSION['motdepasse']; ?>">supprimer</a>.</p>


		        </form>

		    </div>

		    <div class="clear"></div>

		</div>
    
    </body>

    <footer>

    	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


    	<script type="text/javascript">

<?php include_once "google.php"; ?>
    	
    	</script>

    </footer>
</html>	