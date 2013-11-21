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

					<a data-toggle="modal" href="#image-profil" class="nv php" title="Changer l'image de profil">
					<img src="<?php echo $_SESSION["url_image"]; ?>" width="150" height="150">
					</a>

				</div>

				<div class="profil-infos">
					<h3><?php echo $_SESSION["prenom"]; ?> <?php echo $_SESSION["nom"]; ?></h3>
					<p><strong>administrateur</strong></p>
					<p><a target="_blank" href="<?php echo $_SESSION['url_site']; ?>"><?php echo $_SESSION['url_site']; ?></a> </p>
				</div>

				<div class="clear"></div>

				<div class="header-content">
					<h2>Modifier votre profil</h2>
				</div>

				<form action="inc/actions_db/update_profil.php" method="POST">
		    		<p>Dans vos paramétres, vous pouvez modifier les informations de votre compte (identifiant et mot de passe).</p>

		            <input id="prenom" placeholder="<?php echo $_SESSION["prenom"]; ?>" type="text" name="prenom">
		            <input id="nom" placeholder="<?php echo $_SESSION["nom"]; ?>" type="text" name="nom">
		            <div class="clear"></div>
		            <input id="site" placeholder="<?php echo $_SESSION['url_site']; ?>" type="text" name="url_site">	

		            <div class="clear"></div>
		            
		            <input type="submit" value="Sauvegarder">

		            <div class="clear"></div>
		            <hr>
		            <p>Vous ne vous servez plus de votre compte? Vous pouvez le <a data-toggle="modal" href="#supprimer-compte" class="nv php" title="Supprimer le compte">supprimer</a>.</p>


		        </form>

		    </div>

		    <div class="clear"></div>

		</div>
    
    </body>

    <footer>

    	<!-- IMAGE PROFIL -->

		<div id="image-profil" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true">
		    <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		        <h3>Modifier l'image de profil</h3>
		    </div>
		    
		    <div class="modal-body">
		        <form action="inc/actions_db/update_image.php" method="POST">
		        	<p>Insérez le lien de votre image pour la changer. Vous pouvez upoader des image sur ce <a href="http://transfile.fr" target="_blank">service</a>.</p>
		            <input id="url_image" placeholder="<?php echo $_SESSION["url_image"]; ?>" type="text" name="url_image">
		            <input type="submit" value="Sauvegarder">

		        </form>
		    </div>

		   <!--  <div class="modal-footer">
		        <button class="botn" data-dismiss="modal" aria-hidden="true">Ok</button>
		    </div> -->
		</div>

		<!-- SUPPRIMER LE COMPTE -->

		<div id="supprimer-compte" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true">
		    <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		        <h3>Supprimer le compte</h3>
		    </div>
		    
		    <div class="modal-body">	
		    	<p>Êtes vous sur de vouloir supprimer votre compte, ainsi que toute vos données?</p>
		    </div>

		    <div class="modal-footer">
		        <button class="botn" data-dismiss="modal" aria-hidden="true">Non, Annuler</button>
		        <a class="botn" aria-hidden="true" href="inc/actions_db/delete.php?mail=<?php echo $_SESSION['mail']; ?>&mdp=<?php echo $_SESSION['motdepasse']; ?>">Oui, supprimer</a>
		    </div>
		</div>


    	<script src="js/jquery.js"></script>
    	<script src="js/modal.js"></script>


    	<script type="text/javascript">

<?php include_once "google.php"; ?>
    	
    	</script>

    </footer>
</html>	